 /*=============================================
 =            sidebar menu    =
 =============================================*/

  $('.sidebar-menu').tree()

   /*=============================================
 =            tablas   =
 =============================================*/

 $(".tablas").DataTable({

 	"language":{
 		
 	}
 });


  //iCheck for checkbox and radio inputs

  
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })