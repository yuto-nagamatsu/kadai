<?php
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アンケートフォーム</title>
    <link href="css/index.css" rel="stylesheet">
</head>
<body>
        <!-- Head[Start] -->
        <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>アンケート</legend>
                <label>名前：<input type="text" name="name"></label><br>
                <label>Email：<input type="text" name="email">@example.com</label><br>
                <label>年齢：<input type="number" name="age" id=""></label><br>
                <div class="gender">
                    <label>性別：<input type="radio" name="sex" id="" value="1">男性</label>
                    <label><input type="radio" name="sex" id="" value="2">女性</label>
                </div>
                <label>目的：<input type="text" name="purpose" id=""></label><br>
                <label>満足度：<input type="number" name="satisfaction" id="">%</label><br>
                <label>理由：<input type="text" name="reason" id=""></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->
</body>
</html>