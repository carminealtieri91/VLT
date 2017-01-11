<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php session_start()?>

<html>
    <head>
        <title>Scopri il fenomeno: Vinyl Listening Together</title>
        <meta charset="UTF-8">
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
            h1{
		color:brown;
                text-align:center;
            }
            body{
        	margin:0;
   		width:100%;
    		height:100%;
                font-family:serif;
		border-radius:30px;
		font-size:medium;
            }
            legend{
                margin-left:130px; 
            }
            fieldset{
		border-radius:30px; 
		border-color:brown;
                margin:10px;
            }	
            p{
        	text-align:center;
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
    </head>
    <body>
        <?php 
            if(isset($_SESSION['utenteLoggato'])){
                include_once 'view/headerAreaRiservata.php';
            }
            else{
                include_once 'view/header.php';
            }
        ?>
        <div id="content">
	<h1>Vinyl Listening Together</h1>
		<form>
			<fieldset>
				<legend>Scopri di più!</legend>
                                <p>
                                    Il fenomeno VLT (acronimo di Vinyl Listening Together), ossia letteralmente "ascoltare un
                                    vinile insieme", è stato ideato un po’ di anni fa da una appassionata di musica Olga Baczynska (di origine
                                    polacca), che a Berlino ha sperimentato per la prima volta questo metodo di ascolto con alcuni amici e
                                    conoscenti.
                                    Attualmente non è un fenomeno molto conosciuto ma è piuttosto un esperimento sociale-musicale,
                                    tenendo conto anche della recente ripresa di quota sul mercato da parte del vinile, spesso acclamato in
                                    termini di qualità sonora ma non solo.
                                </p>
                                <p>
                                    Ogni utente può decidere di mettere a disposizione un proprio disco in vinile per condividere l'ascolto con
                                    altre persone, condivisione che a discrezione dell'organizzatore può essere gratuita o sotto un piccolo compenso
                                    economico (solitamente compreso tra 50 cent e 2 euro), eventuale pagamento che avviene all'ingresso del posto in cui
                                    si tiene l'evento.
                                </p>
                                <p>
                                    Ogni utente iscritto al portale può decidere di organizzare un evento o decidere di partecipare a quelli
                                    esistenti, inserendo quindi un nuovo evento o prenotandosi a questi ultimi attraverso questo portale.
                                    L'organizzatore avrà poi la facoltà di visualizzare la lista dei prenotati all'evento.
                                </p>
                                <p>
                                    L'iniziata ha un discretto impatto anche a livello sociale, infatti questi eventi oltre ad essere considerati a
                                    livello musicale, possono essere considerati anche a livello di aggregazione sociale.
                                </p>
                                <p>
                                    Il portale dispone di un sistema di ricerca degli eventi sul territorio nazionale, e di un sistema feedback in cui
                                    ogni utente può esprimere un giudizio (da 1 a 5) verso un altro utente, utile per verificare la serietà e l'affidabilità, ma
                                    non solo, di ogni utente.
                                </p>
			</fieldset>
		</form>
		<div>
			<marquee scrollamount="3" scrolldelay="1" direction="right" align="middle" width="100%" height="100">
				<img src="../Immagini/vinyl-record-animation.gif" width="160" height="160" border="0">
			</marquee>
		</div>
	</div>
    </body>
</html>
