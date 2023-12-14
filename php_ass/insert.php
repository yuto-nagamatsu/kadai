<?php
    // データ取得
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $purpose = $_POST['purpose'];
    $satisfaction= $_POST['satisfaction'];
    $reason = $_POST['reason'];
    // 他に日時、IDを自動で取得予定

    // DBに接続
    try{    
        $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', 'root');
    }catch (PDOException $e) {
        exit('DBConnectError:' . $e->getMessage());
    }

    // データ登録を行う
    $stmt = $pdo->prepare("
    INSERT INTO 
        gs_ass_ank(id,name,email,age,sex,satisfaction,reason,purpose,date)
    VALUES (
        NULL,:name,:email,:age,:sex,:satisfaction,:reason,:purpose,sysdate()
    )");


    // バインド変数を用意
    $stmt->bindValue(':name',$name,PDO::PARAM_STR);
    $stmt->bindValue(':email',$email,PDO::PARAM_STR);
    $stmt->bindValue(':age',$age,PDO::PARAM_INT);
    $stmt->bindValue(':sex',$sex,PDO::PARAM_INT);
    $stmt->bindValue(':satisfaction',$satisfaction,PDO::PARAM_INT);
    $stmt->bindValue(':reason',$reason,PDO::PARAM_STR);
    $stmt->bindValue(':purpose',$purpose,PDO::PARAM_STR);

    // 実行
    $status = $stmt->execute();

    //データ処理後(成功したら＊＊＊に移動)
    if($status===false){
        $error = $stmt->errorInfo();
        exit('ErrorMessage:' . $error[2]);
    }else{
        header('location:index.php');
    }