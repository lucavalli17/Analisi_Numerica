<html>
    <meta charset="utf-8">
    <title> Verifica password</title>
    <meta name="generator" content="AlterVista - Editor HTML"/>
   	<body bgcolor=#82e0aa>
    <style>
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
				<img src="../../img/britta_altervista_definitivo.png" alt="Logo sito" width="158" height="42" /> 
			</a>
		</div>
    </head>
    <?php
        if(isset($_POST['submit'])){
            $password=$_POST['password'];
            if(strlen ($password)<8)
            {
                echo '<table border="1" bgcolor="#DEB887" align="center" width="500px">
                        <tr>
                            <td colspan="2" align="center"> Password debole <br>(minore di otto caratteri)</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"> <a href "es11_reg_exp.php">Riprova!</a> </td>
                        </tr>
                    </table>';
                return;
            }

            if(strlen($password)>=8 and strlen($password)<=10)
            {
                echo '<table border="1" bgcolor="#DEB887" align="center" width="500px">
                        <tr>
                            <td colspan="2" align="center"> Password media <br>(maggiore di otto caratteri e minore di 10)</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"> <a href "es11_reg_exp.php">Riprova!</a> </td>
                        </tr>
                    </table>';
                return;
            }

            if(preg_match("((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@,&,%,#]))", $password))
            {
                echo '<table border="1" bgcolor="#DEB887" align="center" width="500px">
                        <tr>
                            <td colspan="2" align="center"> Password alta <br>(maggiore di 10 caratteri e contenente un numero, una maiuscola, una minuscola e un carattere speciale [%, @, &, #])</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"> <a href "es11_reg_exp.php">Riprova!</a> </td>
                        </tr>
                    </table>';
                return;
            }

            if(preg_match("((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]))", $password))
            {
                echo '<table border="1" bgcolor="#DEB887" align="center" width="500px">
                        <tr>
                            <td colspan="2" align="center">Password medio-alta <br>(maggiore di 10 caratteri e contenente un numero, una maiuscola, una minuscola) </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"> <a href "es11_reg_exp.php">Riprova!</a> </td>
                        </tr>
                    </table>';
                return;
            }

        }
        $NomeDiQuestoFile=$_SERVER['PHP_SELF']; //L'array associativo $_SERVER contiene alcune variabili di stato relative allo script in esecuzione;
        //$_SERVER['PHP_SELF'] restituisce il nome del file che contiene lo script in esecuzione, cioÃ¨ il nome di questo file.
            echo '<form method="post" name="f1" action="'.$NomeDiQuestoFile.'">';  
            echo '  <table border="1" bgcolor="#DEB887" align="center" width="500px">';
            echo '	    <tr>';
            echo '          <td colspan="2" align="center"> Robustezza della password </td>';
            echo '      </tr>';
            echo '      <tr>';
            echo '          <td>Inserisci la password</td>';
            echo '          <td><input type="text" name="password" size="150" value="'.$_POST['password'].'"/></td>';
            echo '      </tr>';
            echo '      <tr>';  
            echo '      <tr>';
            echo '          <td colspan="2" align="center"><input type="submit" name="submit" value="Invia"/>';
            echo '	    </tr>';     
            echo '  </table>';
            echo '</form>';
    ?>	
</body>
</html>