<?php
    function conexion(){
        $conn = pg_connect("host=localhost dbname=php_users user=postgres password=");
        if($conn){
            echo "Exito";
        }else{
            echo "Error".pg_last_error();
        }
    }
?>