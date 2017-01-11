
<div id="header">
    <style type="text/css"> 
            	
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
	div.riga{
            display:table-row; 
	}
	span.cella{
            display:table-cell; 
            margin-left:auto;
            margin-right:auto;
            padding:5px;
            padding-left:10px;
	}
	#registrazione{
            float:right; 
            margin-right:5px; 
            padding:5px
	}
	#tavola{
            display:table;
            border:2px inset brown;
            background:transparent;
            width:100%; height:100px; top:2px; left:0px;
            position:relative;
        }
        #tavola div{
            display:table-row;
            position:relative;
            height:150px;
        }
        div>span{
            display:table-cell;
            width: 200px;
            height: 50px;
            margin: 0 auto;
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
        .arrotonda { 
            border-radius: 10px 10px 10px 10px; 
            width:500px;
            height:20px;
        }
        .navbar{
            font-size: 20px;
            color: black;
            background-color: #8FD28F;
            padding: 8px;
            width: 99%;
            border: #000000;
            border-top-width: 1px;
            border-right-width: 2px;
            border-left-width: 1px;
            border-bottom-width: 2px;
            border-style: solid;
            text-align:center;
	}
	a.navlink:link {
            margin: 0 auto;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }
        a.navlink:visited {
            font-weight: bold;
            color: red;
            text-decoration: none;
        }
        a.navlink:hover {
            font-weight: bold;
            color: black;
            text-decoration: underline;
        }
        #noleggio{
            color:black;
            position:relative; 
            top:120px; 
            left:35px;
            font-weight:bold;
        }
    </style>
	
    <script type="text/javascript">
    	function ricercaEmail(){
        	var email=document.getElementById('emailCercata').value;
        	url="ricercaUtenti.php?Email="+email;
                location.href=url;
        
        }
        function ricercaNick(){
        	var nick=document.getElementById('nicknameCercato').value;
        	url="ricercaUtenti.php?Nickname="+nick;
                location.href=url;
        }
        function invioNick(e) {
     
    		if (e.keyCode == 13 || e.which==13) {
        		
                var nick=document.getElementById('nicknameCercato').value;
        	url="ricercaUtenti.php?Nickname="+nick;
                location.href=url;
                return false;
    		}
             
	}
        function invioEmail(e) {
     
    		if (e.keyCode == 13 || e.which==13) {
                    var email=document.getElementById('emailCercata').value;
                    url="ricercaUtenti.php?Email="+email;
                    location.href=url;
    		}
	}
    
    </script>
	
	<div id="tavola">
	<div>
            <span style="position:relative">
                <img style="position:absolute; top:10px;" src="../Immagini/logo.JPG" width="180px" height="130px"> 
            </span>
           
	<span id="home" style="position:absolute; top:100px;"> <button type="submit" onclick="location.href='index.php'"> Homepage </button> </span>
	<span style="width:550px; position:absolute; top:50px;left:35%;">
	    
		<input class="arrotonda" id="emailCercata" onkeypress="return invioEmail(event)" placeholder=" Cerca utente per email " type="text">
                <img style="cursor:pointer" src="../Immagini/search.png" onclick="ricercaEmail()">		<br> 
		 
		<input class="arrotonda" id="nicknameCercato" onkeypress="return invioNick(event)" placeholder=" Cerca utente per nickname " type="text">
                <img style="cursor:pointer" src="../Immagini/search.png" onclick="ricercaNick()"> 

	</span>
	 <span style="position:absolute; top:10px; right:0px; ">
     <span style="position:absolute; top:2px; left:50px;"><img src="Immagini/user.png" width="100px" height="100px"></span> <br>
     <span style="position:absolute; top:100px;"> <button type="reset" onclick="location.href='controllaDatiLogout.php'"> Logout </button><button type="submit" onclick="location.href='recuperaEmailMioProfilo.php'"> Il tuo profilo </button> </span>
	</span>
	</div>
	</div>
	<br> 

	
	<style type="text/css">
	.navbar{
          font-size: 25px;
          color: black;
          background-color: brown;
          padding: 10px;
          width: 99%;
          border: #000000;
          border-top-width: 1px;
          border-right-width: 2px;
          border-left-width: 1px;
          border-bottom-width: 2px;
          border-style: solid;
          text-align:center;
     }
      a.navlink:link {
          margin: 0 auto;
          font-weight: bold;
          color: white;
          text-decoration: none;
      }
      a.navlink:visited {
          font-weight: bold;
          color: white;
          text-decoration: none;
      }
      a.navlink:hover {
          font-weight: bold;
          color: red;
          text-decoration: underline;
      }
	</style>
    <script>
    	function conferma(){
        	return confirm("Vuoi eliminare il tuo profilo?");
        }
    </script>
	
	
	

<div class="navbar">
    <a class="navlink" href="modificaProfilo.php"> Modifica Profilo</a> | <a class="navlink" href="iMieiEventi.php">I miei eventi </a> | <a class="navlink" href="iMieiFeedback.php">I miei Feedback </a>| <a class="navlink" href="utentiPreferiti.php"> Utenti Preferiti </a>| <a class="navlink" onclick="return conferma()" href="controllaDatiEliminaProfilo.php">Elimina Profilo  </a>
</div> 

	
	



	




 
    
</div>
