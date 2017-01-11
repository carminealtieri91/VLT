<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
    $em = $_GET['email'];    
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Visualizza Profilo</title>
    </head>
    <body onload="caricaProfilo()">
        <style>
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
            
            img.immagine{
            float:left;
           }
            
			#info{
				display:table; 
				width:60%; 
				height:50%; 
				margin-left:auto;
				margin-right:auto;
               
			}
			div.riga{
				display:table-row; 
				
			}
			span.cella{
				display:table-cell; 
                text-align:center;
   				font-size:20px;
                width:50%;
                height:50%;
               
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
            h1, h2, h3{
            	color:brown;
                text-align:center;
                
            }
            #pannello{
            	display:none;
                margin-top:10px;
            }
            #tavola3{
                display:table;
                width:57%;
                height:50%;
                margin-left: auto;
                margin-right:auto;
                margin-top: 10px;
                text-align: center;
           }
		</style>
        <script language="javascript">
			var xhr;
			function caricaProfilo(){
            
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
                                var variabile = "<?php echo $em; ?>";
                                url="recuperaDatiProfilo.php?Email="+variabile;
				xhr.open("GET", url, true);
				xhr.send();
			}
			function gestoreRichiesta(){
            	if(xhr.readyState==4 & xhr.status==200){
					var risposta=xhr.responseText;
					document.getElementById("infoProfilo").innerHTML=risposta;
                    if(document.getElementById("emailUtente")==null){
                    	document.getElementById("pannello").style.display="block";
                    }
                }
            }
            function visualizzaFormFeedback(){
            	document.getElementById("aScomparsa").style.display="block";
            }

            </script>
        <?php
            include_once 'view/headerAreaRiservata.php';
        ?>
        <div class="navbar">
            <a class="navlink" onclick="visualizzaFormFeedback()" style="color: white; font-weight: bold;">Dai un feedback</a> 
	</div>
        <div id="contenitore">
            <div id="infoProfilo" style="margin:0 auto; height: 15%; width: 40%; text-align: center;"></div>
        </div>
        <div id="aScomparsa" style="display: none;">
            <div id="tavola3">
                <form method="POST" action="controllaDatiInserisciFeedback.php?utente=<?php echo $em ?>">
                    <fieldset>
                        <legend>Inserisci un feedback</legend>
                        <label for="votazione">Esprimi una valutazione all'utente (Da 1 a 5): </label>
                        <input type="number" min="1" max="5" name="voto" required="" step="1">
                        <button id="submit" type="submit" value="Invia">Invia</button>
                    </fieldset>
                </form>
            </div>  
        </div>
    </body>
</html>
