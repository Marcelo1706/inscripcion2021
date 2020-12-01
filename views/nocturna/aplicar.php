<?php
$activo = 1;

if($activo == 1){
    $active = 2; 
    require 'parts/menu.php';
    $paso = isset($_GET["paso"]) ? $_GET["paso"] : 0;
    switch($paso){
        case 1: 
            require 'steps/step1.php';  
        break;
        case 2:
            require 'steps/step2.php';
        break;
        case 3:
            require 'steps/step3.php';
        break;
        case 4:
            require 'steps/step4.php';
        break;
        case 5:
            require 'steps/step5.php';
        break;
        case 6: 
            require 'steps/step6.php';
        break;
        default:
            require 'steps/step0.php';
        break; 
    }
}else{
    require 'parts/menu.php';
    require 'steps/step10.php';
}
?>
<?php require 'parts/footer.php'; ?>

