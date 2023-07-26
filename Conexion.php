<?php
class CConexion{
    function ConexionBD(){
        $host = "localhost";
        $dbname = "php_users";
        $username = "postgres";
        $psswd = "";
        try{
            $conn = pg_connect("host=$host dbname=$dbname user=$username password=$psswd");
            $query = "SELECT * FROM users";
            $consulta = pg_query($conn, $query);
            if(pg_num_rows($consulta)>0){
                echo "<p>Listado de personas<br>";
                echo "-----------------------</p>";
                while($obj=pg_fetch_object($consulta)){
                    echo $obj->name."<br>";
                }
            }
        }catch(PDOException $exp){
            echo "No se pudo conectarm $exp";
        }
    }   
}
?>