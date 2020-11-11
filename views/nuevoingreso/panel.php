<?php
if(isset($_SESSION["type"])){
    if($_SESSION["type"] == 2)
        header("location: https://www.inscripcionmonterrosa.info/antiguoingreso-dev/panel");    
}else{
    header("location: https://www.inscripcionmonterrosa.info");
}
echo "Este es el panel";
?>