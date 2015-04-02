<?php

$app->get('/', "lpccars\controller\HomeController::homeAction");
$app->get('/voitures', "lpccars\controller\HomeController::voituresAction");
$app->get('/contact', "lpccars\controller\HomeController::contactAction");
$app->get('/login', "lpccars\controller\HomeController::loginAction");