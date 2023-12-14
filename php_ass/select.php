<?php
    // 関数にアクセス
    require_once("funcs.php");

    try {
        $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', 'root');
    } catch (PDOException $e) {
        exit('DBConnectError:' . $e->getMessage());
    }

    //データ取得
    $stmt = $pdo->prepare("SELECT * FROM gs_ass_ank");
    $status = $stmt->execute();

    // データ表示
    $view="";
    if($status == false){
        $error = $stmt->errorInfo();
        exit("ErrorQuery:".$error[2]);
    }else{
        //fetch_assocを使用して更新ではなく追記にする
        while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $view .= '<p>';
            $view .= h($result['id']) . h($result['date']) . h($result['name']) . h($result['email']) . 
                    h($result['age']) . h($result['sex']) . h($result['purpose']). h($result['satisfaction']) . h($result['reason']) ; 
            $view .= '</p>';
        }
    }
?>

    <!DOCTYPE html>
    <html lang="ja">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>アンケート結果表示</title>
    <link href="css/select.css" rel="stylesheet">
    <style>div{padding: 10px;font-size:16px;}</style>
    </head>
    <body id="main">
    <!-- Head[Start] -->
    <header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="index.php">データ登録</a>
        </div>
        </div>
    </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron"><?= $view ?></div>
    </div>
    <!-- Main[End] -->

    </body>
    </html>