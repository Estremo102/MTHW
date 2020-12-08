<?php
try{
    $pdo = @new PDO('mysql:host=localhost;port=3306;dbname=mthw','mthw','KrzysGej666');
}catch(PDOException $e){
    throw new Exception($e->getMessage(),(int)$e->getCode());
}
?>