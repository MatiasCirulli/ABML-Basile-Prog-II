<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../../styles/additional.css" rel="stylesheet">
    <title>Usuarios</title>
</head>


    <?php include_once('../../includes/navbar.php') ?>

    <div>
        <form class="d-flex px-5 m-3" method="POST">
            <input type="hidden" value="1" name="envioForm">
            <input class="form-control me-2" type="text" placeholder="Usuario" name="userFilter">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
    </div>


    <?php 
    $userFilter = isset($_POST['userFilter']) ? $_POST['userFilter'] : '';
    $envioForm = isset($_POST['envioForm']) ? $_POST['envioForm'] : 0;

    $rank = isset($_SESSION['rank']) ? $_SESSION['rank'] : 0;

    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

    $publicaciones = @mysqli_query($conx, 'SELECT * FROM users WHERE rango > 0');
    $totalPublicaciones = @mysqli_num_rows($publicaciones);
    $j = 0;
   

    $offset = 0;
    $limit = 19;

    if ($pagina != 1){
        $offset = $offset + ($pagina * $limit) - $limit ;
    } 

    
    $sql = 'SELECT U.id, U.username, U.rango, C.profile_pic FROM users U ';
    $sql.= 'INNER JOIN customizacion C ON(U.id = C.id_usuario)';

    if ($envioForm == 1) {
        if ($userFilter != '') {
            $sql.= ' WHERE username LIKE CONCAT("%", ?, "%") ';
            $sql.= ' ORDER BY rango ASC';
            $sql.= ' LIMIT ?, ? ';
        }
    } else {
        $sql.= ' ORDER BY rango ASC';
        $sql.= ' LIMIT ?, ? ';
    }

    $stmt = $conx->prepare($sql);

    if ($envioForm == 1) {
        if ($userFilter != '') {
            $stmt->bind_param('iis', $offset, $limit, $userFilter);
        }
    } else {
        $stmt->bind_param('ii', $offset, $limit);
    }

    $stmt->execute();
    $resultSTMT = $stmt->get_result();
    
    $nuestroResultado = [];

    while ($filaa = $resultSTMT->fetch_object()){
    $nuestroResultado[] = $filaa;
    }

    ?>
    <div class="container">
        <div class="row">
            <?php foreach ($nuestroResultado as $filaa) {
                if ($filaa->rango < 99 && $filaa->rango > 0) { ?>
            <div class="col-2">
                <div>
                    <span class="fs-5"> <?php echo $filaa->username ?> </span>
                    <img src="../../uploads/Admin-Star.png" alt="" width='30px' height="30px">
                </div>

                <form action="../../validaciones/listing.php" method="POST">
                    <input type="hidden" name="cuenta" value=" <?php echo $filaa->id ?> ">
                    <label for=" <?php echo 'send'.$filaa->id ?> ">
                        <img class="rounded-circle" width='60px' height="60px" src=" <?php echo $filaa->profile_pic ?>" alt="">
                    </label>
                    <input class='goodbye' type="submit" id=" <?php echo 'send'.$filaa->id ?> ">
                </form>
                
                <?php if ($filaa->rango != 1  && $rank == 1) { ?>
                    <form method="POST" action="../../validacionesAdmin/disable.php">
                        <input type="hidden" name="desgraciado" value=" <?php echo $filaa->id ?> ">
                        <input type='submit' value='Eliminar' class='m-1 btn btn-outline-danger'>
                    </form>
                <?php } ?>

            </div>
                <?php } else if ($filaa->rango > 0) { ?>
                    <div class="col-2">
                <div>
                    <span class="fs-5"> <?php echo $filaa->username ?> </span>
                </div>

                <form action="../../validaciones/listing.php" method="POST">
                    <input type="hidden" name="cuenta" value=" <?php echo $filaa->id ?> ">
                    <label for=" <?php echo 'send'.$filaa->id ?> ">
                        <img class="rounded-circle" width='60px' height="60px" src=" <?php echo $filaa->profile_pic ?>" alt="">
                    </label>
                    <input class='goodbye' type="submit" id=" <?php echo 'send'.$filaa->id ?> ">
                </form>
                <?php if ($filaa->rango != 1  && $rank == 1) { ?>
                    <form method="POST" action="../../validacionesAdmin/disable.php">
                        <input type="hidden" name="desgraciado" value=" <?php echo $filaa->id ?> ">
                        <input type='submit' value='Eliminar' class='m-1 btn btn-outline-danger'>
                    </form>
                <?php } ?>


            </div>
            <?php }} $stmt->close();?>
        </div>
    </div>

    <ul class="pagination d-flex justify-content-center m-5">

    <?php if ($pagina == 1) { ?>
      <li class="page-item"><span class="page-link text-muted">Anterior</span></li>
    <?php } else { ?>
      <li class="page-item"><a class="page-link" href="<?php echo "http://localhost/Programaci%C3%B3n/loginBasile/view/user/userList.php?id=".$id."&pagina=".$pagina-1 ?>">Anterior</a></li>
    <?php } ?>

    <?php $j = 0; for ($i = 0; $i < $totalPublicaciones; $i = $i + $limit) { 
      $j++;
      if ($j == $pagina) { ?>
      <li class="page-item"><span class="page-link text-muted"> <?php echo $j ?> </span></li>
      <?php } else { ?>
      <li class="page-item"><a class="page-link" href="<?php echo "http://localhost/Programaci%C3%B3n/loginBasile/view/user/userList.php?id=".$id."&pagina=".$j ?>"> <?php echo $j ?> </a></li>
      <?php }?>
    <?php } ?>
      
    <?php if ($pagina == $j) { ?>
      <li class="page-item"><span class="page-link text-muted">Siguiente</span></li>
    <?php } else { ?>
      <li class="page-item"><a class="page-link" href="<?php echo "http://localhost/Programaci%C3%B3n/loginBasile/view/user/userList.php?id=".$id."&pagina=".$pagina+1 ?>">Siguiente</a></li>
    <?php } ?>
  </ul>

</body>
</html>
