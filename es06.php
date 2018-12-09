<html>
    <meta charset="utf-8">
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
    function cifra_cesare( $testo, $chiave ){
        $testo_minuscolo = strtolower( $testo ); //passa in minuscolo il testo
        $testo_cifrato = "";
        $ascii_a = ord('a'); //valore della lettera a in ASCII
        $ascii_z = ord('z'); //valore della lettera z in ASCII
        while( strlen( $testo_minuscolo ) ){ //fornisce la lunghezza della stringa
            $carattere = ord( $testo_minuscolo ); //valore del testo in ASCII
            if( $carattere >= $ascii_a && $carattere <= $ascii_z ){
                $carattere = ( ( $chiave + $carattere - $ascii_a ) % 26 ) + $ascii_a;
            }
            $testo_minuscolo = substr( $testo_minuscolo, 1 ); //fornisce una porzione di testo
            $testo_cifrato .= chr( $carattere );
        }
            return $testo_cifrato;
    }
	$NomeDiQuestoFile=$_SERVER['PHP_SELF']; //L'array associativo $_SERVER contiene alcune variabili di stato relative allo script in esecuzione;
	//$_SERVER['PHP_SELF'] restituisce il nome del file che contiene lo script in esecuzione, cioÃ¨ il nome di questo file.
		
	echo ' <form method="post" name="f1" action="'.$NomeDiQuestoFile.'">';  
	echo '  <table border="1" bgcolor="#DEB887" align="center" width="500px">';
	echo '	<tr>';
    echo '  <td colspan="2" align="center"> Cifratura di Cesare </td>';
    echo '  </tr>';
    echo '  <tr>';
	echo '  <td>Chiave numerica</td>';
	echo '  <td><input type="text" name="chiave" size="150" value="'.$_POST['chiave'].'"/></td>';
    echo '  </tr>';
    echo '  <tr>';
	echo '  <td>Testo da cifrare</td>';
	echo '  <td><input type="text" name="testo" size="150" value="'.$_POST['testo'].'"/></td>';
	echo '  </tr>';
    echo '  <tr>';
    if (($_POST['chiave']!=NULL && $_POST['testo']!=NULL)&&($_POST['chiave']*1>=0)) {
		$chiave=$_POST['chiave']; 
        $testo=$_POST['testo']; 
        echo '  <td>Testo cifrato</td>';
        echo '  <td><input type="text" name="testo_cifrato" size="150" value="'.cifra_cesare($testo, $chiave).'"'.'</td>';
        echo '  </tr>';
        echo '  <tr>';       
	}
	echo '  <td colspan="2" align="center"><input type="submit" value="Invia"/>';
	echo '  <input type="reset" value="Resetta"/></td>';
	echo '	</tr>';
	echo '</table>';
	echo '</form>';
?>	
</body>
</html>