
function left_carusel(class_id){
   var block_width = $('.carousel-block').width() + 20;
   $(class_id + " .carousel-block").eq(-1).clone().prependTo(class_id); 
   $(class_id + "").css({"left":"-"+block_width+"px"}); 
   $(class_id + "").animate({left: "0px"}, 200); 
   $(class_id + " .carousel-block").eq(-1).remove(); 
}
function right_carusel(class_id){
   var block_width = $('.carousel-block').width() + 20;
   $(class_id).animate({left: "-"+ block_width +"px"}, 200); 
   setTimeout(function () { 
      $(class_id + " .carousel-block").eq(0).clone().appendTo(class_id); 
      $(class_id + " .carousel-block").eq(0).remove(); 
      $(class_id).css({"left":"0px"}); 
   }, 300);
}