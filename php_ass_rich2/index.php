<?php
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アンケートフォーム</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">
    <header>
        <nav class="bg-white p-6 shadow-md">
            <div class="container mx-auto">
                <div class="flex justify-between"><a class="text-blue-500 text-lg font-bold" href="select.php">アンケートリスト</a></div>
            </div>
        </nav>
    </header>

    <form method="post" action="insert.php">
        <div class="bg-white p-6 m-6 rounded shadow-md">
            <fieldset>
                <legend class="text-lg font-bold">アンケート</legend>
                <label class="block mt-4">名前：<input type="text" name="name" class="mt-1 p-2 border rounded"></label><br>
                <label class="block mt-4">Email：<input type="text" name="email" class="mt-1 p-2 border rounded">@example.com</label><br>
                <label class="block mt-4">年齢：<input type="text" name="age" class="mt-1 p-2 border rounded"></label><br>
                <div class="gender mt-4">
                    <label>性別：<input type="radio" name="sex" value="1">男性</label>
                    <label><input type="radio" name="sex" value="2">女性</label>
                </div>
                <label class="block mt-4">目的：<input type="text" name="purpose" class="mt-1 p-2 border rounded"></label><br>
                <label class="block mt-4">満足度：<input type="text" name="satisfaction" class="mt-1 p-2 border rounded">%</label><br>
                <label class="block mt-4">理由：<input type="text" name="reason" class="mt-1 p-2 border rounded"></label><br>
                <input type="submit" value="送信" class="mt-4 bg-blue-500 text-white px-6 py-2 rounded cursor-pointer hover:bg-blue-600">
            </fieldset>
        </div>
    </form>
</body>

</html>
