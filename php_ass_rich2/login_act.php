<?php

$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

require_once('funcs.php');
$pdo = db_conn();


// $lid test1
// $lpw test1

// gs_user_tableに、IDとWPがあるか確認する。
$stmt = $pdo->prepare('SELECT * FROM gs_ass_user WHERE u_id = :lid AND u_pw =:lpw;');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
// if($status === false) {
//     sql_error($stmt);
// }
if($status==false){
    $error = $stmt ->errorInfo();
    exit("QueryError:".$error[2]);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();

if($val['id'] != '' ){ // &&  password_verify($lpw, $val['lpw'])) { //* PasswordがHash化の場合はこっちのIFを使う
    //Login成功時 該当レコードがあればSESSIONに値を代入
    $_SESSION['chk_ssid'] = session_id();
    $_SESSION['u_name'] = $val['u_name'];
    $_SESSION['kanri_flg'] = $val['kanri_flg'];
    header('Location: select.php');
} else {
    //Login失敗時(Logout経由)
    header('Location: login.php');
}
exit();
