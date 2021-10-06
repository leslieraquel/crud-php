<?php include ("conexion.php")?>
<?php include ("includes/header.php")?>
     
     <div class="container p-4">
     
        <div class="row">
            <div class="col-md-4">
                <?php if(isset($_SESSION['message'])){?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     <?=$_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset();} ?>
                <div class="card card-body">
                    <form action="guardar.php" method="POST">
                         <div class="from-group">
                            <input type="text" name="Nombre" class="form-control" placeholder="Nombre" autofocus>
                        </div>
                         <div class="form-group">
                            <input type="text" name="Stock" class="form-control"
                            placeholder="Stock">
                        </div>
                        <div class="form-group">
                            <input type="text" name="Precio" class="form-control" 
                            placeholder="Precio">
                        </div>
                        <input type="submit" class ="btn btn-success btn-block"
                        name="Enviar" value="Registrar producto">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Stock</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $query="SELECT * FROM Producto";
                        $resultpro= mysqli_query($conn,$query);
                        while($row= mysqli_fetch_array($resultpro)){ ?>
                            <tr>
                                <td><?php echo $row['Nombre']?></td>
                                <td><?php echo $row['Stock']?></td>
                                <td><?php echo $row['Precio']?></td>
                                <td>
                                    <a href="actualizar.php?id=<?php echo $row['id']?>">Editar</a>
                                    <a href="eliminar.php?id=<?php echo $row['id']?>">Eliminar</a>
                                </td>
                            </tr>

                        <?php } ?>
                        
                        </tbody>
                    </table>
            
            </div>
        </div>
     </div>

<?php include ("includes/footer.php")?>