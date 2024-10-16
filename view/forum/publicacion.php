<?php 
session_start();

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$idPubli = isset($_GET['publicacion']) ? $_GET['publicacion'] : 0;

if ($idPubli == 0) {
    header('Location: ../../index.php?id='.$id);
}


?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../../styles/additional.css">
    <title>Publicacion</title>
</head>
<body>

    <?php include_once('../../includes/navbar.php');
    
$sql = 'SELECT N.* , CA.tipo, U.username, U.rango FROM noticias N ';
$sql.= 'INNER JOIN categorias CA ON(N.id_categoria = CA.id) ';
$sql.= 'INNER JOIN users U ON(N.id_user = U.id) WHERE N.id = ? ';
$stmt = $conx->prepare($sql);
$stmt->bind_param('i', $idPubli);
$stmt->execute();
$resultadoSTMT_noticia = $stmt->get_result();
$filaN = $resultadoSTMT_noticia->fetch_object();
$id_author = $filaN->id_user ;
$stmt->close();




$sql = 'SELECT * FROM customizacion WHERE id_usuario = ?';
$stmt = $conx->prepare($sql);
$stmt->bind_param('i', $id_author);
$stmt->execute();
$resultadoSTMT_custom = $stmt->get_result();
$filaC = $resultadoSTMT_custom->fetch_object();
$stmt->close();


    
    ?>

    <img width="45px" height="45px" src="<?php echo $filaC->profile_pic ?>" alt="">
    <b class="rounded-circle fs-3"> <?php echo $filaN->username; ?></b>

    <div class="container">
        <h1 class="text-center"> <?php echo $filaN->titulo ; ?></h1>
        <div class="badge bg-primary"> <?php echo $filaN->tipo ?> </div>
        <img class=' rounded' width="100%" height="500px" src='https://www.cronista.com/files/image/792/792559/66217a2f9fe51.jpg' alt="...">
        <h4> <?php echo $filaN->descripcion ?> </h4>
    </div>


</body>
</html>