<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
							<input id="email" name="email" maxlength="80" tabindex="1" accesskey="e" required="" autofocus="" type="text"> 
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
                    	<span class="cella">
                        	<label for="foto"> Modifica foto profilo </label>
                        </span>
                    	<span class="cella">
                           <img src="data:image/jpg;base64,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 " width="100px" height="100px">                        
						   <input id="foto" name="foto" tabindex="5" accesskey="p" onclick="immagineCambiata=true;" type="file">											
						</span> 
                        
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
