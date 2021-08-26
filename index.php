<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");

include "config.php";
require "controller.php";

if (!empty($_SERVER['REQUEST_URI'])) {
    if ($_SERVER['REQUEST_URI'] == '/' && $_SERVER['REQUEST_METHOD'] == 'GET') {
        getAllUsers();
    }
    elseif (strpos($_SERVER['REQUEST_URI'], '/user/') !== false && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $uriParts = explode("/", $_SERVER['REQUEST_URI']);
    $id = $uriParts[2];
    getUser($id);
    }
    elseif (strpos($_SERVER['REQUEST_URI'], '/insert/') !== false && $_SERVER['REQUEST_METHOD'] == 'POST') {
       insertUser();
    }
    elseif (strpos($_SERVER['REQUEST_URI'], '/update/') !== false && $_SERVER['REQUEST_METHOD'] == 'POST') {
        updateUser();
     }
     elseif (strpos($_SERVER['REQUEST_URI'], '/delete/') !== false && $_SERVER['REQUEST_METHOD'] == 'POST') {
        deleteUser();
     }

}   

