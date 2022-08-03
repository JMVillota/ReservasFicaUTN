<div class="modal fade" id="LugarEvento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="card-body" style="width: 100%">
                        <div class="table-responsive">
                            <table id="" class="display table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width: 10%">Evento</th>
                                        <th style="width: 10%">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //incluimos el fichero de conexion
                                    include_once('../view/config/dbconect.php');
                                    $database = new Connection();
                                    $db = $database->open();
                                    try {
                                        $sql = 'SELECT * FROM lugar_eventos';
                                        foreach ($db->query($sql) as $row) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row['nombre_lugar']; ?></td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <button href="#editRowModal=<?php echo $row['lugar_evento_id']; ?>" class="btn btn-link btn-primary btn-lg" data-toggle="modal" title="" data-original-title="Edit Task" data-target="#editRowModal<?php echo $row['lugar_evento_id']; ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button href="#deleteRowModal=<?php echo $row['lugar_evento_id']; ?>" class="btn btn-link btn-danger btn-lg" data-toggle="modal" title="" data-original-title="Delete Task" data-target="#deleteRowModal<?php echo $row['lugar_evento_id']; ?>">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <?php include('editar.php'); ?>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } catch (PDOException $e) {
                                        echo "Hubo un problema en la conexión: " . $e->getMessage();
                                    }
                                    //Cerrar la Conexion
                                    $database->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body">
                            <form method="POST" autocomplete="off" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 pr-0">
                                        <div class="form-group form-group-default">
                                            <label>Nombre Evento</label>
                                            <input name="nombre_lugar" type="text" class="form-control" required placeholder="Ingrese Lugar de Evento">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-dark btn-sm mr-2" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar
                                    </button>
                                    <button type="submit" name="agregarLug" class="btn btn-outline-primary btn-sm mr-2"><span class=""></span> Guardar Lugar</button>
                                </div>
                            </form>
                        </div>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                        <script src="../assets/js/functions4.js"></script>
                        <script src="../assets/js/functions5.js"></script>
                        <script src="../assets/js/functions6.js"></script>
                        <script src="../assets/js/core/jquery.3.2.1.min.js"></script>
                        <script src="../assets/js/core/popper.min.js"></script>
                        <script src="../assets/js/core/bootstrap.min.js"></script>
                        <!-- jQuery UI -->
                        <script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
                        <script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
                        <!-- jQuery Scrollbar -->
                        <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
                        <!-- Datatables -->
                        <script src="../assets/js/plugin/datatables/datatables.min.js"></script>
                        <!-- Atlantis JS -->
                        <script src="../assets/js/atlantis.min.js"></script>
                        <!-- Atlantis DEMO methods, don't include it in your project! -->
                        <script src="../assets/js/setting-demo2.js"></script>
                        <!--------------------------------script nuevo--------------------------------------------------->
                        <?php
                        if (isset($_POST["agregarLug"])) {
                            $servername = "bmfmhv5m3p9lyxmjs6du-mysql.services.clever-cloud.com";
                            $username = "uobaba3u7tzwepfv";
                            $password = "VnpoDdEI73A3gZL3GaUd";
                            $dbname = "bmfmhv5m3p9lyxmjs6du";

                            // Creamos la conexión
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Revisamos la conexión
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $nombreLug = $_POST['nombre_lugar'];
                            // Realizamos la consulta para saber si coincide con uno de esos criterios
                            $sql = "select * from lugar_eventos where nombre_lugar='$nombreLug'";
                            $result = mysqli_query($conn, $sql);
                        ?>
                            <?php
                            // Validamos si hay resultados
                            if (mysqli_num_rows($result) > 0) {
                                // Si es mayor a cero imprimimos que ya existe el usuario
                                if ($result) {
                            ?>
                                    <script type="text/javascript">
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'Ya existe el registro a agregar!'
                                        })
                                    </script>
                                    <?php
                                }
                            } else {
                                // Si no hay resultados, ingresamos el registro a la base de datos
                                $sql2 = "INSERT INTO lugar_eventos(nombre_lugar)VALUES ('$nombreLug')";
                                if (mysqli_query($conn, $sql2)) {

                                    if ($sql2) {
                                    ?>
                                        <script type="text/javascript">
                                            Swal.fire({
                                                position: 'top-end',
                                                icon: 'success',
                                                title: 'Agregado correctamente',
                                                showConfirmButton: false,
                                                timer: 1500
                                            }).then(function() {
                                                window.location = "../folder/appointment.php";
                                            });
                                        </script>
                                    <?php
                                    } else {
                                    ?>
                                        <script type="text/javascript">
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: 'No se pudo guardar!'

                                            })
                                        </script>
                        <?php
                                    }
                                } else {

                                    echo "Error: " . $sql2 . "" . mysqli_error($conn);
                                }
                            }
                            // Cerramos la conexión
                            $conn->close();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>