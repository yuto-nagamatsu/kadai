<?php
    $id = $_GET['id'];
    require_once('funcs.php');
    $pdo = db_conn();

    //データ取得
    $stmt = $pdo->prepare('SELECT * FROM gs_ass_ank WHERE id = :id;');
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $status = $stmt->execute();

    // データ表示
    $view="";
    if($status === false){
        $error = $stmt->errorInfo();
        // exit("ErrorQuery:".$error[2]);
        exit('SQLError:' . print_r($error, true));
    }else{
        $result = $stmt->fetch();
        //fetch_assocを使用して更新ではなく追記にする
        // while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        //     $view .= '<p>';
        //     $view .= h($result['id']) . h($result['date']) . h($result['name']) . h($result['email']) . 
        //             h($result['age']) . h($result['sex']) . h($result['purpose']). h($result['satisfaction']) . h($result['reason']) ; 
        //     $view .= '</p>';
        // }
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
                <a class="navbar-brand" href="index.php">アンケートリスト</a>
                </div>
                </div>
            </nav>
            </header>
        <!-- Head[End] -->

        <!-- Main[Start] -->
        <div>
        <form method="POST" action="update.php">
            <div class="container jumbotron"><?= $view ?></div>
                <div class="jumbotron">
                    <fieldset>
                        <legend>フリーアンケート</legend>  <!--本来はここに表示する場合はXSS対策のh関数を使用する必要がある-->
                        <label>名前：<input type="text" name="name" value="<?= $result['name'] ?>"></label><br>
                        <label>Email:<input type="text" name="email" value="<?= $result['email'] ?>"></label><br>
                        <label>年齢：<input type="text" name="age" value="<?= $result['age'] ?>"></label><br>
                        <label>満足度：<input type="text" name="satisfaction" value="<?= $result['satisfaction'] ?>"></label><br>
                        <!-- <label>性別(1.男性 2.女性):<input type="radio" name="sex" value="<?//= $result['sex'] ?>"></label><br> -->
                        <div class="gender">
                            <label>性別：<input type="radio" name="sex" id="" value="<?= $result['sex'] ?>">男性</label>
                            <label><input type="radio" name="sex" id="" value="<?= $result['sex'] ?>">女性</label>
                        </div>

                        <label>目的<textarea name="purpose" rows="4" cols="40"><?= $result['purpose'] ?></textarea></label><br>
                        <label>理由：<textarea name="reason" rows="4" cols="40"><?= $result['reason'] ?></textarea></label><br>
                        <input type="hidden" name="id" value="<?= $result['id'] ?>">
                        <input type="submit" value="更新">
                    </fieldset>
                </div>
            </div>
        </form>
        <!-- Main[End] -->

        </body>
    </html>