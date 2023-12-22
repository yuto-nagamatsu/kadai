<?php

// XSS対策関数　＊？＞を使用しないこと
function h($str){
    return htmlentities($str,ENT_QUOTES);
}

function db_conn(){
    try{
        $db_name = 'gs_db';    //データベース名
        $db_id   = 'root';      //アカウント名
        $db_pw   = 'root';      //パスワード：MAMPは'root'
        $db_host = 'localhost'; //DBホスト
        return $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
    }catch (PDOException $e){
        exit ("DB Connection Error : " .$e->getMessage());
    }
}

function redirect($file_name){
    header("location:$file_name");
    exit();
}