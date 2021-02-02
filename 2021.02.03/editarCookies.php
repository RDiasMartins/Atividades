<?php
    if(!empty($_POST)){
        $metodo = $_POST["method"];
        $objeto = $_POST["subject"];

        if($metodo == "get"){
            if($objeto == "cookie"){
                $vetorValores = array();

                foreach ($_COOKIE as $key=>$val){
                    $vetorValores[$key] = $val;
                }

                header('Content-Type: application/json');
                echo json_encode($vetorValores);
            }
        }else if($metodo == "delete"){
            for($i = 0; $i < sizeof($objeto); $i++){
                setcookie($objeto[$i], "", time()-1, "/", "localhost", false, true);
            }
        }
    }
?>
