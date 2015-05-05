/* Black Apple Inc.
 * http://black-apple.biz/
 * Dixie CMS
 * Created by Luthfie
 * luthfie@y7mail.com
 */




function top_menu(){
  var nav = document.getElementById('nav');
  var display = nav.style.display;
  if(display=="block"){
    nav.style.display="none";
  }else{
    nav.style.display="block";
  }
}

window.onresize = function(){
  var nav = document.getElementById('nav');
  var ww = window.innerWidth;
  if(ww<1000){
    nav.style.display="none";
  }else{
    nav.style.display="block";
  }
}

window.onscroll = function(){
  var scroller = document.getElementById('scroller');
  var wpo = window.pageYOffset;
  if(wpo>0){
    scroller.style.display="block";
  }else{
    scroller.style.display="none";
  }
}

function scroller_display(){
  var scroller = document.getElementById('scroller');
  var wpo = window.pageYOffset;
  if(wpo>0){
    scroller.style.display="block";
  }else{
    scroller.style.display="none";
  }
}

function scroll_top(id){
  var scrollY = 0;
  var currentY = window.pageYOffset;
  var targetY = document.getElementById(id).offsetTop;
  var animator = setTimeout('scroll_top(\''+id+'\')',9);
  if(currentY > targetY){
    scrollY = currentY-39;
    window.scroll(0, scrollY);
  }else{
    clearTimeout(animator);
  }
}