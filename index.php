<?php session_start(); ?> 

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="styles/additional.css">
    <title>Home</title>
</head>
<body>
    <div> <?php include_once('includes/navbar.php') ?></div>

<?php 
$sql = 'SELECT * FROM noticias';
$stmt = $conx->prepare($sql);
$stmt->execute();
$stmtRes = $stmt->get_result();
$results = [];


date_default_timezone_set('America/Argentina/Buenos_Aires');
$fechaActual = new DateTime(date('Y-m-d h:i:s'));

while ($filaDate = $stmtRes->fetch_object()){
    #$fechaPubli = new DateTime($filaDate->fecha_creacion);
    
    #$results[] = $fechaActual->getTimestamp() - $fechaPubli->getTimestamp();

    $latestID = $filaDate->id; //relamente lo otro esta alpedo

    }
$stmt->close();

$sql = 'SELECT * FROM noticias WHERE id = ?';
$stmt = $conx->prepare($sql);
$stmt->bind_param('i', $latestID);
$stmt->execute();
$resultadoSTMT_noticia = $stmt->get_result();
$filaN = $resultadoSTMT_noticia->fetch_object();
$stmt->close();


 ?>


    
    <h1 class="text-center">Ultima publicacion</h1>



    <div class="container">
        <div class="row">
            <div class="text-center">
                <footer class="fs-2"> "<?php echo $filaN->titulo ?>"</footer>
                <div><a href="<?php echo 'view/forum/publicacion.php?id='.$id.'&publicacion='.$latestID ?>">Ver mas</a></div>
                <img class="img-thumbnail rounded col-10 text-center" height="500px" src=" <?php echo $filaN->imagen ?>" alt="Imagen no disponible">
            </div>
        </div>
    </div>
</body>
</html>