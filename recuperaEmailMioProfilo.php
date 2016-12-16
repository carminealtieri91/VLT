<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Visualizza Profilo</title>
    </head>
    <body onload="caricaProfilo()">
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
                                var variabile = "stefdibenedetto88@gmail.com";
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
            function visualizzaAnnunci(){
                method= "post";
    			var form = document.createElement("form");
    			form.setAttribute("method", method);
    			form.setAttribute("action", "annunciUtente.php");
        		var hiddenField = document.createElement("input");
        		hiddenField.setAttribute("type", "text");
                var email = "stefdibenedetto88@gmail.com";
       			hiddenField.setAttribute("name", "email");
                hiddenField.setAttribute("value", email);
        		form.appendChild(hiddenField);
    			//document.body.appendChild(form);
    			form.submit();
            }
            function visualizzaFeedback(){
            	method= "post";
    			var form = document.createElement("form");
    			form.setAttribute("method", method);
    			form.setAttribute("action", "feedbackUtente.php");
        		var hiddenField = document.createElement("input");
        		hiddenField.setAttribute("type", "text");
                var email = "stefdibenedetto88@gmail.com";
       			hiddenField.setAttribute("name", "email");
                hiddenField.setAttribute("value", email);
        		form.appendChild(hiddenField);
    			//document.body.appendChild(form);
    			form.submit();
            }
            
		</script>
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
				border-color:brown; 
				background-color:white
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
            h1, h2, h3{
            	color:brown;
                text-align:center;
                
            }
            #pannello{
            	display:none;
                margin-top:10px;
            }
		</style>
        <?php
            include 'view/headerAreaRiservata.php';
        ?>
        <div id="contenitore">
            <div id="infoProfilo" style="margin:0 auto; height:15%; width:40%; text-align:center;"></div>
	</div>
    </body>
</html>