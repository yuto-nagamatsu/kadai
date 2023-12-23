<?php
//1. POSTデータ取得
$name   = $_POST['name'];
$email  = $_POST['email'];
$age    = $_POST['age'];
$sex    = $_POST['sex'];
$reason = $_POST["reason"];
$satisfaction = $_POST['satisfaction'];
$purpose= $_POST['purpose'];
$id      =$_POST["id"];       //IDも送られてくるので追加する

require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE 
        gs_ass_ank 
        SET
        name = :name, email = :email, age = :age, sex = :sex, satisfaction = :satisfaction,
        purpose = :purpose, reason = :reason, date = sysdate()
        where id = :id;
        ');
// UPDATE　テーブル名　SET 更新対象１　＝：更新データ、更新対象２ .... WHERE id = :id;

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR bindValueでSQLに直接入れることを防止する

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':name',$name,PDO::PARAM_STR);
$stmt->bindValue(':email',$email,PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_INT);
$stmt->bindValue(':sex',$sex,PDO::PARAM_INT);
$stmt->bindValue(':satisfaction',$satisfaction,PDO::PARAM_INT);
$stmt->bindValue(':reason',$reason,PDO::PARAM_STR);
$stmt->bindValue(':purpose',$purpose,PDO::PARAM_STR);

$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    redirect("select.php");
}
