<?php
include("conexion.php");

    if(isset($_POST['Enviar'])){
        $nombre=$_POST['Nombre'];
        $stock=$_POST['Stock'];
        $precio=$_POST['Precio'];

        $query="Insert into Producto(Nombre,Stock,Precio) values ('$nombre','$stock','$precio')";

        $result=mysqli_query ($conn, $query);
        if(!$result){
            die("query fail");
        }

        $_SESSION['message']='Producto guardado';
        $_SESSION['message_type']='success';
        header("Location:index.php");
    }

?>