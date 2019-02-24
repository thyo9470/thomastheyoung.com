

/*
  Variables
*/

var grid = document.getElementById("main");
//for nice looks. it may be unnecessary, but we need to declare main for the makeDisplay function
main = document.getElementById("main");
main.style.width = window.innerWidth;
main.style.height = window.innerHeight;
var numMainChildren = main.children.length;

//for maze display
var currentLayer = 0; //global counter for which maze we are displaying.
var currentLevel = 0;

//for maze generation
var maze = [];
var maze_states = {
  empty: 0,
  wall: 1,
  goal: 2
}
var color_pal = {
  player: "#AAC0AA",
  nothing:"#F4B886", 
  down: "#A18276",
  up: "#FCDFA6",
  both: "#CBE896",
  wall: "#191919",
  goal: "#000000"}
var depth = 5; //has to be odd
var height = 3;// based on the screen height+width
var width = 3;// based on the screen height+width

var block_size = 50;

/*
  Setup
*/

class Player 
{
  constructor()
  {
    this.x = 1;
    this.y = 1;
    this.z = 0;
  }

  move(x, y, z)
  {
    if(this.can_move_to(this.x + x, this.y + y, this.z + z))
    {
      this.x += x;
      this.y += y;
      this.z += z;
      this.check_collision();
      return true;
    }
    return false;
  }

  /**
   * Whether the position is valid
   */
  can_move_to(x, y, z)
  {
    if(x >= 0 && x < width && y >= 0 && y < height && z >= 0 && z < depth)
    {
      return maze[z][y][x] != 1;
    }
    return false;
  }

  check_collision()
  {
    if(maze[this.z][this.y][this.x] == maze_states.goal){
      new_game();
    }
  }
}


/*
  Create new blank maze
*/
function blank_maze(){
  maze = [];
  for(let z = 0; z < depth; z++){
    maze.push([]);
    for(let y = 0; y < height; y++){
      maze[z].push([]);
      for(let x = 0; x < width; x++){
        if( (z%2 == 0) && ( x > 0 ) && ( y > 0) && (x < width-1) && ( y < height-1 )){
          if( (x%2 == 1) && (y%2 == 1) ){
            maze[z][y].push(0); 
          }else{
            maze[z][y].push(1); 
          }
        }else{
          maze[z][y].push(1);
        }
      }
    }
  }
}

// gen random int given a max int
function getRandomInt(max) {
  return Math.floor(Math.random() * Math.floor(max));
}

// radnomize a given array
function shuffle(arr){
  for(let i = 0; i < arr.length; i++){
    let new_pos = getRandomInt(arr.length);

    let temp = arr[new_pos];
    arr[new_pos] = arr[i];
    arr[i] = temp;
  }
}

