<?php
// アンケートの選択肢
$options = array(
    "question1" => array("選択肢1", "選択肢2", "選択肢3"),
    "question2" => array("選択肢1", "選択肢2", "選択肢3"),
    "question3" => array("選択肢1", "選択肢2", "選択肢3"),
    "gender" => array("男性", "女性", "その他")
);

// 集計結果を保存する配列
$results = array();
foreach ($options as $question => $choices) {
    $results[$question] = array_fill_keys($choices, 0);
}

// POSTデータが存在する場合、集計を行う
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($options as $question => $choices) {
        // 選択されたアンケートの選択肢を取得
        $selected_option = $_POST[$question];

        // 選択肢が有効なものであるか確認
        if (in_array($selected_option, $choices)) {
            // 集計結果を更新
            $results[$question][$selected_option]++;
        }
    }
}

// 集計結果を表示
foreach ($results as $question => $counts) {
    $total = array_sum($counts);
    echo "<h2>" . $question . "</h2>";
    foreach ($counts as $option => $count) {
        $percentage = $total > 0 ? round($count / $taotl * 100, 2) : 0;
        echo $option . ": " . $count . " (" . $percentage . "%)<br>";
    }
}
?>
