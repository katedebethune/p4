'use strict';
/*
$( document ).ready(function() {
 	
 	$( "#menu-items > p:even" ).css( "background-color", "#C5DAEE" );
	$( "#menu-items > p:odd" ).css( "background-color", "#FFF9E8" );
});
*/
/*window.addEventListener("load", function load(event){ */
window.addEventListener("load", function load(event) {
  var overlay = document.createElement('div');
  overlay.setAttribute('id', 'overlay');
  overlay.setAttribute('style', 'fontSize: 10px; background-color: #000; opacity: .5; filter: alpha(opacity=70); position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 10;');
  document.body.appendChild(overlay);
  var msg = document.createElement('div');
  var txt = document.createTextNode('Judith\'s Kitchen will be closed for Columbus Day. Thank you! (Click to close)');
  msg.appendChild(txt);
  msg.setAttribute('id', 'msg');
  msg.setAttribute('style', 'position: absolute;background-color: #FFF9E8; padding: 10px; width: 200px; height: 120px; font-size: .9em; z-index: 11; top: 50%; left: 50%; margin-left: -100px; margin-top: -100px;');
 
  //msg.onclick = restore;
  document.body.appendChild(msg);
  
  msg.onclick = restore;
  /*
   msg.addEventListener('click', function () {
    var a = document.getElementById('overlay');
    var b = document.getElementById('msg');
    document.body.removeChild(a);
    document.body.removeChild(b);
  }); */
  function restore() {
    var a = document.getElementById('overlay');
    var b = document.getElementById('msg');
    document.body.removeChild(a);
    document.body.removeChild(b);
  }
  
});
