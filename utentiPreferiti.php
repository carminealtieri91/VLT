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
        <title>Utenti Preferiti</title>
    </head>
    <body onload="caricaPreferiti()">
        <style>
         #header{  
         	 width:100%;
         }
      
          #content{  
            margin-top: 10px; 
            background:transparent;
            width:100%; 
            text-align:center;
          }
      
     
        	body{
				font-family:serif;
				border-radius:30px;
				font-size:medium;
                margin:0;
    			width:100%;
    			height:100%;
			}
			input{
				border-radius:30px;
			}
			fieldset{
				border-radius:30px; 
				border-color:brown;
			}
			legend{
				margin-left:120px; 
			}
			#tavolaPreferiti{
				display:table; 
				width:60%; 
				height:50%; 
				margin-left:auto;
				margin-right:auto;
                margin-top:30px;
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
                width:25%;
			}
			#registrazione{
				float:right; 
				margin-right:5px; 
				padding:5px
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
				border-color:lime; 
				background-color:white
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
            h1,h3{
            	color:brown;
                text-align:center;
                
            }
		</style>
        <script type="text/javascript">
			var xhr;
			function caricaPreferiti(){
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
				xhr.onreadystatechange=gestoreRichiesta;
				xhr.open("GET", "recuperaUtentiPreferiti.php", true);
				xhr.send();
			}
			function gestoreRichiesta(){
                            if(xhr.readyState==4 & xhr.status==200){
				var risposta=xhr.responseText;
				document.getElementById("tavolaPreferiti").innerHTML=risposta;
                            }
                    }
            function modifica(){
            	alert("modifica");
            }
            function confermaEliminaPreferito(){
            	return confirm("Vuoi eliminare l'utente dai preferiti?")
            }
		</script>
        <?php
            include_once 'view/headerAreaRiservata.php';
        ?>
        <div id="header">
            <h1> Utenti preferiti </h1>
        </div>
        <div id="content">
            <div id="tavolaPreferiti"></div>
        </div>
    </body>
</html>
