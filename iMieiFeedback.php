<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
    session_start();
    if(!isset($_SESSION['utenteLoggato'])){
        header("Location: erroreNoLogin.php");
        exit;
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>I Miei Feedback</title>
        <style>
        
        	#content{  
              margin-top: 10px; 
              background:transparent;
              width:100%; 
              text-align:center;
          }
         
			input{
				border-radius:30px;
			}
			
			
			
			#registrazione{
				float:right; 
				margin-right:5px; 
				padding:5px
			}
			
			a{
				text-decoration:underline; 
				color:brown; 
				 
			}
    		body{
				font-family:serif;
				border-radius:30px;
				font-size:medium;
                margin:0;
    			width:100%;
    			height:100%;
                
			}
			
			#tavolaFeedback{
				display:table; 
				width:60%; 
				height:50%; 
				margin-left:auto;
				margin-right:auto;
                margin-top:30px;
                text-align:center;
			}
			div.riga{
				display:table-row; 
				
			}
			span.cella{
				display:table-cell; 
                margin-left:auto;
				margin-right:auto;
                padding:5px;
                padding-left:10px;
                width:14%;
			}	
            
        	h1, h2, h3{
                color:brown;
                text-align:center;
            }
			a:link {
				font-weight: bold;
       			color: brown;
				text-decoration: none;
			}
			a:visited {
				font-weight: bold;
				color: darkred;
				text-decoration: none;
			}
			a:hover {
				font-weight: bold;
				color: red;
				text-decoration: underline;
			}
        	button[type="reset"]{
				float:left; 
				margin-left:5px; 
				padding:5px;
			}
            button[type="submit"]{
				float:right; 
				margin-left:5px; 
				padding:5px
			}
			button{
				border-radius:30px; 
				border-color:brown; 
				background-color:white;
			}
           
           
		</style>
        <script type="text/javascript">
			var xhr;
			function caricaMediaFeedback(){
				try{
					// Firefox, Opera 8.0+, Safari
					xhr= new XMLHttpRequest();
				}catch(e){
					// Internet Explorer
					try{
						xhr=new ActiveXObject("Msxml2.XMLHTTP");
					}catch(e){
							try{
								xhr=new ActiveXObject("Microsoft.XMLHTTP");
						}catch(e){
							alert("Your browser does not support AJAX!");
							return false;
						}
					}
				}
				xhr.onreadystatechange=gestoreRecuperaMediaFeedback;
				xhr.open("GET", "recuperaMediaFeedback.php", true);
				xhr.send();
			}
			function gestoreRecuperaMediaFeedback(){
            	if(xhr.readyState==4 & xhr.status==200){
					var risposta=xhr.responseText;
					document.getElementById("mediaFeedback").innerHTML=risposta;
                    caricaFeedback();
				}
            }
            
           function caricaFeedback(){
           		
           		xhr.onreadystatechange=gestoreRecuperaFeedback;
				xhr.open("GET", "recuperaFeedback.php", true);
                
				xhr.send();
                
           }
           function gestoreRecuperaFeedback(){
           		if(xhr.readyState==4 & xhr.status==200){
					var risposta=xhr.responseText;
					document.getElementById("tavolaFeedback").innerHTML=risposta;
                    
				}
           }
		</script>
    </head>
    <body onload="caricaMediaFeedback()">
        <?php
            include 'view/headerAreaRiservata.php';
        ?>
        <div id="content">
            <h1>I miei feedback</h1>
            <div id="contenitore">
                <div id="mediaFeedback" style="margin:0 auto; height: 30%; width: 15%; text-align: center;"></div>
                <div id="tavolaFeedback"></div>
            </div>
        </div>
    </body>
</html>
