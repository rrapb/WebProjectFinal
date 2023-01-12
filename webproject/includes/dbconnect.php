<?php
//ktu po dojna me ju qas databazes me php pdo ose php data object
try{
    //ne qet rast jem tu ju qas lidhjes me databaz edhe pe perdorum pdo
    $pdo = new PDO("mysql:host=localhost;dbname=projectdb", "root", "");
}catch(Exception $pdo){
    die("Lidhja deshtoi!");
}

?>