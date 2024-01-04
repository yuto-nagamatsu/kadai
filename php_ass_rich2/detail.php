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
    }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
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

    <form method="POST" action="update.php">
        <div class="bg-white p-6 m-6 rounded shadow-md">
            <fieldset>
                <legend class="text-lg font-bold">フリーアンケート</legend>
                <label class="block mt-4">名前：<input type="text" name="name" value="<?= $result['name'] ?>" class="mt-1 p-2 border rounded"></label>
                <label class="block mt-4">Email：<input type="text" name="email" value="<?= $result['email'] ?>" class="mt-1 p-2 border rounded"></label>
                <label class="block mt-4">年齢：<input type="text" name="age" value="<?= $result['age'] ?>" class="mt-1 p-2 border rounded"></label>
                <label class="block mt-4">満足度：<input type="text" name="satisfaction" value="<?= $result['satisfaction'] ?>" class="mt-1 p-2 border rounded"></label>
                <div class="gender mt-4">
                    <label>性別：<input type="radio" name="sex" id="" value="<?= $result['sex'] ?>">男性</label>
                    <label><input type="radio" name="sex" id="" value="<?= $result['sex'] ?>">女性</label>
                </div>
                <label class="block mt-4">目的：<textarea name="purpose" rows="4" cols="40" class="mt-1 p-2 border rounded"><?= $result['purpose'] ?></textarea></label>
                <label class="block mt-4">理由：<textarea name="reason" rows="4" cols="40" class="mt-1 p-2 border rounded"><?= $result['reason'] ?></textarea></label>
                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                <input type="submit" value="更新" class="mt-4 bg-blue-500 text-white px-6 py-2 rounded cursor-pointer hover:bg-blue-600">
            </fieldset>
        </div>
    </form>
</body>

</html>