/*
  Creates a random 3d maze using randomized Kruskel's algorithm
*/
function setup_maze(maze){
  // variables to keep track of generation
  let walls = []; // all walls on board that seperate two empty places
  let cells = []; // list of connecting cells

  // setup variables
  for(let z = 0; z < maze.length; z++){
    for(let y = 1; y < maze[0].length-1; y++){
      for(let x = 1; x < maze[0][0].length-1; x++){
        cells.push([[x,y,z]]);

        // if even layer 
        if( ((x%2 == 0) && (y%2 == 1)) && (z%2 == 0) ){
          walls.push([x,y,z]);
        }

        if( ((x%2 == 1) && (y%2 == 0)) && (z%2 == 0) ){
          walls.push([x,y,z]);
        }

        // if odd layer
        if( (x%2 == 1) && (y%2 == 1) && (z%2 == 1) ){
          walls.push([x,y,z]);
        }
      }
    } 
  }

  shuffle(walls);

  // loop through walls and connect each side if not connected in some other place
  walls.forEach(function(coord){
    
    /* get cells the wall seperates */

    let cell1 = coord.slice();
    let cell2 = coord.slice();
    
    // cells to right/left
    if( coord[0]%2 == 0 ){
      cell1[0] -= 1; 
      cell2[0] += 1;
    }
    // cells to up/down
    else if( coord[1]%2 == 0 ){
      cell1[1] -= 1;
      cell2[1] += 1;
    }
    // cells to in/out
    else if( coord[2]%2 == 1){
      cell1[2] -= 1;
      cell2[2] += 1;
    }   

    // find the cell arrays each of the cells we just found are in
    let cell1_index = -1;
    let cell2_index = -1;

    // loop through cells to find cell[1/2]_index
    for(let i = 0; i < cells.length; i++){
      
      // check if cell[1/2] in currents cells array
      cells[i].forEach(function(cell){
        // check for cell1
        if( (cell[0] == cell1[0]) && (cell[1] == cell1[1]) && (cell[2] == cell1[2]) ){
          cell1_index = i; 
        }

        // check for cell2
        if( (cell[0] == cell2[0]) && (cell[1] == cell2[1]) && (cell[2] == cell2[2]) ){
          cell2_index = i;
        }
      });

    }

    // if cells not connected remove wall and connect
    if( cell1_index != cell2_index ){
      let temp = cells[cell2_index];
      temp.forEach(function(temp_cell){
        cells[cell1_index].push(temp_cell);
      })
      cells.splice(cell2_index, 1); 
      maze[coord[2]][coord[1]][coord[0]] = 0;
    }

  });  


  // adding things to maze

  maze[0][maze[0].length-2][maze[0][0].length-2] = maze_states.goal; // ending place

}

/*
  print a given layer of the maze
*/
function print_layer(layer){
  let layer_out = [];
  for(let y = 0; y < layer.length; y++){
    let out_shtuff = layer[y].map(function(val){
      if(val < 1){
        return "_";
      }else{
        return "0";
      }
    });
    layer_out.push( out_shtuff.join(' ') );
  }
  console.log(layer_out.join("\n"));
}

window.onresize = function(event){
  makeDisplay(currentLayer, player); //parameter: z-layer, player class
}

// FOR DISPLAYING THE MAZE
function makeDisplay(layer, p){
	//make a grid in the element referenced.
	var env = maze[layer];
	cols = env[0].length;
	rows = env.length;
	
	//if previously a layer has been shown, remove it
	if(main.children.length > numMainChildren){
		main.removeChild(main.children[numMainChildren]);
	}

	grid = document.createElement("div");

	grid.className = "maze";
	grid.id = "displayGrid";
	grid.style.display = "Grid";
	


	var rowTemplate = "";
	var colTemplate = "";
	for(i = 0; i < rows; i+=1){
		rowTemplate += "1fr ";
		grid.style.gridTemplateRows = rowTemplate;

		for(j = 0; j < cols; j+=1){
			if(i == 0) {
				colTemplate += "1fr ";
				grid.style.gridTemplateColumns = colTemplate;
			}

			
			var box = document.createElement("div")

			//give the box the correct css.
			box.className = "box";
			box.id = "box" + i + j;

      // make sure grid fits screen
      let size_limit_window = ( window.innerHeight-50 > window.innerWidth ) ? window.innerWidth : window.innerHeight-50;


      let display_height = height * block_size; 
      let display_width = width * block_size; 
      let size_limit = ( display_height > display_width ) ? display_width : display_height;

      if(size_limit_window > size_limit){
        grid.style.width = width * 50 + "px";
        grid.style.height = height * 50 + "px";
        box.style.height = "50px";
        box.style.width = "50px";
      }else{
        grid.style.width = size_limit_window + "px";
        grid.style.height = size_limit_window + "px";
        
        box.style.height = size_limit_window/height;
        box.style.width = size_limit_window/width;
      }
			
      var color = "";

      if(env[i][j] == 0){
				if(layer >= 2 && layer <= depth-2){
					if(maze[layer-1][i][j] != 1 && maze[layer+1][i][j] != 1){
						color = color_pal.both;
					}else if(maze[layer-1][i][j] != 1){
						//can only go up
						color = color_pal.up;
					}else if(maze[layer+1][i][j] != 1){
						//can only go down
						color = color_pal.down;
					}else{
						color = color_pal.nothing;
					}
				}else if(layer >= 1 && maze[layer-1][i][j] != 1){
						color = color_pal.up;
				}else if(layer <= depth-2 && maze[layer+1][i][j] != 1){
						color = color_pal.down;
				}else{
					color = color_pal.nothing;
				}
			}else if(env[i][j] == 1){
				color = color_pal.wall;
			}
      if(p.x == j && p.y == i && p.z == layer){
        // Prevent player character from blocking the tile colors!
        // box.style.background =  `radial-gradient(red 0%, red 70%, transparent 70%, transparent 100%) 0 0,
        //                         radial-gradient(` + color + ` 0%, ` + color + ` 70%, transparent 70%, transparent 100%) 0 0`;
        // box.style.backgroundPosition = "left, right";
        // box.style.backgroundSize = "1000px 1000px";
        // box.style.backgroundRepeat = "no-repeat";
        // box.style.backgroundBlendMode = "multiply";
        box.style.background = "linear-gradient(45deg, " + color + " 50%, " + color_pal.player + " 50%)";
      }else{
        box.style.backgroundColor = color;
      }

			grid.appendChild(box);
		}
	}
	main.appendChild(grid);
}

