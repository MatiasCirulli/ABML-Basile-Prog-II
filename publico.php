<?php 

session_start();

if (!isset($_SESSION['regularUser']) && !isset($_SESSION['administrador'])){
    header('Location: index.php');
    exit;
};

if (isset($_SESSION['regularUser'])) {
    $currentUser = $_SESSION['regularUser'];
} else if (isset($_SESSION['administrador'])) {
    $currentUser = $_SESSION['administrador'];
} else {
    $currentUser = '';
}

if (isset($_SESSION['regularUser']) && isset($_SESSION['administrador'])) {
    echo 'oh no';
}

//$currentUser = isset($_SESSION['regularUser']) ? $_SESSION['regularUser'] : '';
$newEmail = isset($_POST['email']) ? $_POST['email'] : '';
$newPassword = isset($_POST['password']) ? $_POST['password'] : '';
$envioForm = isset($_POST['envioForm']) ? $_POST['envioForm'] : 0;

require_once('includes/dbasile.php');

$sql = 'SELECT * FROM users WHERE email = ?';
$stmt = $conx->prepare($sql);
$stmt->bind_param('s', $currentUser);
$stmt->execute();

$resultadoSTMT = $stmt->get_result();

$nuestroResultado = [];

while ($fila = $resultadoSTMT->fetch_object()){
    $nuestroResultado[] = $fila;
}
$stmt->close();

foreach ($nuestroResultado as $fila) {
    $id = $fila->id;
    $currentEmail = $fila->email;
    $currentPassword = $fila->password;
}

if ($envioForm == 1) {
    $sql = 'UPDATE users SET email = ?, password = ? WHERE id = ?';
    $stmt = $conx->prepare($sql);
    $stmt->bind_param('ssi', $newEmail, $newPassword, $id);
    $stmt->execute();
    $stmt->close();
}


?>

<form method="POST" id="form">
    <input type="hidden" name="envioForm" value="1">
    <input type="text" name="email" placeholder="Ingrese su nuevo email" id="name">
    <input type="text" name="password" placeholder="Ingrese su nueva contraseña" id="contra">
    <input type="submit">
</form>

<table border="1px">
     <thead>
            <tr>
                <th>Email</th>
                <th>Contraseña</th>
            </tr>
    </thead>
    <tbody>
            <tr>
                <td><?php if ($envioForm == 1) {
                    echo $newEmail;
                } else { echo $currentEmail; } ?></td>
                <td><?php if ($envioForm == 1) {
                    echo $newPassword;
                } else { echo $currentPassword; } ?> </td>
            </tr>
    </tbody>
</table>

<?php include_once('includes/botonCerrar.php'); ?>
<script src="validaciones/expresionesRegulares.js"></script>
<?php if ($envioForm == 1) {
    echo '<b>Sus datos han sido actualizados<b/>';
}

