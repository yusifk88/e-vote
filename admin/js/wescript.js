function get_keycode(){
    
    var idnum = $("#index").val();
    if (!$("#index").val()){
        $("#index").focus();
        exit();
    }
    $("#wait_label").slideDown(200);
    $.get("varify.php?id="+idnum,function(data){
        $("#code").val(data);
    }).done(function(){
        
    $("#wait_label").slideUp(200);
        
    });
    
    
}
//-----------------------------------------------------------------------------------------------
function delconts(id){
   $.get("delconnts.php?id="+id,function(){
       
       alert("deleted");
       
   }).done(function(){
       
      $(this).parent().parent().remove();       
   });     
}
//----------------------------------------------------------------------------------------------
function genids(){
	$.post($("#frmgen").attr("action"),$("#frmgen :input").serializeArray(),function(d){		
		$("#status-alert").html(d);
		}).done(function(){
                    
                    	$.post("skipidex.php",$("#frmgen :input").serializeArray(),function(d){
                            
                            
                        }).done(function(){
                            
			$("#status-alert").slideDown(500);
                            
                        });
			}); }
	
	//---------------------------------------------------
	function saveoff(){

	
	$.post($("#frmregof").attr("action"),$("#frmregof :input").serializeArray(),function(d){		
		$("#regalert").html(d);
		}).done(function(){
			$("#regalert").slideDown(500);
			
			
			});
	
	
	
	}
	//--------------------------------------------------
	function regcan(){
		
			$.post($("#frmregcan").attr("action"),$("#frmregcan :input").serializeArray(),function(d){		
		$("#regstatus").html(d);
		}).done(function(){
			$("#regstatus").slideDown(500);
                            
                       
			
			
			});
	
		
		
		
		}
	
	
	
	
	//---------------------------------------------------
	$(document).ready(function(e) {

				  //------------------------------------------------------
		
		
		
		
		
        $("#btngenids").click(function(e) {
          
	$("#status-alert").hide();
            genids();
        });
		
		$("#btnsave").click(function(e) {
				$("#regalert").hide();
            saveoff();
		});
		
		$("#btnregcan").click(function(e) {
				$("#regstatus").hide();
            regcan();
			
			
        });
		
    });