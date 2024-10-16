<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../../styles/additional.css">
    <title>Create</title>
</head>
<body>
    
    <?php include_once('../../includes/navbar.php') ?>

    
    <form class="m-4" method="POST" action="<?php echo "../../validaciones/creating.php?id=".$id ?>">
        <input type="hidden" value='1' name="envio_form">
        <div class="from-group px-5 m-2">
            <label class="fs-4">Titulo de la publicacion</label>    
            <input class='form-control' type="text" name="title" placeholder="Titulo">
        </div>
        <div class="from-group px-5 m-2">
            <label class="fs-4">Descripcion</label>
            <input class='form-control' type="text" name="desc" placeholder="Descripcion">
        </div>
        <div class="from-group px-5 m-2">
            <label class="fs-4">Imagen</label>
            <input class='form-control' type="file" name="image">
        </div>
        <div class="form-group px-5 m-2">
            <label class="fs-4" for="categorias">Categorias: </label>
            <div>
                <select class="form-control" id="categorias" name="categorias">
                    <option value="preg">Pregunta</option>
                    <option value="opin">Opinion</option>
                    <option value="dibu">Dibujo</option>
                    <option value="hist">Historia</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
        </div>
        <input type="submit" class="btn btn-outline-primary px-5 m-4">
    </form>

</body>
</html>