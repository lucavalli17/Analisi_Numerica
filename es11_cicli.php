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
                            <td colspan="2" align="center"> <a href "es11_cicli.php">Riprova!</a> </td>
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
                            <td colspan="2" align="center"> <a href "es11_cicli.php">Riprova!</a> </td>
                        </tr>
                    </table>';
                return;
            }

            function has_10chars($password){              
                $numbers = [0,1,2,3,4,5,6,7,8,9];
                $count_numbers==0;
                $low_alphabet=["a","b","c","d","e","f","g","h","i","l","m","n","o","p","q","r","s","t","u","v","z"];
                $low_chars==0;
                $up_alphabet=["A","B","C","D","E","F","G","H","I","L","M","N","O","P","Q","R","S","T","U","V","Z"];
                $up_chars==0;
                $special_chars = ["@","&","%","#"];
                $count_special_chars==0;
                if (strlen($password)>10) {
                    for ($i=1;$i<=strlen($password);$i++) {
                            $char=substr($password, $i, 1);
                            if(in_array($char, $numbers)){
                                $count_numbers=$count_numbers+1;
                            }
                            if(in_array($char, $special_chars)){
                                $count_special_chars=$count_special_chars+1;
                            }
                            if(in_array($char, $low_alphabet)){
                                $low_chars=$low_chars+1;
                            }    
                            if(in_array($char, $up_alphabet)){
                                $up_chars=$up_chars+1;
                            }                         
                    }
                    if ($count_numbers>=1 AND $count_special_chars>=1 AND $low_chars>=1 AND $up_chars>=1){
                        echo '<table border="1" bgcolor="#DEB887" align="center" width="500px">
                                    <tr>
                                        <td colspan="2" align="center"> Password forte <br>(maggiore di 10 caratteri e contenente un numero, una maiuscola, una minuscola e un carattere speciale [%, @, &, #])</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center"> <a href "es11_cicli.php">Riprova!</a> </td>
                                    </tr>
                              </table>';
                        return;
                    }

                    elseif ($count_numbers>=1 AND $low_chars>=1 AND $up_chars>=1){
                        echo '<table border="1" bgcolor="#DEB887" align="center" width="500px">
                                    <tr>
                                        <td colspan="2" align="center">Password medio-forte <br>(maggiore di 10 caratteri e contenente un numero, una maiuscola, una minuscola) </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center"> <a href "es11_cicli.php">Riprova!</a> </td>
                                    </tr>
                              </table>';
                        return;
                    }
                }
            }
            has_10chars($password);
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