
<div id="header">
            <style type="text/css">  
                body{
                    margin:0;
                    width:100%;
                    height:100%;
                    }
                #tavola{
                    display:table;
                    border:2px inset black;
                    background:white;
                    width:100%; height:100px; top:2px; left:0px;
                    position:relative;
                    }
                #tavola div{
                    display:table-row;
                    position:relative;
                    height:150px;
                    }
		span.cella2{	
                    display:table-cell;
                    width: 200px;
                    height: 50px;
                    margin: 0 auto;
                    }
                button{
                    border-radius:30px; 
                    border-color:brown; 
                    background-color:white
                    }
		button[type="submit"]{
                    margin-right:5px; 
                    padding:5px
                    }
		.arrotonda { 
                    border-radius: 10px 10px 10px 10px; 
                    width:350px;
                    }
            </style>
            <div id="tavola">
                <div>
                    <span class="cella2" style="position: absolute; top: 10px;">
                        <img src="Immagini/logo.JPG" width="180px" height="130px">
                    </span>
                    <span class="cella2" style="position: absolute; top: 100px; left: 200px">
                        <button type="submit" onclick="location.href= 'index.php'"> Homepage </button>
                    </span>
                    <span style="position:absolute; top:100px; right:30px;"> 
                        <button type="submit" onclick="location.href='registrazione.php'"> Registrati </button> 
                        <button type="submit" onclick="location.href='login.php'"> Login </button> 
                    </span>
                </div>
            </div>
        </div>