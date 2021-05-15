$(document).ready(()=>{
$('.show-sticky').waypoint(direction=>{
   
    if(direction =="down"){
     $('nav').addClass('sticky');
    }
    else{
     $('nav').removeClass('sticky');
    }
},{
  offset:"100px;"
}
);
});