<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../../styles/additional.css">
    <title>Foro</title>
</head>
<body>
    <?php include_once('../../includes/navbar.php') ?>

    <!-- esta parte del code no esta hecha -->
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Titulo" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
        <select class="" title="usdb"> 
            <option>Mas Populares</option>
            <option>Menos Populares</option>
            <option>Fecha ⬆</option>
            <option>Fecha ⬇</option>
            <option>A-Z</option>
            <option>Z-A</option>
        </select>
    </form>

  <?php
$resultadoSTMT_noticia = [];

$sql = 'SELECT N.* , CA.tipo, U.username, U.rango FROM noticias N ';
$sql.= 'INNER JOIN categorias CA ON(N.id_categoria = CA.id) ';
$sql.= 'INNER JOIN users U ON(N.id_user = U.id)';
$stmt = $conx->prepare($sql);
$stmt->execute();

$resultadoSTMT= $stmt->get_result();

$stmt->close();

while ($filaN = $resultadoSTMT->fetch_object()){
  $resultadoSTMT_noticia[] = $filaN;
}
?>

<div class="container">
  <div class="row">
<?php foreach ($resultadoSTMT_noticia as $filaN){ ?>
    <div class="col-4">
      <div class="card px-2 m-4 " style="width: 18rem;">
        <img class="card-img-top" width="250" height="250" src="https://www.cronista.com/files/image/792/792559/66217a2f9fe51.jpg" alt="...">
        <div class="card-body ">
          <h5 class="card-title"> <?php echo $filaN->titulo ?> </h5>
          <p class="texto-foro" ><?php echo $filaN->descripcion ?></p>
          <a href="<?php echo 'publicacion.php?id='.$id.'&publicacion='.$filaN->id ?>" class="btn btn-primary">Ir a publicacion</a>
        </div>
      </div>
    </div> 
<?php } ?>
  </div>
</div>

</body>
</html>