<?php

$app->get('/', "myapp\controller\HomeController::homeAction");

$app->get('/voitures', "myapp\controller\HomeController::voituresAction");
$app->get('/contact', "myapp\controller\HomeController::contactAction");


// Home page
/*
$app->get('/', function () {
    require '../src/model.php';
    $articles = getArticles();
    ob_start();             // start buffering HTML output
    require '../views/view.php';
    $view = ob_get_clean(); // assign HTML output to $view
    return $view;
});*/
