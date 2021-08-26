<?php

function getDB(){
    include "conn.php";
    include "config.php";
    return Connection::open($configArray);
}

function respond($response) {
    //response in JSON format
    header('Content-Type: application/json');
    echo json_encode($response);
}

function getAllUsers(){
    require 'users.php';
    $db = getDB();
    $user = Users::selectAllUsers($db);
    respond($user); 
}

function getUser($id){
    require 'users.php';
    $db = getDB();
    $user = Users::selectUser($db,$id);
    respond($user); 
}

function insertUser(){
    require 'users.php';
    $db = getDB();
    $input = (array) json_decode(file_get_contents('php://input'), TRUE);
    $user = new Users($input['name'],$input['email'],$input['password']);
    $user->insert($db);
}

function updateUser(){
    require 'users.php';
    $db = getDB();
    $input = (array) json_decode(file_get_contents('php://input'), TRUE);
    $user = new Users($input['name'],$input['email'],$input['password'],$input['id']);
    $user->update($db);
}

function deleteUser(){
    require 'users.php';
    $db = getDB();
    $input = (array) json_decode(file_get_contents('php://input'), TRUE);
    $user = new Users($input['name'],$input['email'],$input['password'],$input['id']);
    $user->delete($db);
}
