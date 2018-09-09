$(document).ready(function(){
 
    $(".input").keyup(function(){  
        var form= $(".input").val(); 
        form = form.toUpperCase(); 
          
        $.ajax({	
            type: 'POST',    
            url: 'search.php',    
            data: 'uses='+form,     
            success: function(html){ 
                         $(".block").html(html);  
                     }
        }); 
  
        setTimeout(start,100); 
   
    });
      
    function start(){  
        
        var form_info =$(".block").html();
        var operant=(form_info.length); 
        
        if(operant>0){
            $(".wrapper_block").css("display","block");
        } else $(".wrapper_block").css("display","none"); 
  
    }
  
    $(".search").click(function(){
        var width = $('input').css("width"); 
        $("head").append("<link rel='stylesheet' type='text/css' href='css/active.css' />");
        if(width > '100px'){
            $("head").append("<link rel='stylesheet' type='text/css' href='css/style.css' />");
        }    
    });

     
});  
                
