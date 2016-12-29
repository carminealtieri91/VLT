<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php $id = $_GET['id']; ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Modifica Evento</title>
    </head>
    <body onload="caricaDati()">
        <style>
			body{
				font-family:serif;
				border-radius:30px;
				font-size:medium;
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
                color: darkred;
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
            var primoFocus=true;
            var primoFocusProvince=true;
            function popolaRegioni(){
                xhr.onreadystatechange=gestoreRichiesta;
		xhr.open("GET", "recuperaRegioni.php", true);
		xhr.send();
            }
            function gestoreRichiesta(){
            	if(xhr.readyState==4 & xhr.status==200){
                    var risposta=xhr.responseText;
                    document.getElementById("regione").innerHTML=risposta;
                    /*var index = getOptionIndex(document.getElementById("regione"), response[9].firstChild.data);
           			document.getElementById("regione").options[index].selected;
                    recuperaProvince(response[9].firstChild.data);
                    index = getOptionIndex(document.getElementById("provincia"), response[5].firstChild.data);
					document.getElementById("provincia").options[index].selected;*/
                    document.getElementById("provincia").innerHTML="";
                    document.getElementById("regione").blur();
                    document.getElementById("provincia").disabled="true";
                    primoFocus=false;
		}
            }
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
                //queste istruzioni servono per recuperare in javascript l'id e l'email dell'annuncio
		parametro=window.location.search;
                parametro=parametro.substring(1);
		//parametro sarÃ  uguale a id=identificativoAnnuncio quindi l'url sarÃ  recuperaDatiAnnuncio.php?id=identificativoAnnuncio
		url="recuperaDatiEvento.php?"+parametro;
                xhr.onreadystatechange=gestoreRichiestaRecuperaDati;
                xhr.open("GET", url, true);
		xhr.send();
            }
            function gestoreRichiestaRecuperaDati(){
				
		if(xhr.readyState==4 & xhr.status==200){
                    var risposta=xhr.responseXML;
                    response=risposta.getElementsByTagName('response')[0].childNodes;
                    titolo.value=response[0].firstChild.data;
                    if(response[1].firstChild==null)
                        info.value="";
                    else
                        info.value=response[1].firstChild.data;
                    localita.value=response[2].firstChild.data;
                    //popolaRegioni();
                    document.getElementById("regioneScelta").value=response[3].firstChild.data;
                    document.getElementById("regioneScelta").innerHTML=response[3].firstChild.data;
                    
                    document.getElementById("provinciaScelta").value=response[4].firstChild.data;
                    document.getElementById("provinciaScelta").innerHTML=response[4].firstChild.data;
                    var data = response[5].firstChild.data;
                    var datasplitted = data.split("/");
                    document.getElementsByName("giorno")[0].value=datasplitted[0];
                    document.getElementsByName("mese")[0].value=datasplitted[1];
                    document.getElementsByName("anno")[0].value=datasplitted[2];
                    orario.value=response[6].firstChild.data;
                    if(response[7].firstChild==="Gratuito"){
                        gratuito.checked=true;
                    }
                    else{
                        costo.checked=true;
                        prezzo.value=response[7].firstChild.data;
                    }
                    posti.value=response[8].firstChild.data;
                    if(response[9].firstChild==null)
                        telefono.value="";
                    else
                        telefono.value=response[9].firstChild.data;
                    email.value=response[10].firstChild.data;			
		}
            }
            function getOptionIndex(select, chiave){
            	var n= select.options.length;
                for (var i=0;i<n;i++) {
                    if(select.options[i].value==chiave) {
                    	return i;
                    }
		}
                return 0;
            }
            
			
            function validaModulo(oggModulo){
         	titoloVecchio = response[0].firstChild.data;
                infoVecchio = response[1].firstChild.data;
                localitaVecchia = response[2].firstChild.data;
                regioneVecchia=response[3].firstChild.data;
		provinciaVecchia=response[4].firstChild.data;
		dataVecchia=response[5].firstChild.data;
		orarioVecchio=response[6].firstChild.data;
		ingressoVecchio.value=response[7].firstChild.data;
		telefonoVecchio.value=response[8].firstChild.data;
                
                titolo = oggModulo.titolo.value;
                info = oggModulo.info.value;
                localita = oggModulo.localita.value;
                regione=oggModulo.regione.value;
		provincia=oggModulo.provincia.value;
		data=oggModulo.data.value;
		orario=oggModulo.orario.value;
		telefono=oggModulo.telefono.value;
		ingresso=oggModulo.ingresso.value;
                
                if(titolo==titoloVecchio && info==infoVecchio && localita==localitaVecchio && regione==regioneVecchia && provincia==provinciaVecchia && data==dataVecchia && orario==orarioVecchio && telefono==telefonoVecchio && ingresso==ingressoVecchio){
                    alert("Nessun campo modificato");
                    return false;
                	
                }
                
                if(document.getElementById("regione").selectedIndex==0){
                    alert("Devi inserire la regione in cui si svolge l'evento");
                    return false;
                }
                if(document.getElementById("provincia").selectedIndex==0){
                    alert("Devi inserire la provincia in cui si svolge l'evento");
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
            function recuperaProvince(){
            	var oggSelect=document.getElementById("regione");
                var regione=oggSelect.options[oggSelect.selectedIndex].value;
            	if(document.getElementById("provincia").disabled)
                    document.getElementById("provincia").disabled=null;
                    xhr.onreadystatechange=gestoreRichiestaProvince;
                    xhr.open("GET", "recuperaProvince.php?regione="+regione, true);
                    xhr.send();
            }
            function gestoreRichiestaProvince(){
            	if(xhr.readyState==4 & xhr.status==200){
                    var risposta=xhr.responseText;
                    document.getElementById("provincia").innerHTML=risposta;
                    document.getElementById("provincia").blur();
                    primoFocusProvince=false;
		}
            }
         </script>
        <?php
            include 'view/headerAreaRiservata.php';
        ?>
        <div id="tavola2">
            <form action="controllaDatiModificaEvento.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data" onsubmit="return validaModulo(this);">
                <fieldset>
                    <legend>Modifica Evento</legend>
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
                        <span class="cella">
                            <select name="regione" id="regione" tabindex="8" accesskey="r" onfocus="if(primoFocus)popolaRegioni(); " onchange="recuperaProvince()" required="">  
                        	<option id="regioneScelta" selected="" value=""></option>
                            </select>
                        </span>
                    </div>
                    <div class="riga">
                        <span class="cella"><label for="provincia"> Provincia * </label></span>
                        <span class="cella">
                            <select name="provincia" id="provincia" tabindex="9" accesskey="p" onfocus="if(primoFocusProvince)recuperaProvince();" required=""> 
                                <option id="provinciaScelta" selected="" value=""></option>
                            </select>
                        </span>
                    </div> 
                    <div class="riga"> 
                        <span class="cella"><label for="data"> Data dell'evento (gg/mm/aaaa) * </label></span> 
                        <span class="cella">
                            <input id="data" name="giorno" maxlength="2" size="2" type="text" required="">
                            <input id="data" name="mese" maxlength="2" size="2" type="text" required="">
                            <input id="data" name="anno" maxlength="4" size="4" type="text" required="">
                        </span>  <!-- correggere data minima di inserimento -->
                    </div>
                    <div class="riga"> 
                        <span class="cella"><label for="orario"> Orario dell'evento (hh:mm) * </label></span> 
                        <span class="cella"><input id="orario" name="orario" maxlength="8" size="8" accesskey="h" required="" type="text"></span> 
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
                        <span class="cella"><input id="posti" name="posti" tabindex="9" accesskey="s" required="" min="1" step="1" type="number" disabled=""></span>
                    </div>
                        <div class="riga"> 
                            <span class="cella"><label for="telefono"> Numero di telefono </label></span> 
                            <span class="cella"><input id="telefono" name="telefono" maxlength="15" tabindex="10" accesskey="t" type="tel"></span> 
			</div>
                        <div class="riga"> 
                            <span class="cella"><label for="email"> Email </label></span> 
                            <span class="cella"><input id="email" name="email" value="<?php echo $email; ?>" maxlength="50" tabindex="11" accesskey="e" readonly="" type="text" disabled=""></span> 
			</div>
                        <div class="riga"> 
                            <span class="cella"><button type="submit" id="modifica" tabindex="12" accesskey="o"> Modifica </button></span> 
                            <span class="cella"><button type="reset" tabindex="13" accesskey="a"> Resetta </button></span> 
			</div>
                </fieldset>
            </form>
        </div>
    </body>
</html>
