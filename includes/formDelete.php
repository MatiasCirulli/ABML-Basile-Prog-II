                        <form method='POST' action="validacionesAdmin/delete.php">
                            <input type="hidden" value="<?php echo $fila->email ?>" name="emailDelete">
                            <input type="hidden" value='1' name="borrar">
                            <input type="submit" value="🗑️">
                        </form>