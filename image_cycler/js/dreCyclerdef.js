$(function(){
/*
*jQuery Cycle Plugin for images
*
*Andrei Nicolas
*
*Visit Fork,Visit if good star at http://github.com/rebornweb/neoscript
*
*Visit us at Rebornweb.co.nz
*
*Usage: add class='dreCycler' to div wrap
*<div class='dreCycler'>
*<img src='img/tiger.jpg'/>
    <img src='img/girls.jpg'/>
*</div>

*/

jQuery.fn.dSlider = function (){
var dSlider = $('div.dreCycler img');
var setterInit = {};
var fadeInspeed = 1500,
  fadeOutspeed = 1500,
  shiftingspeed = 1500,
  initFadeout = 1500,
  dlen = dSlider.length,
restartTime = (dlen * shiftingspeed);

for(var i=0 ; i < dlen; i++){
   
   //console.log($(this).eq(i).attr('src'));

  (function(i){ 
     setTimeout(function(){
     dSlider.eq(i).fadeIn(fadeInspeed);
 
    setTimeout(function(){
      dSlider.eq(i).fadeOut(fadeOutspeed);
           },initFadeout);
      
    }, i * shiftingspeed);

    }(i));//Funny Loop

  
}//End for loop


  setterInit.restart = function() {
    return restartTime;
  }

return setterInit;

};

//This Gets the return restartTime closure Instantiation this was the main selector $(div.dreCycler img)
 var restartTime = $(this).dSlider().restart();

setInterval(function(){
$(this).dSlider();
},restartTime);

});