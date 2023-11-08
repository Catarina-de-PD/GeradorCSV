<?php
    function conectarBD(){
        try {
            $db =  'mysql:host=143.106.241.3;dbname=cl201171;charset=utf8';
            $user = 'cl201171';
            $passwd = 'cl*27092005';
            $pdo = new PDO($db, $user, $passwd);
        
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            $output = 'Impossível conectar BD : ' . $e . '<br>';
            echo $output;
        }
    }
?>