$(document).ready(function() {
    // executes when HTML-Document is loaded and DOM is ready
   console.log("document is ready");
     
   
     $( ".card" ).hover(
     function() {
       $(this).addClass('shadow-lg').css('cursor', 'pointer'); 
     }, function() {
       $(this).removeClass('shadow-lg');
     }
   );
   
    $(".pop").on('click', function() {
      $('.imagepreview').attr('src', $(this).find('img').attr('src'));
      $('#imagemodal').modal('show');
    }); 
});