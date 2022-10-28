<?php
if ($_POST) {
    ini_set('display_errors',1);
    $tipo = $_POST["tipo"];
    
    if ($tipo==1) {
        echo "Registros de Personajes de KOF";
        $nombre = $_POST["name"];
        $apellido = $_POST["lastname"];
        $tipo_lucha = $_POST["type_fight"];
        $magia = $_POST["magia"];
        $estatura = $_POST["estatura"];
        $peso = $_POST["peso"];
        $equipo = $_POST["equipo"];

        if ($nombre != "" && $apellido != "" && $tipo_lucha != "" 
        && $magia != "" && $estatura != "" && $peso != "" && $equipo != "") {
            try {
                $pdo = new PDO("mysql:host=localhost;dbname=KOF","root","root");
                $resultado = $pdo -> prepare('INSERT INTO Personaje(`name`, lastname, type_fight, magia, estatura, peso, equipo)
                VALUES (:a,:b,:c,:d,:e,:f,:g)');
                $resultado->bindParam(":a", $nombre, PDO::PARAM_STR);
                $resultado->bindParam(":b", $apellido, PDO::PARAM_STR);
                $resultado->bindParam(":c", $tipo_lucha, PDO::PARAM_INT);
                $resultado->bindParam(":d", $magia, PDO::PARAM_INT);
                $resultado->bindParam(":e", $estatura, PDO::PARAM_INT);
                $resultado->bindParam(":f", $peso, PDO::PARAM_INT);
                $resultado->bindParam(":g", $equipo, PDO::PARAM_INT);
                $resultado -> execute();
            } catch (PDOException $e) {
                echo $e -> getMessage();
            }
        }else{
            echo "-1";
        }
    }else{
        echo "No hay coincidencias";
    }
}
?>