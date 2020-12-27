<?php
require 'conexion.php';
$id = $_GET['isbn']; // que no muestre por metodo get

$sql = "SELECT l.isbn, l.nombre AS 'titulo', l.cantidad_bodega, a.nombre AS 'author', l.precio ";
$sql .= "FROM biblioteca.libro l ";
$sql .= "INNER JOIN biblioteca.autor a ON l.idautor = a.idautor ";
$sql .= "WHERE l.isbn = " . $id . " ";
// error_log($sql);

$result = mysqli_query($conex, $sql);
$fila = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Sistema de Biblioteca</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="resource/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font-awesome.css">
</head>

<body>
    <?php require 'template/header.php'; ?>

    <main>
        <div class="container-fluid pt-4" style="width: 35rem;">
            <div class="row">
                <div class="col-md-12">
                    <span id="msg"></span>
                    <div class="card card-body">
                        <h2 class="text-center h4 font-weigth-normal">Editar registro</h5>
                        <div>
                            <div class="form-group">
                                <label for="txtIndentificador">Identificador (ISBN):</label>
                                <input type="text" name="txtIndentificador" id="txtIndentificador" value="<?php echo $fila['isbn']; ?>" class="form-control form-control-sm" readonly>
                            </div>
                            <div class="form-group">
                                <label for="txtTitulo">Titulo:</label>
                                <input type="text" name="inpTitulo" id="txtTitulo" value="<?php echo $fila['titulo']; ?>" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="txtStock">Cantidad en Bodega:</label>
                                <input type="text" name="inpStock" id="txtStock" value="<?php echo $fila['cantidad_bodega']; ?>" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="txtAuthor">Author:</label>
                                <select class="form-control form-control-sm" id="txtAuthor" name="inpAuthor">
                                    <option value="1" <?php
                                                        if ($fila['author'] == 'Seleccione...' || $fila['author'] == 'Seleccione...') echo 'selected';
                                                        ?>>
                                        Seleccione...
                                    </option>
                                    <option value="2" <?php
                                                        if ($fila['author'] == 'Julian Melgosa y Michelson Borges' || $fila['author'] == 'JULIAN MELGOSA Y MICHELSON BORGES') echo 'selected';
                                                        ?>>
                                        JULIAN MELGOSA Y MICHELSON BORGES
                                    </option>
                                    <option value="3" <?php
                                                        if ($fila['author'] == 'Alba Rosa Pastora Olivares' || $fila['author'] == 'ALBA ROSA PASTORA OLIVARES') echo 'selected';
                                                        ?>>
                                        ALBA ROSA PASTORA OLIVARES
                                    </option>
                                    <option value="4" <?php
                                                        if ($fila['author'] == 'Isha' || $fila['author'] == 'ISHA') echo 'selected';
                                                        ?>>
                                        ISHA
                                    </option>
                                    <option value="5" <?php
                                                        if ($fila['author'] == 'Ediciones Paulinas Verbo Divino' || $fila['author'] == 'EDICIONES PAULINAS VERBO DIVINO') echo 'selected';
                                                        ?>>
                                        EDICIONES PAULINAS VERBO DIVINO
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="txtPrecio">Valor del Libro:</label>
                                <input type="text" name="inpPrecio" id="txtPrecio" value="<?php echo $fila['precio']; ?>" class="form-control form-control-sm">
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 ">
                                    <button type="button" class="btn btn-primary btn-block btn-sm" onclick="UpdateRegister();">
                                        <i class="fa fa-refresh fa-pulse" aria-hidden="true"></i>&nbsp;Actualizar
                                    </button>
                                    <a href="./" class="btn btn-danger btn-block btn-sm">
                                        <i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;Volver
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="resource/bootstrap/jquery-3.5.1.slim.js"></script>
    <script src="resource/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        
        function UpdateRegister() {
            let vObject, vData;

            let isbn = document.getElementById("txtIndentificador").value.trim();
            let titulo = document.getElementById("txtTitulo").value.trim();
            let stock = document.getElementById("txtStock").value.trim();
            let author = document.getElementById("txtAuthor").value;
            let precio = document.getElementById("txtPrecio").value.trim();
            let sms = document.getElementById("msg");

            // console.info(`- ISBN: ${isbn} \n- TITUTLO: ${titulo}`);

            if(window.XMLHttpRequest) {
                vObject = new XMLHttpRequest();
            } else {
                vObject = new ActiveXObject("Microsoft.XMLHTTP");
            }
            
            vObject.onreadystatechange = () => {
                if (vObject.readyState == 4 && vObject.status == 200) {
                    var messages = vObject.responseText;
                    sms.innerHTML = messages;
                }
            }
            vObject.open("POST", "ajax_sistemadebiblioteca.php", true);
            vObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            vData = "accion=update";
            vData += '&i=' + isbn;
            vData += '&t=' + titulo;
            vData += '&s=' + stock;
            vData += '&au=' + author;
            vData += '&p=' + precio;

            vObject.send(vData);
        }
    </script>
</body>

</html>