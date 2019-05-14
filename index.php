<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Wesoft.- Electronic Voting System| Verification</title>
         <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>

<script>
    function verify(){
            $("#wait_label").fadeOut(200);
        $("#wait-label").html("Please wait...");
        if(!$("#idnum").val() || !$("#secode").val()){
        $("#wait-label").html("Error, please make sure you enter your ID number and your security code");
        $("#wait-label").slideDown(200);              
        }else if($("#secode").val().length<5 && $("#secode").val().length >1){
          $("#wait-label").html("Error, your security code should be 5 alpha-numeric charactors, please ckeck and try again");
            $("#wait-label").slideDown(200);              
        }else{
            $.get("verify.php?idnum="+$("#idnum").val()+"&secode="+$("#secode").val(),function(data){                
            }).done(function(data){
                if(data == 'go'){
                 window.location = "./vote-page.php";   
                }else{
             $("#wait-label").html(data);   
              $("#wait-label").slideDown(200);
                }        
    });
        }
    }   
    
    </script>
    </head>
     <body>
        <div class="container-fluid" style="padding-top:15em;">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4">                    
                    <div class="panel panel-primary" style="border-radius:0; box-shadow:0 0 2px;">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <label class="control-label">ID Number</label>
                                    <input style="border-radius:0;" type="text" id="idnum" class="form-control" placeholder="Enter your ID number (Index Number)" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <label class="control-label">Security Code</label>
                                    <input maxlength="5" style="border-radius:0;" type="text" id="secode" class="form-control" placeholder="Enter your security code here" />
                                </div>
                            </div>
                            
                        </div>
                        <div class="panel-footer">
                            <button onclick="verify();" style="border-radius:0;" type="button" class="btn btn-primary btn-block">Authenticate</button>
                        </div>
                    </div>
                </div> 
                
                <div class="col-lg-4 col-md-4">
                    <div class="alert alert-danger">
                        <center>  <h4>PLEASE VERIFY YOUR IDENTITY</h4></center><br/>
                        please enter your ID number and your security code given by the verification officer.<br/>
                        <b>Pease beware that security codes are CASE SENSITIVE. If you also find any difficulties, please contact your EC. </b>
                        
                    </div>
                    
                    
                    
                    
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-offset-4 col-md-offset-4 col-lg-4 col-mg-4">
                    <center>
                        <label id="wait-label" class="text-danger" style="display:none;">
                        Please wait...
                    </label>
                    </center>                    
                </div>
            </div>
            
        </div>
        
    </body>
</html>
