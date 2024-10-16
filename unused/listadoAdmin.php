<?php

session_start();

if (!isset($_SESSION['administrador'])){
    header('Location: index.php');
    exit;
};


require_once('../includes/dbasile.php');


$stmt = $conx->prepare('SELECT * FROM users');
$stmt->execute();

$resultadoSTMT = $stmt->get_result();

$nuestroResultado = [];

while ($fila = $resultadoSTMT->fetch_object()){
    $nuestroResultado[] = $fila;
}

$stmt->close();


?>

<?php include_once('../includes/botonVolver.php'); ?>

<table border="1px">
     <thead>
            <tr>
                <th>Email</th>
                <th>Rango</th>
                <th></th>
                <th></th>
            </tr>
    </thead>
    <tbody>
            <?php foreach ($nuestroResultado as $fila) { ?>
                <tr>
                    <td><?php echo $fila->email ?></td>
                    <td><?php echo $fila->rango ?> </td>
                    <td><?php if($_SESSION['rank'] == 1){if ($fila->rango > 1) { ?>
                        <?php include('../includes/formLevelUp.php') ?> 
                    </td>
                    <td> <?php include('../includes/formDelete.php') ?></td>
                        </form> <?php } } else if($_SESSION['rank'] == 2) { if ($fila->rango > 2) { ?>
                        <?php include('../includes/formLevelUp.php') ?> 
                    </td>
                    <td> <?php include('../includes/formDelete.php') ?></td> 
                        </form> <?php } } ?> 
                </tr>
            <?php } ?>
    </tbody>
</table>
