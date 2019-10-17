var hour = 0
    , minute = 0
    , second = 0
    , millisecond = 0
    , started = null
    , durationCompleted = false
    , bTime = null
    , msi = 0;
var audio = new Audio('Buzz.wav');

function set_timer(sethour,setmin,setsec) {
    hour = hour + sethour;
    minute = minute + setmin;
    second = second + setsec;
    millisecond = 2;
    }

function start() {
    msi = 0;
    bTime = new Date();
    clockRunning();
    started = setInterval(clockRunning, 10 );	
    durationCompleted = true;
}

function stop() {
    clearInterval(started);
}
 
function update_timer() {
    clearInterval(started);
    hour = 0;
    minute = 0;
    second = 60;
    document.getElementById("timer-area").innerHTML = "0" + minute + ":" + second;
}

function clockRunning(){
    var currTime = new Date();
    msi = msi + (currTime - bTime);
    if ( msi > 10 ) {
      console.log("milliseconds : " + millisecond + " ms " + msi );
      millisecond = millisecond - msi/10; //Math.round(msi/10);
//      bTime = currTime;
      msi = 0;
    }
    if ( millisecond < 0 ) {
        second--;
        millisecond = 99;
        if ( second < 0 ) {
            minute--;
            second = 59;
            if ( minute < 0 ) {
                hour--;
                minute = 59;
                if ( hour < 0) {
                   durationCompleted = true;
                   minute = 0;
                   second = 0;
                   millisecond = 00;
                   clearInterval(started);
                   var min = minute
                     , sec = second
                     , ms = millisecond;
                   audio.play();
                   }
                }
            }
         }

  if ( durationCompleted ) {
    var min = minute
        , sec = second
        , ms = Math.floor(millisecond);
    if ( minute > 0 ) { 
      document.getElementById("timer-area").innerHTML = 
        (min > 9 ? min : "0" + min) + ":" + 
        (sec > 9 ? sec : "0" + sec);
     } else {
      
        document.getElementById("timer-area").innerHTML =
          (sec > 9 ? sec : "0" + sec) + ":" +
          (ms > 99 ? ms : ms > 9 ? "" + ms : "0" + ms);
    }
  }
bTime = currTime;
}
