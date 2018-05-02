$(document).ready(function(){

   var gameStatus = {};

    gameStatus.reset = function(){
      this.init();
      this.strict = false;
    }

    gameStatus.init = function(){
      this.lastPush = $('#0');
      this.sequence = [];
      this.tStepInd = 0;
      this.index = 0;
      this.count = 0;
      this.lock = false;
    };

   
    function playGoodTone(num){
      gameStatus.currPush = $('#'+num);
      gameStatus.currPush.addClass('light');
    };

    function stopGoodTones(){
      if(gameStatus.currPush)
        gameStatus.currPush.removeClass('light');
        gameStatus.currPush = undefined;
	};

 

    function gameStart(){
      resetTimers();
    
      $('.count').text('--').removeClass('led-off');
      flashMessage('--',1);
      gameStatus.init();
      addStep();
    }

    function setTimeStep(num){
      var tSteps = [1250 , 1000 , 750, 500 ];
      if (num < 4)
        return tSteps[0];
      if (num < 8)
        return tSteps[1];
      if (num < 12)
        return tSteps[2];
      return tSteps[3];
    }

    function notifyError(pushObj){
      gameStatus.lock = true;
      $('.push').removeClass('clickable').addClass('unclickable');
     
      if(pushObj)
        pushObj.addClass('light');
      gameStatus.toHndl = setTimeout(function(){
      
        if(pushObj)
          pushObj.removeClass('light');
        gameStatus.toHndlSt = setTimeout(function(){
          if(gameStatus.strict)
            gameStart()
            else
              playSequence();
        },1000);
      },1000);
      flashMessage('!!',2);
    };

    function notifyWin(){
      flashMessage('**',2);
    }

    function flashMessage(msg,times){
      $('.count').text(msg);
      var lf = function(){
        $('.count').addClass('led-off');
        gameStatus.toHndlFl = setTimeout(function(){
          $('.count').removeClass('led-off');
        },250);
      };
      var cnt = 0;
      lf();
      gameStatus.flHndl = setInterval(function(){
        lf();
        cnt++;
        if(cnt === times)
          clearInterval(gameStatus.flHndl);
      },500)
    };

    function displayCount(){
      var p = (gameStatus.count < 10) ? '0' : '';
      $('.count').text(p+(gameStatus.count+''));
    }

    function playSequence(){
      var i = 0;
      gameStatus.index = 0;
      gameStatus.sequencehandle1 = setInterval(function(){
        displayCount();
        gameStatus.lock = true;
        playGoodTone(gameStatus.sequence[i]);
        gameStatus.toHndl = setTimeout(stopGoodTones,gameStatus.timeStep/2 - 10);
        i++;
        if(i === gameStatus.sequence.length){
          clearInterval(gameStatus.sequencehandle1);
          $('.push').removeClass('unclickable').addClass('clickable');
          gameStatus.lock = false;
          gameStatus.toHndl = setTimeout(notifyError,5*gameStatus.timeStep);
        }
      },gameStatus.timeStep);
    };

    function addStep(){
      gameStatus.timeStep = setTimeStep(gameStatus.count++);
      gameStatus.sequence.push(Math.floor(Math.random()*4));
      gameStatus.toHndl=setTimeout(playSequence,500);
    };

    function resetTimers(){
      clearInterval(gameStatus.sequencehandle1);
      clearInterval(gameStatus.flHndl);
      clearTimeout(gameStatus.toHndl);
      clearTimeout(gameStatus.toHndlFl);
      clearTimeout(gameStatus.toHndlSt);
    };

    function pushColor(pushObj){
      if(!gameStatus.lock) {
        clearTimeout(gameStatus.toHndl);
        var pushNr = pushObj.attr('id');
        if( pushNr == gameStatus.sequence[gameStatus.index]
            && gameStatus.index < gameStatus.sequence.length){

          playGoodTone(pushNr);
          gameStatus.lastPush = pushObj;
          gameStatus.index++;
          if(gameStatus.index < gameStatus.sequence.length){
            gameStatus.toHndl = setTimeout(notifyError,5*gameStatus.timeStep);
          }else if (gameStatus.index == 20){
            $('.push').removeClass('clickable').addClass('unclickable');
            gameStatus.toHndl = setTimeout(notifyWin,gameStatus.timeStep);
          }else{
            $('.push').removeClass('clickable').addClass('unclickable');
            addStep();
          }
        }else{
          $('.push').removeClass('clickable').addClass('unclickable');
          notifyError(pushObj);
        }
      }
    }

    $('.push').mousedown(function(){
      pushColor($(this));
    });

    $('*').mouseup(function(e){
      e.stopPropagation();
      if(!gameStatus.lock)
        stopGoodTones();
    });


    function toggleStrict(){
      $('#mode-led').toggleClass('led-on');
      gameStatus.strict = !gameStatus.strict;
    }

    $('.sw-slot').click(function(){
      $('#pwr-sw').toggleClass('sw-on');
      if($('#pwr-sw').hasClass('sw-on')==false){
        gameStatus.reset();
        $('.count').text('--');
        $('.count').addClass('led-off');
        $('#mode-led').removeClass('led-on');
        $('.push').removeClass('clickable').addClass('unclickable');
        $('#start').off('click');
        $('#mode').off('click');
        $('.btn').removeClass('unclickable').addClass('clickable');
        resetTimers();
        stopGoodTones();
      }else{
        $('.btn').removeClass('unclickable').addClass('clickable');
        $('.count').removeClass('led-off');
        $('#start').click(gameStart);
        $('#mode').click(toggleStrict);
      }
    });

    gameStatus.reset();

  
});
