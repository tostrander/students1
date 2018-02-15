<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

//Define a default route
$f3->route('GET /', function() {

    echo "hello";

    //load a template
    //$template = new Template();
    //echo $template->render('views/info.html');
});



//Run fat free
$f3->run();
