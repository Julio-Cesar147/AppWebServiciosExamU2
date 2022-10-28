<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=KOF","root","root");
} catch (PDOException $e) {
    echo $e ->getMessage();
}

$sql = "SELECT * FROM Personaje inner join Tipo_Lucha on Personaje.Tipo_Lucha = Tipo_Lucha.id_lucha";
$resultado = $pdo->query($sql);
$datos=array();

while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
    $datos[]=$row;
}
echo json_encode($datos);
?>   