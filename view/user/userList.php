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
<body>

    <?php include_once('../../includes/navbar.php') ?>

    <div>
        <form class="d-flex px-5 m-3" method="POST" action="../../validaciones/listing.php">
            <input class="form-control me-2" type="text" placeholder="Usuario">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
    </div>


    <?php 
    

    $sql = 'SELECT U.username, C.profile_pic FROM users U ';
    $sql.= 'INNER JOIN customizacion C ON(U.id = C.id_usuario)';

    $stmt = $conx->prepare($sql);
    $stmt->execute();
    $resultSTMT = $stmt->get_result();
    
    $nuestroResultado = [];

    while ($filaa = $resultSTMT->fetch_object()){
    $nuestroResultado[] = $filaa;
    }

    ?>
    <div class="container">
        <div class="row">
            <?php foreach ($nuestroResultado as $filaa) { ?>
            <div class="col-2">
                <div>
                    <span class="fs-5"> <?php echo $filaa->username ?> </span>
                </div>
                <img class="rounded-circle" width='60px' height="60px" src=" <?php echo $filaa->profile_pic ?>" alt="">
            </div>
            <?php } $stmt->close();?>
        </div>
    </div>
</body>
</html>