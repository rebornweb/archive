(function(){
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


var dSliders = function (test){
this.test = test;
var dSlider = $('div.dreCycler img');
dSlider.css({
  'display':'none',
  'position':'absolute'
            });





}//End dSliders

var setterInit = function (test) {
  dSliders.call(this,test);
          //console.log(dlen);
}


setterInit.prototype = Object.create(dSliders.prototype);

  setterInit.prototype.start = function() {
 var dSlider = $('div.dreCycler img'),   
 fadeInspeed = 1500,
  fadeOutspeed = 1500,
  shiftingspeed = 1500,
  initFadeout = 1500,
  dlen = dSlider.length,
  startTime = 2000, /*If it doesnt work adjust startTime*/
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

//to call this use object.function.object obj.start().restartTime & obj.start().startTime
return {restartTime,startTime}
  }
  

 
 var obj = new setterInit('Dre Image Cycler');

 
//First Init
setTimeout(function(){
obj.start();
},obj.start().startTime);
 
setInterval(function(){
obj.start();
},obj.start().restartTime);

})();