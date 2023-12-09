<?php
// アンケートの選択肢
$options = array(
    "question1" => array("選択肢1", "選択肢2", "選択肢3"),
    "question2" => array("選択肢1", "選択肢2", "選択肢3"),
    "question3" => array("選択肢1", "選択肢2", "選択肢3"),
    "gender" => array("男性", "女性", "その他")
);
?>


<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>アンケート</title>
</head>
<body>
    <form action="receive.php" method="post">
        <label for="name">名前:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="gender">性別:</label><br>
        <?php foreach ($options["gender"] as $option): ?>
            <input type="radio" id="gender" name="gender" value="<?php echo $option; ?>">
            <label for="gender"><?php echo $option; ?></label><br>
        <?php endforeach; ?>
        
        <!-- 質問事項 -->
        <?php foreach ($options as $question => $choices): ?>
            <?php if ($question != "gender"): ?>
                <label for="<?php echo $question; ?>"><?php echo $question; ?>:</label><br>
                <?php foreach ($choices as $choice): ?>
                    <input type="radio" id="<?php echo $question; ?>" name="<?php echo $question; ?>" value="<?php echo $choice; ?>">
                    <label for="<?php echo $question; ?>"><?php echo $choice; ?></label><br>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endforeach; ?>

        <!-- 自由コメント欄 -->
        <label for="comment">自由コメント欄:</label><br>
        <textarea id="comment" name="comment"></textarea><br>
        <input type="submit" value="送信">
    </form>
</body>
</html>
