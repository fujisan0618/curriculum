<?php

// db_connect.phpの読み込みFILL_IN
require_once('db_connect.php');
// POSTで送られていれば処理実行
if(isset($_POST['signUp'])){
// nameとpassword両方送られてきたら処理実行
    if(!empty($_POST['name']) && !empty($_POST['password'])){
        $name=$_POST['name'];
// PDOのインスタンスを取得
    $pdo = db_connect();
    try{
// パスワードをハッシュ化
    $password=$_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
// プリペアドステートメントの作成
    $stmt = $pdo->prepare("INSERT INTO users(name, password) VALUES (?, ?)");
// 値をセット
    $stmt->execute(array($name, $password_hash));
// 実行
    $name = $pdo->lastinsertid();
//登録完了メッセージ出力
    echo '登録が完了しました。';
}catch (PDOException $e) {
    // エラーメッセージの出力
    $errorMessage = 'データベースエラー';
// 終了 $errorMessageFILL_
}
}
}
?>

<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h1>新規登録</h1>
    <form method="POST" action="">
        user:<br>
        <input type="text" name="name" id="name">
        <br>
        password:<br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="submit" id="signUp" name="signUp">
    </form>
</body>
</html>