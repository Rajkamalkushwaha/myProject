<html>
<head>
<link rel="stylesheet" href="TicTacToe.css">
 <link href='https://fonts.googleapis.com/css?family=Lato:400,900,400italic,700italic' rel='stylesheet'>
 <script async src="https://www.google-analytics.com/analytics.js"></script>
<link href='https://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>

</head>

<body translate="no" >

  <div class="outer-container">
  <button class="hard-reset">Reset All</button>
  <p class="score-1"><span class="points"></span><span class="name"></span></p>
  <i class="points-divider">&#124;</i>
  <p class="score-2"><span class="points"></span><span class="name"></span></p>
  <div class="player-one-turn">
    <p></p>
  </div>
  <div class="player-two-turn">
    <p></p>
  </div>
  <div class="board-container">
    <div class="game-starter">
        <p>Would you like to be X or O?</p>
        <button class="choose-x">X</button>
        <button class="choose-o">O</button>
        <button class="back-button"><i class="fa fa-arrow-left"></i> Back</button>
      </div>
      <div class="game-choice">
        <p>How do you want to play?</p>
        <button class="one-player">One Player</button>
        <button class="two-player">Two Player</button>
      </div>
    <div class="game-board">
      <div class="draw-message">
        <p>It was a draw..</p>
      </div>
      <div class="lose-message">
        <p>Uh oh, you lost..</p>
      </div>
      <div class="win-message">
        <p>You Won!!! :)</p>
      </div>
      <canvas id="myCanvas"></canvas>
      <ul class="boxes">
      </ul>
    </div>
  </div>
</div>
<script>
"use strict";
"object"!=typeof window.CP&&(window.CP={}),
window.CP.PenTimer={
	programNoLongerBeingMonitored:!1,
            timeOfFirstCallToShouldStopLoop:0,_loopExits:{},
			_loopTimers:{},
			START_MONITORING_AFTER:2e3,STOP_ALL_MONITORING_TIMEOUT:5e3,
			MAX_TIME_IN_LOOP_WO_EXIT:2200,
			exitedLoop:function(o){this._loopExits[o]=!0},
			shouldStopLoop:function(o){
				if(this.programKilledSoStopMonitoring)
					return!0;
				if(this.programNoLongerBeingMonitored)
					return!1;
				if(this._loopExits[o])return!1;
				var t=this._getTime();
				if(0===this.timeOfFirstCallToShouldStopLoop)
					return this.timeOfFirstCallToShouldStopLoop=t,!1;
				var i=t-this.timeOfFirstCallToShouldStopLoop;
				if(i<this.START_MONITORING_AFTER)
					return!1;
				if(i>this.STOP_ALL_MONITORING_TIMEOUT)
					return this.programNoLongerBeingMonitored=!0,!1;
				try{
					this._checkOnInfiniteLoop(o,t)
					}catch(o){
						return this._sendErrorMessageToEditor(),
						this.programKilledSoStopMonitoring=!0,!0
						}
						return!1},_sendErrorMessageToEditor:function(){
							try{
								if(this._shouldPostMessage()){
									var o={action:"infinite-loop",line:this._findAroundLineNumber()};
									parent.postMessage(JSON.stringify(o),"*")
									}else this._throwAnErrorToStopPen()
									}catch(o){
										this._throwAnErrorToStopPen()
										}
										},_shouldPostMessage:function(){return document.location.href.match(/boomerang/)},
										_throwAnErrorToStopPen:function(){
											throw"We found an infinite loop in your Pen. We've stopped the Pen from running. Please correct it or contact support@codepen.io."},
											_findAroundLineNumber:function(){
												var o=new Error,t=0;
												if(o.stack){
													var i=o.stack.match(/boomerang\S+:(\d+):\d+/);i&&(t=i[1])}return t},
													_checkOnInfiniteLoop:function(o,t){
														if(!this._loopTimers[o])
															return this._loopTimers[o]=t,!1;
														var i=t-this._loopTimers[o];
														if(i>this.MAX_TIME_IN_LOOP_WO_EXIT)
															throw"Infinite Loop found on loop: "+o},
														_getTime:function(){
															return+new Date
															}},window.CP.shouldStopExecution=function(o){
																var t=window.CP.PenTimer.shouldStopLoop(o);
																return t===!0&&console.warn("[CodePen]: An infinite loop (or a loop taking too long) was detected, so we stopped its execution. Sorry!"),t},
																window.CP.exitedLoop=function(o){window.CP.PenTimer.exitedLoop(o)};
																</script>

  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script >