//GO DOWN THE MAZE ONE LAYER
function goDown(){
	//if you can go down here. This needs an additional check for if the player's current position can move up
	
	if(currentLayer < depth-2){
		currentLayer += 2;
		makeDisplay(currentLayer, player);
	}
}

//GO UP ONE LAYER
function goUp(){
	//check if you can go up. This needs an additional check for if the player's current position can move up
	if(currentLayer >= 2){
		currentLayer -= 2;
		makeDisplay(currentLayer, player);
	}
}

const message = document.getElementById("invalidMove");
const time = document.getElementById("time");

function input_handler(event)
{
  message.style.display = "none";
	switch(event.key)
	{
		case "ArrowDown":
		case "s":
			player.move(0, 1, 0);
			makeDisplay(currentLayer, player);
		break;
		case "ArrowUp":
		case "w":
			player.move(0, -1, 0);
			makeDisplay(currentLayer, player);
		break;
		case "ArrowLeft":
		case "a":
			player.move(-1, 0, 0);
			makeDisplay(currentLayer, player);
		break;
		case "ArrowRight":
		case "d":
			player.move(1, 0, 0);
			makeDisplay(currentLayer, player);
		break;
		case "q":
		if(!player.move(0, 0, -1)){
			message.style.display = "block";
		}else{
			player.move(0, 0, -1); //implementing this so that we are able to check if it is actually a valid move (we do this above).
			goUp();
		}
		break;
		case "e":
		if(!player.move(0, 0, 1)){
			message.style.display = "block";
		}else{
			player.move(0, 0, 1);
			goDown();
		}
		break;
	}
}

/**
 * Timer
 */
class Timer
{
    constructor()
    {
        this.seconds = 25;
        this.step = 1000;
        this.countdown_date = Date.now() + (1000 * this.seconds);
        this.counter = setInterval(() => {
            let seconds_remaining = Math.floor((this.countdown_date - Date.now()) / 1000);
            time.textContent = seconds_remaining;
    
            if(Date.now() > this.countdown_date)
            {
                clearInterval(this.counter);
                time.textContent = 0;

                // Stops the game, or at least the player from moving
                document.removeEventListener('keydown', input_handler, true);
                alert("you lose!\npress ok to restart");
                window.location.reload(false); 
            }
        }, this.step);
    }
}

function new_game(){
  currentLevel += 1;
  height += 2;
  width += 2;
  //depth += 2;
  blank_maze();
  setup_maze(maze);
  player = new Player();
  document.getElementById("level").innerHTML = currentLevel;
  timer.countdown_date += 2000 * currentLevel;
}

timer = new Timer();
new_game();
document.addEventListener('keydown', input_handler, true);
makeDisplay(currentLayer, player); //parameter: z-layer, player class

