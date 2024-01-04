<?php
session_start();
if(!isset($_SESSION['chk_ssid']) || $_SESSION["chk_ssid"]!=session_id()){
    echo "LOGIN ERROR";
    exit();
}else{
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
}
    // 関数にアクセス
    // require_once("funcs.php");

    // try {
    //     $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', 'root');
    // } catch (PDOException $e) {
    //     exit('DBConnectError:' . $e->getMessage());
    // }

    require_once('funcs.php');
    $pdo = db_conn();

    //データ取得
    $stmt = $pdo->prepare('SELECT * FROM gs_ass_ank;');
    $status = $stmt->execute();

    // データ表示
    $view="";
    if($status == false){
        $error = $stmt->errorInfo();
        // exit("ErrorQuery:".$error[2]);
        exit('SQLError:' . print_r($error, true));
    }else{
        //fetch_assocを使用して更新ではなく追記にする
        while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $view .= '<p>';
            $view .= '<a href = "detail_general.php?id=' . $result["id"] . ' ">';
            $view .= h($result['id']) . h($result['date']) . h($result['name']) . h($result['email']) . 
                    h($result['age']) . h($result['sex']) . h($result['purpose']). h($result['satisfaction']) . h($result['reason']) ; 
            $view .='</a>';
            $view .='</a>';
            $view .= '</p>';
        }
    }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アンケート結果表示</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">
    <header>
        <nav class="bg-white p-6 shadow-md">
            <div class="container mx-auto">
            <div class="flex justify-between"><a class="text-blue-500 text-lg font-bold" href="index.php">アンケートリスト</a></div>
            </div>
        </nav>
    </header>

    <div class="bg-white p-6 m-6 rounded shadow-md">
        <a href="detail_general.php"></a>
        <?= $view ?>
    </div>
</body>

</html>
