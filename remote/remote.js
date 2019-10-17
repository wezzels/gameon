  var count = 0;
  if(typeof(EventSource) !== "undefined") {
    var source = new EventSource("v_scr.php");
    source.onmessage = function(event) {
        document.getElementById("v_scr").innerHTML = event.data ;
        //document.getElementById("result").innerHTML += event.data ;
    };
} else {
   document.getElementById("v_scr").innerHTML = "Sorry, your browser does not support server-sent events...";
}

  if(typeof(EventSource) !== "undefined") {
    var h_source = new EventSource("h_scr.php");
    h_source.onmessage = function(event) {
      document.getElementById("h_scr").innerHTML = event.data ;
    };
  } else {
   document.getElementById("h_scr").innerHTML = "Sorry, your browser does not support server-sent events...";
  }


var timeout = setTimeout(reloadUnit1, 90);
function reloadUnit1 () {
	$('#board').load('unit.php?hscore=0&ascore=0&set=0',function () {
        $('#').load('dataload.php');
        timeout = setTimeout(reloadUnit1, 9000);
	});
}