var MYAPP = MYAPP || {
  gameInPlay: false,
  winCombos: [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9],
    [1, 4, 7],
    [2, 5, 8],
    [3, 6, 9],
    [1, 5, 9],
    [7, 5, 3]
  ],
  playerOneScore: 0,
  playerTwoScore: 0,
  timeOuts: [],
  initializeVars: function() {
    this.numFilledIn = 0;
    this.currentBoard = {
      1: '',
      2: '',
      3: '',
      4: '',
      5: '',
      6: '',
      7: '',
      8: '',
      9: ''
    };
  },
  initializeGame: function() {
    MYAPP.initializeVars();
    MYAPP.display.drawBoard();
    $('.game-choice button').click(function() {
      MYAPP.secondPlayer = MYAPP.game.gameSelection(this);
      MYAPP.display.hideGameChoice();
      MYAPP.display.showGameStarter(MYAPP.secondPlayer);
      $('.game-starter .choose-x, .game-starter .choose-o').off().click(MYAPP.game.firstGame);

      $('.back-button').on('click', function() {
        MYAPP.display.hideGameStarter();
        MYAPP.display.showGameChoice();
      });
    });
    $('.hard-reset').on('click', MYAPP.game.resetGame);
  }
};

  /*=========================
      Display functions
==========================*/
MYAPP.display = {  
  hideGameStarter: function() {
  $('.game-starter').fadeOut();
},

  showGameStarter: function(isTwoPlayer) {
  var message;
  if (isTwoPlayer) {
    message = "Player 1 : Would you like X or O?"
  }
  else {
    message = "Would you like to be X or O?";
  }
  MYAPP.timeOuts.push(
    setTimeout(function() {
      $('.game-starter').fadeIn(500).children('p').text(message);
  }, 700));
},

  showGameChoice: function() {
  $('.game-choice').fadeIn(600);
},

  hideGameChoice: function() {
  $('.game-choice').fadeOut(600);
},

  showPlayerOnePrompt: function() {
  if (MYAPP.secondPlayer) {
    $('.player-one-turn p').text('Go Player 1!');
  }
  else {
    $('.player-one-turn p').text('Your turn!');
  }
  $('.player-one-turn').animate({'top': '-45px'}, 500);
},

  hidePlayerOnePrompt: function() {
  $('.player-one-turn').animate({'top': '0'}, 500);
},

  showPlayerTwoPrompt: function() {
  if (MYAPP.secondPlayer) {
    $('.player-two-turn p').text('Go Player 2!');
  }
  else {
    $('.player-two-turn p').text('Computer\'s turn');
  }
  $('.player-two-turn').animate({'top': '-45px'}, 500);
},

  hidePlayerTwoPrompt: function() {
  $('.player-two-turn').animate({'top': '0'}, 500);
},

  showDrawMessage: function() {
  MYAPP.timeOuts.push(
    setTimeout(function() {
    $('.draw-message').fadeIn(500);
  }, 1500));
},

  hideDrawMessage: function() {
  $('.draw-message').fadeOut(1000);
},

  showLoseMessage: function() {
    MYAPP.timeOuts.push(
      setTimeout(function() {
    $('.lose-message').fadeIn(500);
}, 1500)
    );
},

  hideLoseMessage: function() {
  $('.lose-message').fadeOut(1000);
},

  showWinMessage: function() {
    MYAPP.timeOuts.push(
      setTimeout(function() {
    $('.win-message').fadeIn(500).children('p').text("Player " + MYAPP.turn + " wins!! :D ")
}, 1500));
},

  hideWinMessage: function() {
  $('.win-message').fadeOut(1000);
},

  drawBoard: function() {
    MYAPP.timeOuts.push(setTimeout(function() {
    var c = document.getElementById("myCanvas");
    var canvas = c.getContext("2d");
    canvas.lineWidth = 1;
    canvas.strokeStyle = "#fff";
    //vertical lines
    canvas.beginPath();
    canvas.moveTo(100, 0);
    canvas.lineTo(100, 146.5);
    canvas.closePath();
    canvas.stroke();
    canvas.beginPath();
    canvas.moveTo(200, 0);
    canvas.lineTo(200, 146.5);
    canvas.closePath();
    canvas.stroke();

    // horizontal lines
    canvas.lineWidth = .5;

    canvas.beginPath();
    canvas.moveTo(4, 48.5);
    canvas.lineTo(296, 48.5);
    canvas.closePath();
    canvas.stroke();
      
    canvas.beginPath();
    canvas.moveTo(4, 98.5);
    canvas.lineTo(296, 98.5);
    canvas.closePath();
    canvas.stroke();  
  }, 1500));
},

  resetSquares: function() {
  $('.boxes').html('');
  for (var i = 1; i <= 9; i++) {if (window.CP.shouldStopExecution(1)){break;}
    var box = '<li class="' + i + '"><i class="letter"><span></span></i></li>';
    $(box).appendTo($('.boxes'));
  }
window.CP.exitedLoop(1);

},
  
  showScore: function() {
    if (MYAPP.secondPlayer) {
      $('.score-1').children('.name').text('player 1'); 
      $('.score-2').children('.name').text('player 2'); 
    }
    else {
      $('.score-1').children('.name').text('player 1'); 
      $('.score-2').children('.name').text('computer'); 
    }
    $('.score-1, .score-2').children('.points').text('0');
    $('.score-1,.score-2, .points-divider').fadeIn();
  },
  updateScore: function(turn) {
    var currentScore = turn === 1 ? MYAPP.playerOneScore : MYAPP.playerTwoScore;

    $('.score-' + turn).children('.points').text(currentScore);
  }
};

