<?PHP
    include("conexion.php");
    if(isset($_GET['id'])){
        $id =$_GET['id'];
        $query="DELETE FROM Producto where id=$id";
        $result= mysqli_query($conn,$query);
        if(!$result){
            die("query failed");
        }
        $_SESSION['message']='Producto eliminado';
        $_SESSION['message_type']='danger';
        header("Location:index.php");
    }
?>
