                        <form method='POST' action="validacionesAdmin/levelUp.php">
                            <input type="hidden" value="<?php echo $fila->email ?>" name="levelingUp">
                            <input type="hidden" value='2' name="ascenso">
                            <input type="submit" value="⬆">
                        </form>
                        <form method='POST' action="validacionesAdmin/levelUp.php"> 
                            <input type="hidden" value="<?php echo $fila->email ?>" name="levelingDown">
                            <input type="hidden" value='99' name="descenso">
                            <input type="submit" value="⬇">
                        </form>