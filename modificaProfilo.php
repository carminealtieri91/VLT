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
        <title>Modifica Profilo</title>
    </head>
    <body onload="caricaDati()">
        <style type="text/css">
        	#header{  
      			width:100%;
      		}
      		#content{  
                margin-top: 10px; 
                background:transparent;
                width:100%; 
                text-align:left;
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
			#tavola2{
				display:table; 
				width:35%; 
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
                width:50%;
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
                color: limeGreen;
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
            
		</style>
        <script type="text/javascript">
            var xhr;
            var immagineCambiata=false; 
            function caricaDati(){
			
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
		xhr.open("GET", "recuperaDati.php", true);
		xhr.send();
            }
			function gestoreRichiesta(){
			
				if(xhr.readyState===4 & xhr.status===200){
					var risposta=xhr.responseXML;
					response=risposta.getElementsByTagName('response')[0].childNodes;
					email.value=response[0].firstChild.nodeValue;
					username.value=response[2].firstChild.nodeValue;
					password.value=response[1].firstChild.nodeValue;
                                        confermaPassword.value=response[1].firstChild.nodeValue;
				}
			}
			function validaModulo(oggModulo) {
            	emailVecchia = response[0].firstChild.data;
                usernameVecchia = response[2].firstChild.data;
                passwordVecchia = response[1].firstChild.data;
                
                email = oggModulo.email.value;
                username = oggModulo.username.value;
                password = oggModulo.password.value;
                
                if(email==emailVecchia && username==usernameVecchia && password==passwordVecchia && !immagineCambiata){
                 	alert("Nessun campo modificato");
                    return false;
                	
                }
                	
				if (oggModulo.email.value == "") {
					alert("Devi inserire una email");
					oggModulo.email.focus();
					return false;
				} 
				var caratteriNonValidi = " /:,;"

				for (var i=0; i<caratteriNonValidi.length; i++) {
					var noCar = caratteriNonValidi.charAt(i);
					if (oggModulo.email.value.indexOf(noCar,0) > -1) {
						alert("L'email non puÃ² contenere / : , ;");
						oggModulo.email.focus();
						oggModulo.email.select();
						return false;
					}
				}
				//cerchiamo @
				atPos = oggModulo.email.value.indexOf("@",1);
				if (atPos == -1){
                	alert("Devi inserire una email");
					oggModulo.email.focus();
                    oggModulo.email.select();
					return false;
				} 
				//ci deve essere solo un simbolo @
				if (oggModulo.email.value.indexOf("@",atPos+1) != -1) {
					alert("Devi inserire una email");
					oggModulo.email.focus();
					return false;
				} 
				//cerchiamo il .
				dotPos = oggModulo.email.value.indexOf(".",atPos);
				if (dotPos == -1) {
					alert("Devi inserire una email");
					oggModulo.email.focus();
					return false;
				} 
				
				dotPos=oggModulo.email.value.lastIndexOf(".");
				//aggiustare
				if (oggModulo.email.value.length - dotPos>5 || oggModulo.email.value.length - dotPos<2){
					alert("Email non puÃ² terminare con un .");
					oggModulo.email.focus();
					return false;
				}
				if (oggModulo.password.value == "") {
					alert("Devi inserire una password");
					oggModulo.password.focus();
					return false;
				}
				if (oggModulo.password.value != oggModulo.confermaPassword.value) {
					alert("Le due password non corrispondono");
					oggModulo.password.focus();
					oggModulo.password.select();
					oggModulo.confermaPassword.value="";
					return false;
				}
				
				return true;
			}
            function svuotaConfermaPassword(){
            	document.getElementById("confermaPassword").value="";
            }
		</script>
        <?php
            include_once 'view/headerAreaRiservata.php';
        ?>
        <div id="content">
		<div id="tavola2">
        
			<form action="controllaDatiModificaProfilo.php" method="post" enctype="multipart/form-data" onsubmit="return validaModulo(this);">
				
                <fieldset>
					<legend> Dati </legend>
					
					<div class="riga"> 
						<span class="cella"> 
							<label for="email"> Email * </label> 
						</span> 
						<span class="cella"> 
                                                    <input id="email" name="email" maxlength="80" tabindex="1" accesskey="e" required="" autofocus="" readonly=""> 
						</span> 
					</div>
					<div class="riga"> 	
						<span class="cella"> 
							<label for="username"> Username * </label> 
						</span> 
						<span class="cella">
							<input id="username" name="username" maxlength="50" tabindex="2" accesskey="u" required="" type="text"> 
						</span> 
					</div>
					<div class="riga"> 
						<span class="cella"> 
							<label for="password"> Password * </label> 
						</span>
						<span class="cella"> 
							<input id="password" name="password" tabindex="3" accesskey="p" required="" onchange="svuotaConfermaPassword();" type="password"> 
						</span> 
					</div>
					<div class="riga">
						<span class="cella"> 
							<label for="confermaPassword"> Conferma password * </label> 
						</span> 
						<span class="cella">
							<input id="confermaPassword" name="confermaPassword" tabindex="4" accesskey="c" required="" type="password">
						</span> 
					</div>
					<div class="riga"> 
                    	
                        
					</div>
					
					<div class="riga"> 
						<span class="cella"> 
							<button type="submit" id="modifica" tabindex="7" accesskey="s"> Modifica Profilo</button> 
						</span> 
						<span class="cella"> 
							<button type="reset" tabindex="8" accesskey="r"> Resetta </button> 
						</span> 
					</div>
					
				</fieldset>
			</form>
		</div>
        
	</div>
    </body>
</html>
