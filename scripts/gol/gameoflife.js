if (!window.gameOfLife) var gameOfLife = function() {
    
    var gol = {
        body: null,
        canvas: null,
        context: null,
        grids: [],
        mouseDown: false,
        interval: null,
        control: null,
        moving: -1,
        clickToGive: -1,
        table: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/".split(''),
        tableBack: null,
        
        init: function(width, height) {
            gol.body = document.getElementsByTagName('body')[0];
            gol.canvas = document.createElement('canvas');
            if (gol.canvas.getContext) {
                gol.context = gol.canvas.getContext('2d');
                document.getElementById('content').appendChild(gol.canvas);
                gol.canvas.width = width;
                gol.canvas.height = height;
                gol.canvas.style.marginLeft = "8px";
                
                gol.control = document.getElementById('gridcontrol');
                
                gol.canvas.onmousedown = gol.onMouseDown;
                gol.canvas.onmousemove = gol.onMouseMove;
                gol.canvas.onmouseup = gol.onMouseUp;
                
                gol.addGrid(48,32,100,44,8);
                
                gol.refreshAll();
                gol.refreshGridSelect(-1);
                gol.getOptions(-1);
                
                gol.genTableBack();
            } else {
                alert("Canvas not supported by your browser. Why don't you try Firefox or Chrome? For now, you can have a hug. *hug*");
            }
        },
        
        showInfo: function() {
            var popup = document.getElementById('popup');
            popup.innerHTML = 'Welcome to GENIE\'s implementation of <a href="http://en.wikipedia.org/wiki/John_Horton_Conway">John Conway</a>\'s <a href="http://en.wikipedia.org/wiki/Conway%27s_Game_of_Life">Game of Life</a>, using the HTML 5 canvas element.<br /><br />';
            popup.innerHTML += 'The Game of Life is a <i>cellular automaton</i>, which means that it consists of a grid of cells which can be in one of a finite number of states. Given any state, there are rules that govern what the <i>next state</i> of the grid will be.<br /><br />';
            popup.innerHTML += 'Each cell in a grid can be either <i>dead</i> or <i>alive</i>. To find the next state of the grid, the following rules are observed:<br />';
            popup.innerHTML += '<ul><li>Any living cell with 0 or 1 neighbours dies, as if by underpopulation</li><li>Any living cell with 4 or more neighbours dies, as if by overpopulation</li><li>Any living cell with 2 or 3 neighbours survives, yay</li><li>Any dead cell with 3 or more neighbours becomes alive, as if by reproduction</li></ul><br />';
            popup.innerHTML += 'You can make some pretty cool patterns just by doodling all over the grid and hitting \'Go\'. Or there are some examples all over the net of clever states. Try importing Gosper\'s <a href="http://en.wikipedia.org/wiki/Gun_%28cellular_automaton%29">Glider Gun</a>:';
            popup.innerHTML += '<textarea>{"width":52,"cells":"AAAAABgAAABgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABwAAACIAAAEEAAAEEAAAAgAAACIAAABwAAAAgAAAAAAAAAAAAAHAAAAHAAAAIgAAAAAAAAYwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGAAAAGAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA"}</textarea><br /><br />';
            popup.innerHTML += '<input type="button" value="Thanks!" onclick="gameOfLife.closePopup()" />';
            
            popup.style.display = "block";
        },
        
        go: function(period) {
            if (gol.interval == null) {
                gol.step();
                gol.interval = setInterval(gameOfLife.step,period);
                document.getElementById('gostop').value = "Stop";
            } else {
                clearInterval(gol.interval);
                gol.interval = null;
                document.getElementById('gostop').value = "Go";
            }
        },
        
        addGrid: function(x,y,width,height,size) {
            gol.grids.push(new gol.grid(x,y,width,height,size));
            gol.refreshGridSelect(gol.grids.length-1);
        },
        
        createGrid: function() {
            var width = parseInt(document.getElementById('width').value);
            var height = parseInt(document.getElementById('height').value);
            if (width > 0 && height > 0) {
                gol.addGrid(2,2,width,height,8);
                gol.refreshAll();
                document.getElementById('grid').value = gol.grids.length - 1;
                gol.getOptions(gol.grids.length - 1);
            }
        },
        
        removeGrid: function(grid) {
            gol.grids.splice(grid,1);
            gol.refreshAll();
            gol.refreshGridSelect(-1);
            gol.getOptions("-1");
        },
        
        step: function() {
            for (var i in gol.grids) {
                gol.grids[i].step();
            }
        },
        
        changeSpeed: function(period) {
            if (gol.interval) {
                clearInterval(gol.interval);
                gol.interval = setInterval(gameOfLife.step,period);
            }
        },
        
        onMouseDown: function(e) {
            document.onselectstart = function(){ return false; }
            if (gol.moving < 0) {
                gol.mouseDown = true;
                gol.clickToGive = gol.click(e);
            } else {
                var canvasX = e.pageX - gol.canvas.offsetLeft;
                var canvasY = e.pageY - gol.canvas.offsetTop;
                gol.grids[gol.moving].x = canvasX;
                gol.grids[gol.moving].y = canvasY;
                gol.refreshAll();
                gol.stopMove();
            }
        },
        
        onMouseMove: function(e) {
            if (gol.mouseDown == true) {
                gol.click(e);
            } else if (gol.moving >= 0) {
                gol.refreshAll();
                var canvasX = e.pageX - gol.canvas.offsetLeft;
                var canvasY = e.pageY - gol.canvas.offsetTop;
                gol.context.strokeStyle = 'rgb(255,150,150)';
                gol.context.beginPath();
                gol.context.moveTo(canvasX-10,canvasY+0.5);
                gol.context.lineTo(canvasX+10,canvasY+0.5);
                gol.context.moveTo(canvasX+0.5,canvasY-10);
                gol.context.lineTo(canvasX+0.5,canvasY+10);
                gol.context.stroke();
            }
        },
        
        onMouseUp: function(e) {
            document.onselectstart = function(){ return true; }
            gol.mouseDown = false;
            for (var i in gol.grids) {
                gol.grids[i].onMouseUp();
            }
        },
        
        click: function(e) {
            var canvasX = e.pageX - gol.canvas.offsetLeft;
            var canvasY = e.pageY - gol.canvas.offsetTop;
            var result = -1;
            for (var i in gol.grids) {
                if (canvasX >= gol.grids[i].x
                    && canvasX < gol.grids[i].x + gol.grids[i].size + (gol.grids[i].size+1)*(gol.grids[i].width-1)
                    && canvasY >= gol.grids[i].y
                    && canvasY < gol.grids[i].y + gol.grids[i].size + (gol.grids[i].size+1)*(gol.grids[i].height-1)) {
                    var cur = gol.grids[i].click(canvasX - gol.grids[i].x, canvasY - gol.grids[i].y);
                    if (result == -1) {
                        result = cur;
                    }
                }
            }
            return result;
        },
        
        getOptions: function(value) {
            gol.stopMove();
            for (var i in gol.grids) {
                gol.grids[i].deselect();
            }
            if (value >= 0) {
                gol.grids[value].select();
                gol.control.innerHTML = '<input type="button" value="Move" id="move" onclick="gameOfLife.move('+value+')" />';
                gol.control.innerHTML += '<input type="button" value="Clear" onclick="gameOfLife.clearGrid('+value+')" /> ';
                gol.control.innerHTML += '<input type="button" value="Delete" onclick="gameOfLife.removeGrid('+value+')" /> ';
                gol.control.innerHTML += '<input type="button" value="Export" onclick="gameOfLife.exportGrid('+value+')" /> ';
                if (gol.grids[value].reset != null) {
                    gol.control.innerHTML += '<input type="button" value="Reset" onclick="gameOfLife.resetGrid('+value+')" /> ';
                }
                gol.control.innerHTML += 'Gen: <span id="gen">'+gol.grids[value].gen+'</span>';
            } else if (value == -1) {
                gol.control.innerHTML = '<input type="button" value="Delete All" onclick="gameOfLife.deleteAll()" />';
                gol.control.innerHTML += '<input type="button" value="Import" onclick="gameOfLife.importGrid()" /> ';
            } else if (value == -2) {
                gol.control.innerHTML = 'Width: <input type="text" value="20" style="width: 40px" id="width" /> ';
                gol.control.innerHTML += 'Height: <input type="text" value="20" style="width: 40px" id="height" /> ';
                gol.control.innerHTML += '<input type="button" value="Create" onclick="gameOfLife.createGrid()" /> ';
                gol.control.innerHTML += '<input type="button" value="Import" onclick="gameOfLife.importGrid()" /> ';
            }
        },
        
        resetGrid: function(grid) {
            gol.grids[grid].alive = [];
            for (var i in gol.grids[grid].reset) {
                gol.grids[grid].alive[i] = [];
                for (var j in gol.grids[grid].reset[i]) {
                    gol.grids[grid].alive[i][j] = gol.grids[grid].reset[i][j];
                }
            }
            gol.refreshAll();
            gol.grids[grid].gen = 1;
            gol.grids[grid].updateGen();
        },
        
        exportGrid: function(value) {
            var popup = document.getElementById('popup');
            var grid = gol.grids[value];
            
            /** JSON stuff **/
            var cells = "";
            var charString = "";
            for (var i = 0; i < grid.width; i++) {
                for (var j = 0; j < grid.height; j++) {
                    if (grid.alive[i] == undefined || grid.alive[i][j] == undefined) {
                        charString += "0";
                    } else {
                        charString += "1";
                    }
                    if (charString.length == 6) {
                        cells += gol.table[parseInt(charString,2)];
                        charString = "";
                    }
                }
            }
            if (charString.length != 0) {
                while (charString.length != 0 && charString.length != 6) {
                    charString += "0";
                }
                cells += gol.table[parseInt(charString,2)];
            }
            
            var regex = /([a-zA-Z0-9\/+])\1{3,63}/;
            while (regex.exec(cells)) {
                var prevLength = cells.length;
                cells = cells.replace(regex,'*$1!');
                var replaced = prevLength - cells.length + 2;
                cells = cells.replace("!",gol.table[replaced]);
            }
            
            /** RLE stuff **/
            //var rle = 'x = '+grid.width+', y = '+grid.height;
            
            popup.innerHTML = "Here's the JSON for Grid "+value+":<br />";
            popup.innerHTML += '<textarea>{"w":'+grid.width+',"h":'+grid.height+',"cells":"'+cells+'"}</textarea><br />';
            //popup.innerHTML += "Here's the RLE for Grid "+value+":<br />";
            //popup.innerHTML += '<textarea>'+rle+'</textarea><br />';
            popup.innerHTML += '<input type="button" value="Thanks!" onclick="gameOfLife.closePopup()" />';
            popup.style.display = "block";
        },
        
        importGrid: function() {
            var popup = document.getElementById('popup');
            popup.innerHTML = "Enter the JSON to import:<br />";
            popup.innerHTML += '<textarea id="importjson"></textarea><br />';
            popup.innerHTML += '<input type="button" value="Create" onclick="gameOfLife.createFromJSON(document.getElementById(\'importjson\',false).value)" /> ';
            popup.innerHTML += '<input type="button" value="Delete others and create" onclick="gameOfLife.createFromJSON(document.getElementById(\'importjson\').value,true)" /> ';
            popup.innerHTML += '<input type="button" value="No Thanks!" onclick="gameOfLife.closePopup()" />';
            popup.style.display = "block";
            document.getElementById('importjson').focus();
        },
        
        createFromJSON: function(json, deleteAll) {
            var object = JSON.parse(json);
            if (object) {
                if (deleteAll) gol.deleteAll();
                
                if (object.width == undefined) {
                    var string = object.cells;
                    var index = string.search(/[*]/);
                    while (index >= 0) {
                        var letter = string.split('')[index+1];
                        var count = parseInt(gol.tableBack[string.split('')[index+2]],2)+1;
                        var repeat = "";
                        while (repeat.length != parseInt(count)) {
                            repeat+=letter;
                        }
                        string = string.replace(/[*][a-zA-Z0-9\/+]{2}/,repeat);
                        index = string.search(/[*]/);
                    }
                    object.cells = string;
                    
                    var width = parseInt(object.w);
                    var height = parseInt(object.h);
                } else {
                    var width = parseInt(object.width);
                    var height = Math.floor((object.cells.length * 6) / parseInt(width));
                }
                gol.addGrid(8,8,width,height,8);
                var grid = gol.grids[gol.grids.length-1];
                grid.alive = [];
                object.cells = object.cells.split('');
                for (var i in object.cells) {
                    var charString = gol.tableBack[object.cells[i]];
                    charString = charString.split('');
                    for (var j in charString) {
                        if (charString[j] == "1") {
                            i = parseInt(i); j = parseInt(j);
                            var x = Math.floor(((i*6)+j) / height);
                            var y = ((i*6)+j) % height;
                            if (grid.alive[x] == undefined) {
                                grid.alive[x] = [];
                                grid.alive[x][y] = true;    
                            } else {
                                grid.alive[x][y] = true;
                            }
                        }
                    }
                }
                
                grid.reset = [];
                for (var i in grid.alive) {
                    grid.reset[i] = [];
                    for (var j in grid.alive[i]) {
                        grid.reset[i][j] = grid.alive[i][j];
                    }
                }
                
                gol.refreshAll();
                gol.getOptions(gol.grids.length - 1);
                gol.closePopup();
            }
        },
        
        genTableBack: function() {
            gol.tableBack = {};
            for (var i in gol.table) {
                var charString = parseInt(i).toString(2);
                while (charString.length != 6) {
                    charString = "0" + charString;
                }
                gol.tableBack[gol.table[i]] = charString;
            }
        },
        
        refreshAll: function() {
            gol.context.fillStyle="rgb(255,255,255)";
            gol.context.fillRect(0,0,gol.canvas.width,gol.canvas.height);
            for (var i in gol.grids) {
                gol.grids[i].refreshGrid(true);
            }
        },
        
        deleteAll: function() {
            while (gol.grids.length != 0) {
                gol.removeGrid(0);
            }
        },
        
        move: function(grid) {
            if (gol.moving >= 0) {
                gol.stopMove();
            } else {
                gol.moving = grid;
                document.getElementById('move').value = "Stop Move";
            }
        },
        
        stopMove: function() {
            gol.moving = -1;
            var moveButton = document.getElementById('move');
            if (moveButton) {
                moveButton.value = "Move";
            }
        },
        
        refreshGridSelect: function(newgrid) {
            var sel = document.getElementById('grid');
            sel.innerHTML = '<option value="-1" selected="selected">--</option>';
            for (var i in gol.grids) {
                sel.innerHTML += '<option value="'+i+'">Grid '+i+'</option>';
            }
            sel.innerHTML += '<option value="-2">New Grid</option>';
            sel.value = newgrid;
            gol.getOptions(newgrid);
        },
        
        clearGrid: function(grid) {
            gol.grids[grid].alive = [];
            gol.grids[grid].gen = 1;
            gol.grids[grid].updateGen();
            gol.refreshAll();
        },
        
        closePopup: function() {
            document.getElementById('popup').style.display = "none";
        }
    };
    
    gol.grid = function(x, y, width, height, size) {
        var obj = this;
        obj.x = x;
        obj.y = y;
        obj.width = width;
        obj.height = height;
        obj.size = size;
        obj.alive = [];
        obj.prevX = -1;
        obj.prevY = -1;
        obj.selected = false;
        obj.reset = null;
        obj.gen = 1;
        
        obj.refreshCells = function() {
            for (var i in obj.alive) {
                for (var j in obj.alive[i]) {
                    gol.context.fillStyle = 'rgb(0,0,0)';
                    gol.context.fillRect(obj.x + i*(obj.size+1),obj.y + j*(obj.size+1),obj.size,obj.size);  
                }
            }
        };
        
        obj.refreshGrid = function(cellRefresh) { 
            gol.context.lineWidth = 1;
            gol.context.fillStyle = 'rgb(255,255,255)';
            gol.context.fillRect(obj.x,obj.y,obj.size + (obj.size+1)*(obj.width-1), obj.size + (obj.size+1)*(obj.height-1));
            if (obj.selected) {
                gol.context.strokeStyle = 'rgb(255,150,150)';
                gol.context.strokeRect(obj.x-1.5,obj.y-1.5,obj.size + (obj.size+1)*(obj.width-1) + 3, obj.size + (obj.size+1)*(obj.height-1) + 3);
            }
            gol.context.strokeStyle = 'rgb(230,230,230)';  
            for (var i = 0; i < obj.width - 1; i++) {
                gol.context.beginPath();
                gol.context.moveTo(obj.x + obj.size + (obj.size+1)*i + 0.5,obj.y);
                gol.context.lineTo(obj.x + obj.size + (obj.size+1)*i + 0.5, obj.y + obj.size + (obj.size+1)*(obj.height-1));
                gol.context.stroke();
            }
            for (var i = 0; i < obj.height - 1; i++) {
                gol.context.beginPath();
                gol.context.moveTo(obj.x,obj.y + obj.size + (obj.size+1)*i + 0.5);
                gol.context.lineTo(obj.x + obj.size + (obj.size+1)*(obj.width-1), obj.y + obj.size + (obj.size+1)*i+0.5);
                gol.context.stroke();
            }
            
            if (cellRefresh) obj.refreshCells();
        };
        
        obj.click = function(relX, relY) {
            var cellX = Math.floor(relX / (obj.size+1));
            var cellY = Math.floor(relY / (obj.size+1));
            if (cellX != obj.prevX || cellY != obj.prevY) {
                obj.prevX = cellX;
                obj.prevY = cellY;
                return obj.toggle(cellX, cellY);
            }
            return -1;
        };
        
        obj.onMouseUp = function() {
            obj.prevX = -1;
            obj.prevY = -1;
            gol.clickToGive = -1;
        }
        
        obj.toggle = function(x, y) {
            var reuslt = -1;
            if (obj.alive[x] == undefined) {
                if (gol.clickToGive == 1 || gol.clickToGive == -1) {
                    obj.alive[x] = [];
                    obj.alive[x][y] = true;
                    result = 1;
                }
            } else {
                if (obj.alive[x][y] == undefined) {
                    if (gol.clickToGive == 1 || gol.clickToGive == -1) {
                        obj.alive[x][y] = true;
                        result = 1;
                    }
                } else {
                    if (gol.clickToGive <= 0) {
                        var newColumn = new Array();
                        for (var i in obj.alive[x]) {
                            if (i != y) newColumn[i] = obj.alive[x];
                        }
                        obj.alive[x] = newColumn;
                        result = 0;
                    }
                }
            }
            gol.refreshAll();
            return result;
        };
        
        obj.step = function() {
            obj.newAlive = new Array();
            for (var i in obj.alive) {
                for (var j in obj.alive[i]) {
                    i = parseInt(i);
                    j = parseInt(j);
                    var cellNeighbours = 0;
                    if (obj.alive[i] != undefined && obj.alive[i][j-1] != undefined) {
                        cellNeighbours += 1;
                    } else { obj.deadCheck(i,j-1); }
                    if (obj.alive[i+1] != undefined && obj.alive[i+1][j] != undefined) {
                        cellNeighbours += 1;
                    } else { obj.deadCheck(i+1,j); }
                    if (obj.alive[i] != undefined && obj.alive[i][j+1] != undefined) {
                        cellNeighbours += 1;
                    } else { obj.deadCheck(i,j+1); }
                    if (obj.alive[i-1] != undefined && obj.alive[i-1][j] != undefined) {
                        cellNeighbours += 1;
                    } else { obj.deadCheck(i-1,j); }
                    if (obj.alive[i-1] != undefined && obj.alive[i-1][j-1] != undefined) {
                        cellNeighbours += 1;
                    } else { obj.deadCheck(i-1,j-1); }
                    if (obj.alive[i+1] != undefined && obj.alive[i+1][j-1] != undefined) {
                        cellNeighbours += 1;
                    } else { obj.deadCheck(i+1,j-1); }
                    if (obj.alive[i+1] != undefined && obj.alive[i+1][j+1] != undefined) {
                        cellNeighbours += 1;
                    } else { obj.deadCheck(i+1,j+1); }
                    if (obj.alive[i-1] != undefined && obj.alive[i-1][j+1] != undefined) {
                        cellNeighbours += 1;
                    } else { obj.deadCheck(i-1,j+1); }
                    
                    if (cellNeighbours >= 2 && cellNeighbours <= 3) {
                        if (obj.newAlive[i] == undefined) {
                            obj.newAlive[i] = [];
                            obj.newAlive[i][j] = true;
                        } else {
                            obj.newAlive[i][j] = true;
                        }
                    }
                }
            }
            obj.alive = obj.newAlive;
            obj.gen++;
            obj.refreshGrid(true);
            if (obj.selected) {
                obj.updateGen();
            }
        };
        
        obj.updateGen = function() {
            var genElement = document.getElementById('gen');
            if (genElement) {
                genElement.innerHTML = obj.gen;
            }
        };
        
        obj.deadCheck = function(i, j) {
            if (i >= 0 && i < obj.width && j >= 0 && j < obj.height) {
                var cellNeighbours = 0;
                if (obj.alive[i] != undefined && obj.alive[i][j-1] != undefined) {
                    cellNeighbours += 1;
                }
                if (obj.alive[i+1] != undefined && obj.alive[i+1][j] != undefined) {
                    cellNeighbours += 1;
                }
                if (obj.alive[i] != undefined && obj.alive[i][j+1] != undefined) {
                    cellNeighbours += 1;
                }
                if (obj.alive[i-1] != undefined && obj.alive[i-1][j] != undefined) {
                    cellNeighbours += 1;
                }
                if (obj.alive[i-1] != undefined && obj.alive[i-1][j-1] != undefined) {
                    cellNeighbours += 1;
                }
                if (obj.alive[i+1] != undefined && obj.alive[i+1][j-1] != undefined) {
                    cellNeighbours += 1;
                }
                if (obj.alive[i+1] != undefined && obj.alive[i+1][j+1] != undefined) {
                    cellNeighbours += 1;
                }
                if (obj.alive[i-1] != undefined && obj.alive[i-1][j+1] != undefined) {
                    cellNeighbours += 1;
                }
                
                if (cellNeighbours == 3) {
                    if (obj.newAlive[i] == undefined) {
                        obj.newAlive[i] = [];
                        obj.newAlive[i][j] = true;
                    } else {
                        if (obj.newAlive[i][j] == undefined) {
                            obj.newAlive[i][j] = true;
                        }
                    }
                }
            }
        };
        
        obj.select = function() {
            obj.selected = true;
            gol.refreshAll();
        };
        
        obj.deselect = function() {
            obj.selected = false;
            gol.refreshAll();
        };
    };
    
    return gol;
}();

window.onload = function() {
    gameOfLife.init(1024,800);
};