$(document).ready(function(){
	$("#hidden").css("display","none");
            
    $(".kitchenq").click(function(){
    	if ($('input[name=kitchen]:checked').val() == "1" ) {
        	$("#hidden").slideDown("fast"); //Slide Down Effect   
        } else {
            $("#hidden").slideUp("fast");	//Slide Up Effect
        }
     });            
});