<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    $email = $_SESSION['utenteLoggato'];
?>

<html>
    <head>
        <title>Nuovo Evento</title>
        <script type="text/javascript">
        	var xhr;
			function validaModulo(oggModulo){
                            alert(oggModulo.getElementById('data').data);
                            if(document.getElementById("data").checked && oggModulo.data.value==""){
                                alert("Devi inserire una data per l'evento");
                                return false;
                            }
                
                            if(document.getElementById("regione").selectedIndex==0){
                                alert("Devi inserire la regione in cui organizzare l'evento");
                                return false;
                            }
                            if(document.getElementById("provincia").selectedIndex==0){
                                alert("Devi inserire la provincia in cui organizzare l'evento");
                                return false;
                            }
                            var orario = oggModulo.orario.value.split(":");
                            if(parseInt(orario[0])<0 || parseInt(orario[0])>23 || isNaN(parseInt(orario[0]))){
                                alert("Orario inserito non valido");
                                return false;
                            }
                            if(parseInt(orario[1])<0 || parseInt(orario[1])>59 || isNaN(parseInt(orario[1]))){
                                alert("Orario inserito non valido");
                                return false;
                            }
                            return true;
                
			}
                        function disabilitaCosto(){
                            prezzo.disabled="disabled";
                        }
                        function abilitaCosto(){
                            prezzo.disabled=null;
                        }
                        function popolaRegioni(){
			
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
				xhr.open("GET", "recuperaRegioni.php", true);
				xhr.send();
			}
                        function gestoreRichiesta(){
                            if(xhr.readyState==4 & xhr.status==200){
					var risposta=xhr.responseText;
					document.getElementById("regione").innerHTML=risposta;
				}
                        }
                        function recuperaProvince(oggSelect){
                            var regione=oggSelect.options[oggSelect.selectedIndex].value;
                            document.getElementById("provincia").disabled=null;
                            xhr.onreadystatechange=gestoreRichiestaProvince;
                            xhr.open("GET", "recuperaProvince.php?regione="+regione, true);
                            xhr.send();
                        }
                        function gestoreRichiestaProvince(){
                            if(xhr.readyState==4 & xhr.status==200){
				var risposta=xhr.responseText;
				document.getElementById("provincia").innerHTML=risposta;
                            }
                        }
                        function validateTel(){
                            if(isNaN(document.getElementById("telefono").value)){
                                document.getElementById("telefono").value="";
                                alert("Numero di telefono deve contenere solo cifre.");
                            }
                        }
            
          	
        </script>
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
                width:50%;
            }
            #registrazione{
		float:right; 
		margin-right:5px; 
		padding:5px
            }
            button[type="reset"]{
            	float:left; 
		margin-left:10px; 
		padding:5px
            }
            button[type="submit"]{
            	float:right;
                margin-right:10px; 
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
	</style>
    </head>
    <body onload="popolaRegioni();">
        <?php
            include 'view/headerAreaRiservata.php';
        ?>
        <div id="content">
            <div id="tavola2">
                <form action="controllaDatiNuovoEvento.php" method="post" enctype="multipart/form-data" onsubmit="return validaModulo(this);">
                    <fieldset>
                        <legend>Nuovo evento</legend>
                        <div class="riga"> 
                            <span class="cella"><label for="titolo"> Titolo artista/album vinile * </label></span> 
                            <span class="cella"><input id="titolo" name="titolo" size="20" maxlength="80" tabindex="1" accesskey="t" required="" autofocus="" type="text"></span> 
			</div>
                        <div class="riga">	
                            <span class="cella"><label for="info"> Info dettagliate </label></span> 
                            <span class="cella"><textarea id="info" name="info" rows="4" cols="50" tabindex="2" accesskey="i" type="text"></textarea></span> 
			</div>
                        <div class="riga"> 
                            <span class="cella"><label for="localita"> Localita' (via, citta', luogo) * </label></span> 
                            <span class="cella"><input id="localita" name="localita" maxlength="80" tabindex="3" accesskey="l" required="" autofocus="" type="text"></span> 
			</div>
                        <div class="riga">
                            <span class="cella"><label for="regione"> Regione * </label></span>
                            <span class="cella"><select id="regione" name="regione" tabindex="4" accesskey="r" onchange="recuperaProvince(this)" required=""></select></span>
                        </div>
                        <div class="riga">
                            <span class="cella"><label for="provincia"> Provincia * </label></span>
                            <span class="cella"><select name="provincia" id="provincia" tabindex="5" accesskey="p" disabled="" required=""></select></span>
                        </div>
                        <div class="riga"> 
                            <span class="cella"><label for="data"> Data dell'evento (gg/mm/aaaa) * </label></span> 
                            <span class="cella">
                                <input id="data" name="giorno" maxlength="2" size="2" type="number" min="01" max="31" required="" style="width: 5em">
                                <input id="data" name="mese" maxlength="2" size="2" type="number" min="01" max="12" required="" style="width: 5em">
                                <input id="data" name="anno" maxlength="4" size="4" type="number" min="2017" required="" style="width: 5em">
                            </span>
			</div>
                        <div class="riga"> 
                            <span class="cella"><label for="orario"> Orario dell'evento (hh:mm) * </label></span> 
                            <span class="cella">
                                <input id="hh" name="hh" maxlength="3" size="3" accesskey="h" required="" type="number" min="00" max="23" style="width: 3em">
                                <input id="mm" name="mm" maxlength="3" size="3" accesskey="h" required="" type="number" min="00" max="59" style="width: 3em">
                            </span> 
			</div>
                        <div class="riga">
                            <span class="cella"><label for="ingresso"> Tipo di ingresso * </label></span>
                            <span class="cella">
                                <input id="gratuito" name="ingresso" value="gratuito" tabindex="6" onclick="disabilitaCosto()" required="" type="radio"> Gratuito<br>
                                <input id="costo" name="ingresso" value="costo" tabindex="7" onclick="abilitaCosto()" required="" type="radio"> Inserisci costo (euro):  
                           	<input id="prezzo" name="prezzo" tabindex="8" accesskey="c" required="" min="0.5" step="0.5" type="number">
                            </span>
                        </div>
                        <div class="riga"> 
                            <span class="cella"><label for="posti"> Posti disponibili * </label></span> 
                            <span class="cella"><input id="posti" name="posti" tabindex="9" accesskey="s" required="" min="1" step="1" type="number"></span>
			</div>
                        <div class="riga"> 
                            <span class="cella"><label for="telefono"> Numero di telefono </label></span> 
                            <span class="cella"><input id="telefono" name="telefono" maxlength="15" tabindex="10" accesskey="t" type="text" onchange="validateTel()"></span> 
			</div>
                        <div class="riga"> 
                            <span class="cella"><label for="email"> Email </label></span> 
                            <span class="cella"><input id="email" name="email" value="<?php echo $email; ?>" maxlength="50" tabindex="11" accesskey="e" readonly="" type="text"></span> 
			</div>
                        <div class="riga"> 
                            <span class="cella"><button type="submit" id="inserimento" tabindex="12" accesskey="o"> Salva </button></span> 
                            <span class="cella"><button type="reset" tabindex="13" accesskey="a"> Annulla </button></span> 
			</div>
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>
