<form>
    <input type="hidden" value="1" name="vuelta">
    <input type="submit" value="Volver">
</form>

<?php
$vuelta = isset($_GET['vuelta']) ? $_GET['vuelta'] : 0;

if ($vuelta == 1) {
    header('Location: Privado.php');
    die;
}
?>