/*=========================
      Game Logic
==========================*/
MYAPP.game = {
  whoStarts: function() {
    var random = Math.floor(Math.random() * 2 + 1);
    return random;
  },
  gameSelection: function(item) {
    if ($(item).text() === 'One Player') {
      // returns what secondPlayer value to set
      return false;
    }
    else {
      return true;
    } 
  },
  firstGame: function() {
    MYAPP.playerOneSymbol = $(this).text();
    MYAPP.playerTwoSymbol = MYAPP.playerOneSymbol == 'X' ? 'O' : 'X'; 
    MYAPP.turn = MYAPP.game.whoStarts();
    MYAPP.display.hideGameStarter();
    $('#myCanvas').animate({'opacity': '1'}, 1200);
    $('.hard-reset').fadeIn(600);
    MYAPP.display.showScore();
    MYAPP.display.resetSquares();
    MYAPP.game.play();
  },
  play: function() {
    
    MYAPP.gameInPlay = true;
    $('.boxes li').on('click', function() {
     MYAPP.game.playerTurn(this);
    });  
    
    MYAPP.timeOuts.push(
      setTimeout(function(){
      if (MYAPP.turn === 1) {
        MYAPP.display.showPlayerOnePrompt();
      }
      else if (MYAPP.turn === 2) {
        MYAPP.display.showPlayerTwoPrompt();
      }
    }, 1500),
    setTimeout(function() {
      if (MYAPP.turn === 2 && !MYAPP.secondPlayer) {
        MYAPP.game.computerPlay();
      }
    }, 1200));
  },
  playerTurn: function(square) {
    var symbol = MYAPP.turn === 1 ? MYAPP.playerOneSymbol : MYAPP.playerTwoSymbol;
    var box = $(square).children('i').children('span');
    if (box.text() === '' && MYAPP.gameInPlay && (MYAPP.turn === 1 || (MYAPP.turn === 2 && MYAPP.secondPlayer))) {
      box.text(symbol);
      var number = $(square).attr('class');
      MYAPP.game.updateSquare(number, symbol);
      MYAPP.game.endTurn(symbol);
    }
  },
  computerPlay: function() {
    var computer = MYAPP.computer;
    //test computer move suggestion
    var boxNumber;
    if (computer.computerWhichMove(MYAPP.game) && MYAPP.turn === 2) {
      boxNumber = computer.computerWhichMove(MYAPP.game);
      var currentBox = $('.' + boxNumber).children('i');
      
      var symbol = MYAPP.playerTwoSymbol;

      MYAPP.timeOuts.push(
        setTimeout(function() {
        currentBox.children('span').text(symbol);
        MYAPP.game.updateSquare(boxNumber, MYAPP.playerTwoSymbol);
        MYAPP.game.endTurn(symbol);
      }, 1000));
    } 
  },
  endTurn: function(symbol) {
    MYAPP.numFilledIn = MYAPP.numFilledIn + 1;
    if (MYAPP.gameInPlay) {
      if (MYAPP.game.checkWin(symbol)[0]) {
        MYAPP.game.updateScore(MYAPP.turn);
        if (MYAPP.secondPlayer) {
          MYAPP.display.showWinMessage();
        }
        else {
          MYAPP.turn === 1 ? MYAPP.display.showWinMessage() : MYAPP.display.showLoseMessage();
        }
        MYAPP.gameInPlay = false;
        MYAPP.game.showWinningCombination();
        MYAPP.display.hidePlayerOnePrompt();
        MYAPP.display.hidePlayerTwoPrompt();
        MYAPP.game.reset();
      }
      // stop if it is a draw
      else if (MYAPP.numFilledIn >= 9) {
        MYAPP.gameInPlay = false;
        MYAPP.display.hidePlayerOnePrompt();
        MYAPP.display.hidePlayerTwoPrompt();
        MYAPP.display.showDrawMessage();
        MYAPP.turn = MYAPP.game.whoStarts();
        MYAPP.game.reset();
      } else {
        if (MYAPP.turn === 1) {
          MYAPP.display.hidePlayerOnePrompt();
          MYAPP.display.showPlayerTwoPrompt();
          MYAPP.turn = 2;
          // call computer turn if no second player
          if (!MYAPP.secondPlayer) {
            MYAPP.game.computerPlay();
          }
        } else if (MYAPP.turn === 2) {
          MYAPP.display.showPlayerOnePrompt();
          MYAPP.display.hidePlayerTwoPrompt();
          MYAPP.turn = 1;
        }
      }
    }
  },
  updateSquare: function(number, symbol) {
    MYAPP.currentBoard[number] = symbol;
  },
  checkWin: function(symbol) {
    var currentBoard = MYAPP.currentBoard;
    var wins = MYAPP.winCombos;
    var winningCombo = [];
    var winner = wins.some(function(combination) {
      var winning = true;
      for (var i = 0; i < combination.length; i++) {if (window.CP.shouldStopExecution(2)){break;}
        if (currentBoard[combination[i]] !== symbol) {
          winning = false;
        }
      }
window.CP.exitedLoop(2);

      if (winning) {
        winningCombo = combination;
      }
      return winning;
    });
    return [winner, winningCombo];
  },
  showWinningCombination: function() {
    var symbol = MYAPP.turn === 1 ? MYAPP.playerOneSymbol : MYAPP.playerTwoSymbol;
    var combo = MYAPP.game.checkWin(symbol)[1];
    for (var i = 0; i < combo.length; i++) {if (window.CP.shouldStopExecution(3)){break;}
      var currentBox = '.' + combo[i]; 
   // Black box and rotating test for winning combo  
        $(currentBox).children('i').addClass('win').children('span').addClass('rotate');
     }
window.CP.exitedLoop(3);

  },
  updateScore: function(turn) {
    turn === 1 ? MYAPP.playerOneScore += 1 : MYAPP.playerTwoScore += 1; 
    
    MYAPP.display.updateScore(turn);
    
  },
  reset: function() {
    MYAPP.initializeVars();
    
    MYAPP.timeOuts.push(
      setTimeout(function() {
        MYAPP.display.hideDrawMessage();
        MYAPP.display.hideLoseMessage();
        MYAPP.display.hideWinMessage();
        $('.boxes li').fadeOut();
      }, 5000),
      setTimeout(function(){
        MYAPP.display.resetSquares();
        $('.boxes li').fadeIn();
        MYAPP.numFilledIn = 0;
      }, 6000),
    //Make sure time for next timeout is long enough
    //to not cause problems after first game
      setTimeout(function() {
        MYAPP.gameInPlay = true;
        MYAPP.game.play();
      }, 6000)
      );
  },
  resetGame: function() {
    $('#myCanvas').css('opacity', '0');
    $('.hard-reset').fadeOut();
    $('.points-divider, .score-1, .score-2').fadeOut();
    MYAPP.playerOneScore = 0;
    MYAPP.playerTwoScore = 0;
    MYAPP.display.resetSquares();
    MYAPP.initializeVars();
    MYAPP.gameInPlay = false;
    MYAPP.playerOneSymbol = null;
    MYAPP.playerTwoSymbol = null;
    MYAPP.timeOuts.forEach(function(timer) {
      clearTimeout(timer);
    });
    $('.draw-message, .win-message, .lose-message').hide();
    MYAPP.display.hidePlayerOnePrompt();
    MYAPP.display.hidePlayerTwoPrompt();
    MYAPP.display.showGameChoice();
  }
};

