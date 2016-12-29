<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
    session_start();
    $provincia = $_GET['provincia']; 
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Eventi</title>
    </head>
    <body onload="caricaEventi()">
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
				color:black; 
				
			}
    		body{
				font-family:serif;
				border-radius:30px;
				font-size:medium;
                margin:0;
                top:0;
                left:0;
    			width:100%;
    			height:100%;
			}
			
			#tavolaEventi{
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
				color: darkred;
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
				background-color:white
			}
          
            legend{
                margin-left:120px; 
            }
            span.cella{
                display:table-cell; 
                margin-left:auto;
                margin-right:auto;
                padding:5px;
                padding-left:10px;
                width:20%;
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
                   
            .barra { 
              border-radius: 10px 10px 10px 10px; 
              width:100px;
              height:20px;
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
		</style>
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
                                parametro=window.location.search;
   				parametro=parametro.substring(1);
                                url="recuperaEventiProvincia.php?"+parametro;
				xhr.onreadystatechange=gestoreRichiesta;
				xhr.open("GET", url, true);
				xhr.send();
			}
			function gestoreRichiesta(){
            	if(xhr.readyState==4 & xhr.status==200){
					var risposta=xhr.responseText;
					document.getElementById("tavolaEventi").innerHTML=risposta;
				}
            }
            function cercaPerRegione(){
 				regione=document.getElementById('regioneCercata').value;
                regione = regione.replace(" ", "-");
 				location.href="eventi.php?regione="+regione;
			}
             function invioRegione(e) {
     
    			if (e.keyCode == 13 || e.which==13) {
        			var regione = document.getElementById("regioneCercata").value;
                	regione = regione.replace(" ", "-");
        			location.href="eventi.php?regione="+regione;
        			return false;
    			}
			}
 			function invioProvincia(e) {
    			if (e.keyCode == 13 || e.which==13) {
                  var provincia = document.getElementById("provinciaCercata").value;
                  provincia = provincia.replace(" ", "-");
                  location.href="eventiProvincia.php?provincia="+provincia;
                  return false;
    			}
			}
			function cercaPerProvincia(){
 				provincia=document.getElementById('provinciaCercata').value;
				provincia = provincia.replace(" ", "-");
 				location.href="eventiProvincia.php?provincia="+provincia;
			}
                function ordinaPer(criterio){
                    var provincia="<?php echo $provincia ?>";
                    location.href="eventiOrdinati.php?criterio="+criterio+"&&provincia="+provincia;	
		}
        
                function filtraPer(criterio){
             
                    var cerca="provincia" ;
                    var ricerca="<?php echo $provincia ?>";
			location.href="eventiFiltrati.php?criterio="+criterio+"&&"+cerca+"="+ricerca;	
		}
	</script>
        <?php
            if(isset($_SESSION['utenteLoggato'])){
                include_once 'view/headerAreaRiservata.php';
            }
            else{
                include_once 'view/header.php';
            }
        ?>
        <div id="header">
            <h1> Eventi: <?php echo $provincia; ?> </h1>
        </div>
        <div id="content">
            <div id="tavolaEventi"></div>
        </div>
    </body>
</html>