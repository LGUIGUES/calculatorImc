<?php

session_start();

require('controllers/HomeController.php');

$homeController = new HomeController;
$homeController -> controlForm();