/* End Game Logic */
  
/*================================
    Computer Move Decisions
=================================*/    

MYAPP.computer = {
  computerWhichMove: function () {
    var move = this.winOrBlockChoice('win')[0];
    if (!move) {
      move = this.winOrBlockChoice('block')[0];
      console.log(this.winOrBlockChoice('block'));
    }
    if (!move) {
      move = this.doubleThreatChoice('win');
    }
    if (!move) {
      move = this.doubleThreatChoice('block');
    }
    if (!move) {
      move = this.firstPlay();
    }
    if (!move) {
      move = this.playCenter();
    }
    if (!move) {
      move = this.emptyCorner();
    }
    if (!move) {
      move = this.emptySide();
    }
    move = (move && MYAPP.currentBoard[move]) === '' ? move : false;
    return move;
  },

  winOrBlockChoice: function(choiceType, board) {
    var board = board || MYAPP.currentBoard;
    if (choiceType === 'win') {
      var currentSymbol = MYAPP.playerTwoSymbol;
      var opponentSymbol = MYAPP.playerOneSymbol;
    } else if (choiceType === 'block') {
      var currentSymbol = MYAPP.playerOneSymbol;
      var opponentSymbol = MYAPP.playerTwoSymbol;
    } else {
      return;
    }
    var moves = [];
    MYAPP.winCombos.forEach(function(combo) {
      var notFound = [];
      var notPlayer = true;
      for (var i = 0; i < combo.length; i++) {if (window.CP.shouldStopExecution(4)){break;}
        if (board[combo[i]] !== currentSymbol) {
          if (board[combo[i]] === opponentSymbol) {
            notPlayer = false;
          } else {
            notFound.push(combo[i]);
          }
        }
      }
window.CP.exitedLoop(4);

      if (notFound.length === 1 && notPlayer) {
        var move = notFound[0];
        moves.push(move);
      }
    });
    return moves;
},

  doubleThreatChoice: function(choiceType) {
  // use winChoice function to test a spot for double threat
  var board = MYAPP.currentBoard;
  var move;

  if (choiceType === 'win') {
    var currentSymbol = MYAPP.playerTwoSymbol;
    var opponentSymbol = MYAPP.playerOneSymbol;
  } else if (choiceType === 'block') {
    var currentSymbol = MYAPP.playerOneSymbol;
    var opponentSymbol = MYAPP.playerTwoSymbol;
  }

  // forced diagonal win on 4th move prevention
    if (board[5] === currentSymbol && MYAPP.numFilledIn === 3) {
      if ((board[1] === opponentSymbol && board[9] === opponentSymbol) || (board[3] === opponentSymbol && board[7] === opponentSymbol)) {
        // Play an edge to block double threat
        move = this.emptySide();
      }
    }
  
    if (!move && board[5] === opponentSymbol && MYAPP.numFilledIn === 2) {
      move = this.diagonalSecondAttack();
    }

  if (!move) {
    // clone current board;
    var testBoard = $.extend({}, board);
    for (var i = 1; i <= 9; i++) {if (window.CP.shouldStopExecution(5)){break;}

      testBoard = $.extend({}, board);
      if (testBoard[i] === '') {
        testBoard[i] = currentSymbol;
        if (this.winOrBlockChoice(choiceType, testBoard).length >= 2) {
          move = i;
        }
      }
    }
window.CP.exitedLoop(5);

  }
  return move || false;
},

  diagonalSecondAttack: function() {
  var board = MYAPP.currentBoard;
  var comp = MYAPP.playerTwoSymbol;
  var corners = [1,3,7,9];
  for (var i = 0; i < corners.length; i++) {if (window.CP.shouldStopExecution(6)){break;}
    if (board[corners[i]] === comp) {
      return 10 - corners[i];
    }
  }
window.CP.exitedLoop(6);

},

  firstPlay: function() {
  var board = MYAPP.currentBoard;
  var corners = [1, 3, 7, 9];
  var move;
  if (MYAPP.numFilledIn === 1) {
    // player plays center
    if (board[5] === MYAPP.playerOneSymbol) {
      var cornerNum = Math.floor(Math.random() * 4 + 1);
      move = [1, 3, 7, 9][cornerNum];
    }
    //player plays corner, play opposite corner
    else {
      for (var i = 0; i < corners.length; i++) {if (window.CP.shouldStopExecution(7)){break;}
        if (MYAPP.currentBoard[corners[i]] === MYAPP.playerOneSymbol) {
          move = 5;
        }
      }
window.CP.exitedLoop(7);

    }
  } else if (MYAPP.numFilledIn === 0) {
    var cornerNum = Math.floor(Math.random() * corners.length + 1);
    move = corners[cornerNum];
  }
  return move ? move : false;
},
  
  playCenter: function() {
    if (MYAPP.currentBoard[5] === '') {
      return 5;
    }
  },
  emptyCorner: function() {
  var board = MYAPP.currentBoard;
  var corners = [1, 3, 7, 9];
  var move;
  for (var i = 0; i < corners.length; i++) {if (window.CP.shouldStopExecution(8)){break;}
    if (board[corners[i]] === '') {
      move = corners[i];
    }
  }
window.CP.exitedLoop(8);

  return move || false;
},

  emptySide: function() {
  var sides = [2, 4, 6, 8];
  for (var i = 0; i < sides.length; i++) {if (window.CP.shouldStopExecution(9)){break;}
    if (MYAPP.currentBoard[sides[i]] === '') {
      return sides[i];
    }
  }
window.CP.exitedLoop(9);

  return false;
}
}

/* End Computer Move Decisions */  

$(document).ready(function() {  
  MYAPP.initializeGame();
});

/* end game initialization */
      //# sourceURL=pen.js
    </script>



  
  

</body>

</html>
 