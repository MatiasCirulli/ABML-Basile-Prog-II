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
    <?php $filtro = isset($_REQUEST['filtro']) ? $_REQUEST['filtro'] : ''; ?>

    <form class="d-flex" method="POST">
        <input type="hidden" name="envioForm" value="1">
        <input class="form-control me-2" placeholder="Titulo" name="titulito">
        <select class="btn btn-outline-primary me-2" name="filtro"> 
            <!-- Simplemente no lo voy a implementar aun
            <option value="popular">Mas Populares</option> 
            <option value="noPopular">Menos Populares</option> -->
            <option value="fecha">Mas recientes</option> 
            <option value="noFecha">Menos recientes</option>
            <option value="az">A-Z</option>
            <option value="za">Z-A</option>
        </select>
        <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>

  <?php
$resultadoSTMT_noticia = [];
$envioForm = isset($_POST['envioForm']) ? $_POST['envioForm'] : 0;
$filtroTitulo = isset($_POST['titulito']) ? $_POST['titulito'] : '';
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

$publicaciones = @mysqli_query($conx, 'SELECT * FROM noticias');
$totalPublicaciones = @mysqli_num_rows($publicaciones);
$j = 0;

$offset = 0;
$limit = 3;

if ($pagina != 1){
  $offset = $offset + ($pagina * $limit) - $limit ;
} 

$sql = 'SELECT N.* , CA.tipo, U.username, U.rango FROM noticias N ';
$sql.= ' INNER JOIN categorias CA ON(N.id_categoria = CA.id) ';
$sql.= ' INNER JOIN users U ON(N.id_user = U.id) ';

if($envioForm == 1) {

  if($filtroTitulo != '') {
    $sql.= ' WHERE titulo LIKE CONCAT("%", ?, "%") ';
  }

  if ($filtro == 'popular') {
    $sql.= 'ORDER BY likes ASC ';
  }
  if ($filtro == 'noPopular') {
    $sql.= 'ORDER BY likes DESC ';
  }
  if ($filtro == 'fecha') {
    $sql.= 'ORDER BY fecha_creacion DESC ';
  }
  if ($filtro == 'noFecha') {
    $sql.= 'ORDER BY fecha_creacion ASC ';
  }
  if ($filtro == 'az') {
    $sql.= 'ORDER BY titulo ASC ';
  }
  if ($filtro == 'za') {
    $sql.= 'ORDER BY titulo DESC ';
  }
  
  $sql.= ' LIMIT ?, ? ';

} else {
    $sql.= ' ORDER BY fecha_creacion DESC ';
    $sql.= ' LIMIT ?, ?';
}

$stmt = $conx->prepare($sql);
$stmt->bind_param('ii', $offset, $limit);

if($envioForm == 1) {
  if($filtroTitulo != '') {
    $stmt->bind_param('sii', $offset, $limit, $filtroTitulo);
  }
}

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
        <img class="card-img-top" width="250" height="250" src=" <?php echo $filaN->imagen ?>" alt="...">
        <div class="card-body ">
          <h5 class="card-title"> <?php echo $filaN->titulo ?> </h5>
          <p style="
          display:inline-block;
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
          max-width: 20ch;">  <?php echo $filaN->descripcion ?></p>
          <a href="<?php echo 'publicacion.php?id='.$id.'&publicacion='.$filaN->id ?>" class="btn btn-primary">Ir a publicacion</a>
        </div>
      </div>
    </div> 
<?php } ?>
  </div>
</div>


  <ul class="pagination d-flex justify-content-center">

    <?php if ($pagina == 1) { ?>
      <li class="page-item"><span class="page-link text-muted">Anterior</span></li>
    <?php } else { ?>
      <li class="page-item"><a class="page-link" href="<?php echo "http://localhost/Programaci%C3%B3n/loginBasile/view/forum/foro.php?id=".$id."&pagina=".$pagina-1 ?>">Anterior</a></li>
    <?php } ?>

    <?php $j = 0; for ($i = 0; $i < $totalPublicaciones; $i = $i + $limit) { 
      $j++;
      if ($j == $pagina) { ?>
      <li class="page-item"><span class="page-link text-muted"> <?php echo $j ?> </span></li>
      <?php } else { ?>
      <li class="page-item"><a class="page-link" href="<?php echo "http://localhost/Programaci%C3%B3n/loginBasile/view/forum/foro.php?id=".$id."&pagina=".$j ?>"> <?php echo $j ?> </a></li>
      <?php }?>
    <?php } ?>
      
    <?php if ($pagina == $j) { ?>
      <li class="page-item"><span class="page-link text-muted">Siguiente</span></li>
    <?php } else { ?>
      <li class="page-item"><a class="page-link" href="<?php echo "http://localhost/Programaci%C3%B3n/loginBasile/view/forum/foro.php?id=".$id."&pagina=".$pagina+1 ?>">Siguiente</a></li>
    <?php } ?>
  </ul>


</body>
</html>