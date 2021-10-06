<?php
    include("conexion.php");

    if(isset($_GET['id'])){
        $id =$_GET['id'];
        $query="SELECT * FROM Producto where id=$id";
        $result= mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            $nombre=$row['Nombre'];
            $stock=$row['Stock'];
            $precio=$row['Precio'];
        }
    
    }
    if(isset($_POST['update'])){
        $id= $_GET['id'];
        $nombre= $_POST['nombre'];
        $stock=$_POST['stock'];
        $precio=$_POST['precio'];
        $query="update Producto set Nombre='$nombre', Stock='$stock', Precio='$precio' where id=$id";
        mysqli_query($conn,$query);
        header("Location:index.php");

    }
?>


<?php include("includes/header.php")?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="actualizar.php?id=<?php echo $_GET['id'];?>" method="post">
                        <div class="form-group">
                            <input type="text" name="nombre" value="<?php echo $nombre; ?>" 
                            class=form-control placeholder="Actualice el nombre">
                        </div>
                        <div class="form-group">
                            <input type="text" name="stock" value="<?php echo $stock;?>" 
                            class= "form-control" placeholder="Actualice stock">
                        </div>
                        <div class="form-group">
                            <input type="text" name="precio" value="<?php echo $precio; ?>"
                            class=form-control placeholder="Actualice el precio">
                        </div>
                        <button class="btn btn-success" name="update">
                            update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include("includes/footer.php")?>