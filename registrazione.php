<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
    session_start();
    if(isset($_SESSION['utenteLoggato'])){
        header("Location: index.php");
        exit;
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>VLT Registrazione</title>
        <style>
            #header{
       		width:100%;
            
            
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
		border-color:brown; 
		background-color:white
			}
            #content{  
                margin-top: 10px; 
                background:transparent;
                width:100%; 
                text-align:left;
            }
          
           
          
          html, body, #container{ 
                min-height:100%; 
                width:100%;
                height:100%;
          } 
          
          html>body, html>body #container{
                height:auto;
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
                width:48%; 
		height:50%; 
		margin-left:auto;
		margin-right:auto;
                margin-top:30px;
                position:relative;
			}
            div.riga{
		display:table-row; 
				
			}
            span.cella{
		display:table-cell; 
                margin-left:auto;
		margin-right:auto;
                padding:5px
			}
            #registrazione{
		float:right; 
		margin-right:5px; 
		padding:5px
			}
            button[type="reset"]{
		float:left; 
		margin-left:5px; 
		padding:5px
			}
            button{
		border-radius:30px; 
		border-color:brown; 
		background-color:white
			}
            a{
		text-decoration:underline; 
		color:black; 
		font-style:italic; 
			}
            
		</style>
        <script type="text/javascript">
			function validaModulo(oggModulo) {
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
					alert("Email non puo terminare con un .");
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
				if(oggModulo.terminiUso!=checked){
					alert("Devi accettare termini d'uso");
					return false;
				}
				return true;
			}
		</script>
    </head>
    <body>
        <?php 
            include 'view/header.php';
        ?>
        <div id="content">
		<div id="tavola2">
			<form action="controllaDatiRegistrazione.php" method="post" enctype="multipart/form-data" onsubmit="return validaModulo(this);">
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
							<input id="password" name="password" tabindex="3" accesskey="p" required="" type="password"> 
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
							<label for="foto"> Carica foto profilo </label>
						</span> 
						<span class="cella"> 
							<input id="foto" name="foto" tabindex="5" accesskey="p" type="file">
						</span> 
					</div>
					<div class="riga"> 
						<span class="cella"> 
							<input id="terminiUso" name="terminiUso" tabindex="6" accesskey="t" required="" type="checkbox"> 
							Accetto TERMINI E CONDIZIONI D'USO
						</span> 
					</div>
					<div class="riga"> 
						<span class="cella"> 
							<button type="submit" id="registrazione" tabindex="7" accesskey="s"> Registrati</button> 
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
