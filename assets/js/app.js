var modalBtn1 = document.querySelector('.Modal-btn1');
var modalBtn2 = document.querySelector('.Modal-btn2');
var modalBg = document.querySelector('.Modal-bg');
var modalClose = document.querySelector('.modal-close');
var bgText = document.querySelector('.bg-text');

// The connection role modal implementation
//Listen to click event on the connection button

   modalBtn1.addEventListener('click',function(){
   modalBg.classList.add('bg-active');
// Hide the text in background  

   if(bgText){
      bgText.classList.add('bg-desactive'); 
   } 

});


if(modalBtn2){
   modalBtn2.addEventListener('click',function(){
      modalBg.classList.add('bg-active'); 
 // Hide the text in background  

      if(bgText){
         bgText.classList.add('bg-desactive'); 
      } 
   
   });
}

   modalClose.addEventListener('click',function(){
      modalBg.classList.remove('bg-active'); 
      // Hide the text in background  
 
      if(bgText){
         bgText.classList.remove('bg-desactive'); 

      }
   
   });


