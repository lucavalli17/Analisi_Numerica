<html>
    <meta charset="utf-8">
    <title> Cifrario di Cesare</title>
    <meta name="generator" content="AlterVista - Editor HTML"/>
   	<body bgcolor=#82e0aa>
    <style>
    <body>
        tr{
        border-radius: 5px;
        }
        td{
        border-radius: 5px;
        text-align: center;
        }
        table{
            border-radius: 5px;
        }
        input{
            border-radius: 5px;
        }
    </style>
    <head>
    	<div class="container" style="text-align: left;">
			<a class="img"> 
				<img src="http://britta.altervista.org/img/britta_altervista_definitivo.png" alt="Logo sito" width="158" height="42" /> 
			</a>
		</div>
    </head>
<?php
    function eratostene($numero)
    {
       $tutto=array();
       $primo=1;
       echo 1," ",2;
       $i=3;
       while($i<=$numero)
       {
            if(!in_array($i,$tutto))
             {
                echo " ",$i;
                $primo+=1;
                $j=$i;
                while($j<=($numero/$i))
                {
                   array_push($tutto,$i*$j);
                   $j+=1;
                }
             }
            $i+=2;
       }
       //echo "\n";
       return;
    }
	$NomeDiQuestoFile=$_SERVER['PHP_SELF']; //L'array associativo $_SERVER contiene alcune variabili di stato relative allo script in esecuzione;
	//$_SERVER['PHP_SELF'] restituisce il nome del file che contiene lo script in esecuzione, cioÃ¨ il nome di questo file.
		
        echo ' <form method="post" name="f1" action="'.$NomeDiQuestoFile.'">';  
        echo '  <table border="1" bgcolor="#DEB887" align="center" width="500px">';
        echo '	<tr>';
        echo '      <td colspan="2" align="center"> Crivello di Eratostene </td>';
        echo '  </tr>';
        echo '  <tr>';
        echo "      <td>Inserisci l'estremo della successione</td>";
        echo '      <td><input type="text" name="numero" size="150" value="'.$_POST['numero'].'"/></td>';
        echo '  </tr>';
        echo '  <tr>';
//crivella
		$numero=$_POST['numero']; 
        echo '      <td>Successione dei numeri primi</td>';         echo '  <td>
                        <input type="text" name="successione" size="150" value="'.eratostene($numero).'"'
              .'    </td>';
        echo '  </tr>';      
    echo '      <tr>';
    echo '          <td colspan="2" align="center"><input type="submit" value="Invia"/>';
	echo '	    </tr>';
	echo '</table>';
    echo '</form>';
?>	
</body>
</html>