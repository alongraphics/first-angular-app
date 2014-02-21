<?php
//phpinfo();
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

//REGISTER CRUD APP ////////////////////////////////////
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

//AUTO LOADER //////////////////////////////////////////
include 'class/config.php';

//PDO HANDLER //////////////////////////////////////////
function db($q, $action = 'query'){
    $dbh = new PDO('mysql:host=localhost;dbname=crudDB;charset=utf8', 'root', 'root');
    switch($action){
        case "query":
            $st = $dbh->prepare($q);
            $st->execute();
            $st->setFetchMode(PDO::FETCH_ASSOC);
            return $st->fetchAll();
        break;
        case "add":
            $dbh->query($q);
        break;
    }

}

//FACTCH ALL USERS//////////////////////////////////////
$app->get('/users', function(){
    //print_r(db('select * from user'));
    print json_encode(db('SELECT * FROM user', 'query'));
});


//FACTCH ONE USER///////////////////////////////////////////////////
$app->get('/user/:id', function($id){
    print json_encode(db('select * from user WHERE id = '.$id, 'query'));
});


//ADD ONE USER///////////////////////////////////////////////////
$app->get('/user/add/:name/:email', function($name,$email){
    db("INSERT INTO  crudDB.user (id ,name ,email) VALUES (NULL ,  '$name',  '$email');"
        ,'add');

    print json_encode(array('status'=>'added'));
});

//404///////////////////////////////////////////////////
$app->notFound(function() use($app) {
    echo '{"status" : "error"}';
});


//RUN APP///////////////////////////////////////////////
$app->run();
