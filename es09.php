<html>
    <meta charset="utf-8">
    <title> Scomposizione in fattori</title>
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
    <?

        function scomponi_primi($numero)
        {
            if ($numero <= 3)
                $fattori = array($numero);
            else
            {
                while ($numero > 1)
                {
                    for ($n = 2; $n < $numero && $numero % $n; $n++);
                    $numero /= $n;
                    $fattori[] = $n;
                }
            }
            return $fattori;
        }
    
        $NomeDiQuestoFile=$_SERVER['PHP_SELF']; //L'array associativo $_SERVER contiene alcune variabili di stato relative allo script in esecuzione;
        //$_SERVER['PHP_SELF'] restituisce il nome del file che contiene lo script in esecuzione, cioÃ¨ il nome di questo file.
            echo '<form method="post" name="f1" action="'.$NomeDiQuestoFile.'">';  
            echo '  <table border="1" bgcolor="#DEB887" align="center" width="500px">';
            echo '	    <tr>';
            echo '          <td colspan="2" align="center"> Scomposizone in fattori </td>';
            echo '      </tr>';
            echo '      <tr>';
            echo '          <td>Inserisci il numero da scomporre</td>';
            echo '          <td><input type="text" name="numero" size="150" value="'.$_POST['numero'].'"/></td>';
            echo '      </tr>';
            echo '      <tr>';
            $numero=$_POST['numero']; 
            echo '          <td>Scomposizione in fattori</td>';         
            echo '          <td>
                                <input type="text" name="scomposizione" size="150" value="'.json_encode(scomponi_primi($numero)).'"'
                .'          </td>';
            echo '      </tr>';    
            echo '      <tr>';
            echo '          <td colspan="2" align="center"><input type="submit" value="Invia"/>';
            echo '	    </tr>';     
            echo '  </table>';
            echo '</form>';
    ?>	
</body>
</html>