<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>I miei eventi</title>
    </head>
    <body onload="caricaEventi()">
        <script type="text/javascript">
                        var xhr;
			function caricaEventi(){
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
				xhr.open("GET", "recuperaMieiEventi.php", true);
				xhr.send();
			}
			function gestoreRichiesta(){
                            if(xhr.readyState==4 & xhr.status==200){
					var risposta=xhr.responseText;
					document.getElementById("tavolaEventi").innerHTML=risposta;
				}
            }
           	function conferma(){
            	return confirm("Vuoi eliminare l'evento?");
            }
	</script>
        <style type="text/css">
         
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
			
			#tavolaAnnunci{
				display:table; 
				width:100%; 
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
				color: black;
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
				border-color:lime; 
				background-color:white;
			}
	</style>
        <?php
            include 'view/headerAreaRiservata.php';
        ?>
        <div id="content">
            <h1> I miei eventi </h1> 
            <h2>
            	<a href="inserisciEvento.php">  Inserisci un nuovo evento </a>
            </h2>
            <div id="tavolaEventi"></div>
	</div>
    </body>
</html>
