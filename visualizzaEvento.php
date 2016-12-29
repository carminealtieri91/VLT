<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
    session_start();
    include_once 'visualizzatoreEvento.php';
    include_once 'gestoreProfilo.php';
    include_once 'model/Evento.php';
    include_once 'model/Utente.php';
    $id = $_GET['id'];
    $visualizzatoreEvento = new visualizzatoreEvento();
    $evento = $visualizzatoreEvento->visualizza($id);
    $gestoreProfilo = new gestoreProfilo();
    $utenteOrganizzatore = $gestoreProfilo->recuperaProfilo($evento->getEmailOrganizzatore());
    if (isset($_SESSION['utenteLoggato'])){
        $email = $_SESSION['utenteLoggato'];
    }
?>

<html>
    <head>
        <title>Visualizza Evento</title>
        <style type="text/css">
		body{
                    font-family:serif;
                    border-radius:30px;
                    font-size:medium;
                    margin:0;
                    top:0;
                    left:0;
		}
			
		fieldset{
                    border-radius:30px; 
                    border-color:brown;
		}
		legend{
                    margin-left:120px; 
		}
                textarea{
                    border-radius:30px;
                    padding:15px;
                    overflow:auto;
                }
		#tavola2{
                    display:table; 
                    width:50%; 
                    height:auto; 
                    margin-left:auto;
                    margin-right:auto;
                    margin-top:30px;
		}
                #tavola3{
                    display:table;
                    width:57%;
                    height:50%;
                    margin-left: auto;
                    margin-right:auto;
                    margin-top: 10px;
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
		input{
                    border-radius:30px;
                    padding:2px;
   		}
		input[type="submit"]{
                    float:right; 
                    margin-right:5px; 
                    padding:5px;
                    border-radius:30px; 
                    border-color:brown; 
                    background-color:white;
		}
                input[type="reset"]{
                    float:left; 
                    margin-right:5px; 
                    padding:5px;
                    border-radius:30px; 
                    border-color:brown; 
                    background-color:white;
		}
                a{ 
                    text-decoration:none;
                    color:black;
                    font-style:itlaic;

		}	
    		 a:hover{
                    color:red;
   		}
            
                #sinistra{
                    float: left;
                
                    width:35%;
                }
                #destra{
                    float: right;
                    width:65%;
                }
                #center{
                    position:relative;
                    bottom:40px;
                    right:-80%;
                    width:100px;
                }
                h1, h3, h5{
                    text-align:center;
                    color:brown;
                }
                label{
                    color:brown;
                }
                #intestazione{
                    text-align:center;
                }
                #aScomparsa{
                    display:none;
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
	</style>
        <script type="text/javascript" language="javascript">
			var xhr;
			function caricaEvento(){
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
                                parametro=window.location.search;
				parametro=parametro.substring(1);
				url="recuperaDatiEvento.php?"+parametro;
				xhr.onreadystatechange=gestoreRichiesta;
				xhr.open("GET", url, true);
				xhr.send();

			}
			function gestoreRichiesta(){
                            if(xhr.readyState===4 && xhr.status===200){
                                var risposta=xhr.responseXML;
				response=risposta.getElementsByTagName('response')[0].childNodes;
				document.getElementById("tit").innerHTML=response[0].firstChild.data;   
                                if(response[1].firstChild===null)
                                    document.getElementById("info").innerHTML="-";
                                else{
                                    var info=response[1].firstChild.data;
                                    document.getElementById("info").innerHTML=info.replace(/(?:\r\n|\r|\n)/g, '<br />');
                                }
                                document.getElementById("localita").innerHTML=response[2].firstChild.data;
                                document.getElementById("reg").innerHTML=response[3].firstChild.data;
                                document.getElementById("provincia").innerHTML=response[4].firstChild.data;
                                document.getElementById("dataevento").innerHTML=response[5].firstChild.data;
                                document.getElementById("orarioevento").innerHTML=response[6].firstChild.data;
                                if(response[7].firstChild.data!=="Gratuito")
                                    document.getElementById("ingresso").innerHTML=response[7].firstChild.data+" €";
                                else
                                    document.getElementById("ingresso").innerHTML=response[7].firstChild.data;
                                document.getElementById("posti").innerHTML=response[8].firstChild.data;
                                if(document.getElementById("posti").innerHTML==="0")
                                    document.getElementById("posti").style.setProperty("color", "red");
                                if(response[9].firstChild===null)
                                    document.getElementById("telefono").innerHTML="-";
                                else{
                                    document.getElementById("telefono").innerHTML=response[9].firstChild.data;
                                }
                                document.getElementById("emailorganizzatore").innerHTML=response[10].firstChild.data;
                                if(response[11].firstChild.data==="si"){
                                    document.getElementById("preferito").src="../Immagini/stellaPiena.png";
                                    document.getElementById("gestionePreferito").innerHTML="Rimuovi dai preferiti";
                                }
                                else{
                                    document.getElementById("preferito").src="../Immagini/stellaVuota.png";
                                    document.getElementById("gestionePreferito").innerHTML="Aggiungi ai preferiti";
                                }
                                if(response[12].firstChild.data==="si"){
                                    document.getElementById("prenotazione").innerHTML="Annulla Prenotazione";
                                    document.getElementById("prenotazione").style.setProperty("background-color", "tomato");
                                    prenotazione.value="annullare";
                                }
                                else{
                                    document.getElementById("prenotazione").innerHTML="Effettua Prenotazione";
                                    document.getElementById("prenotazione").style.setProperty("background-color", "limegreen");
                                    prenotazione.value="effettuare";
                                }
                            }
                        }
                    function gestisciPreferito(){
                        var email = "<?php echo $email; ?>";
                        var emailOrganizzatore = "<?php echo $evento->getEmailOrganizzatore(); ?>";
                        var url = "gestisciUtentePreferito.php?utente="+email+"&&preferito="+emailOrganizzatore;
                        xhr.onreadystatechange=gestoreRichiestaPreferito;
			xhr.open("GET", url, true);
			xhr.send();
                    }
                function gestoreRichiestaPreferito(){
                    if(xhr.readyState===4 && xhr.status===200){
                	caricaEvento();
                    }
                }
                function confermaPrenotazione(){
                    if(confirm("Clicca OK per "+prenotazione.value+" la prenotazione")){
                        if(prenotazione.value==="effettuare" && (document.getElementById("posti").innerHTML==="0")){
                            alert("Spiacente. Al momento i posti sono esauriti.");
                        }
                        else{
                            gestisciPrenotazione();
                        }
                    }
                }
                 function gestisciPrenotazione(){
                        var email = "<?php echo $email; ?>";
                        var id = "<?php echo $id; ?>";
                        var url = "controllaDatiPrenotazione.php?utente="+email+"&&evento="+id+"&&tipo="+prenotazione.value;
                        xhr.onreadystatechange=gestoreRichiestaPrenotazione;
			xhr.open("GET", url, true);
			xhr.send();
                    }
                function gestoreRichiestaPrenotazione(){
                    if(xhr.readyState===4 && xhr.status===200){
                        alert("Richiesta di "+prenotazione.value+" la prenotazione eseguita con successo!");
                	window.location.reload();
                    }
                }
	</script>
        <meta charset="UTF-8">
    </head>
    <body onload="caricaEvento()">
        <?php
            if(isset($_SESSION['utenteLoggato'])){
                include 'view/headerAreaRiservata.php';
            }
            else{
                include 'view/header.php';
            }
        ?>
        <span id="intestazione"> 
            <h1 id="titolo"><?php echo $evento->getTitoloVinile() ?></h1>
            <?php 
                if((isset($email)) && $email == $utenteOrganizzatore->getEmail()){ 
                    echo "<h3>Questo è un tuo evento</h3>";
                }
                else{
                    $usernameOrganizz = $utenteOrganizzatore->getUsername();
                    echo "<h3>inserito da $usernameOrganizz </h3>";
                }
                if(isset($email) && $email!=$utenteOrganizzatore->getEmail()){
                    echo "<h5><img id='preferito' src=''> <a id='gestionePreferito' onclick='gestisciPreferito()'></a></h5>";
                }
            ?>
        </span>
        <div id="tavola2">
            <span id="evento">
                <fieldset>
                    <legend id="titolo1">Evento</legend>
                    <div id="sinistra">
                        <div class="riga">
                            <span class="cella">
                                <img id="animvinile" src="Immagini/lp_playing.gif" width="200px" height="120px">
                            </span>
                        </div>
                    </div>
                    <div id="destra">
                        <div class="riga">
                            <span class="cella"><label> Artista/Album vinile: </label></span>
                            <span class="cella"><span id="tit"></span></span>
                    	</div>
                        <div class="riga">
                            <span class="cella"><label> Info dettagliate: </label></span>
                            <span class="cella"><span id="info"></span></span>
                    	</div>
                        <div class="riga">
                            <span class="cella"><label> Località (luogo e città): </label></span>
                            <span class="cella"><span id="localita"></span></span>
                    	</div>
                        <div class="riga">
                            <span class="cella"><label> Regione: </label></span>
                            <span class="cella"><span id="reg"></span></span>
                    	</div>
                        <div class="riga">
                            <span class="cella"><label> Provincia: </label></span>
                            <span class="cella"><span id="provincia"></span></span>
                    	</div>
                        <div class="riga">
                            <span class="cella"><label> Data dell'evento: </label></span>
                            <span class="cella"><span id="dataevento"></span></span>
                    	</div>
                        <div class="riga">
                            <span class="cella"><label> Orario dell'evento: </label></span>
                            <span class="cella"><span id="orarioevento"></span></span>
                    	</div>
                        <div class="riga">
                            <span class="cella"><label> Ingresso: </label></span>
                            <span class="cella"><span id="ingresso"></span></span>
                    	</div>
                        <div class="riga">
                            <span class="cella"><label> Posti disponibili: </label></span>
                            <span class="cella"><span id="posti"></span></span>
                    	</div>
                        <div class="riga">
                            <span class="cella"><label> Numero di telefono: </label></span>
                            <span class="cella"><span id="telefono"></span></span>
                    	</div>
                        <div class="riga">
                            <span class="cella"><label> Email organizzatore: </label></span>
                            <span class="cella"><span id="emailorganizzatore"></span></span>
                    	</div>
                        <br>
                        <br>
                        <div class="riga">
                            <?php
                                if(isset($email) && $email!=$utenteOrganizzatore->getEmail()){
                                    echo "<span id='cella'><button id='prenotazione' type='submit' style='float:left' name='submit' value='' onclick='confermaPrenotazione()'></button> </span>";
                                }
                            ?>
                            <span class="cella"> <a href="javascript:history.back()"> Torna agli eventi </a> </span>
                            </form>
			</div>
                    </div>
                </fieldset>
            </span>
        </div>
    </body>
</html>
