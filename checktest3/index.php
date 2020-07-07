<?php
require_once("getData.php");
$getdata = new getData;
$post = $getdata->getPostData();
$userdata = $getdata->getUserData();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>チェックテスト4</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class = "wrapper">
    <div class = "clearfix">
    <div class = "header">
        <img src="logo.png">
        <div class = "name">ようこそ <?php echo $userdata['last_name'].$userdata['first_name'] ?> さん</div>
        <div class = "time">最終ログイン日：<?php echo $userdata['last_login'] ?></div>
    </div>
    </div>
    <div class = "main">
        <table>
            <tr>
                    <th>記事ID</th>
                    <th>タイトル</th>
                    <th>カテゴリ</th>
                    <th>本文</th>
                    <th>投稿日</th>
            </tr>
                <?php while($row = $post->fetch(PDO::FETCH_ASSOC)) :?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php if($row['category_no'] == 1 ){
                                    echo '食事';
                                } elseif ($row['category_no'] == 2 ) {
                                    echo '旅行';
                                } else {
                                    echo 'その他';
                                }
                                ?></td>
                        <td><?php echo $row['comment'] ?></td>
                        <td><?php echo $row['created'] ?></td>
                    </tr>
                <?php endwhile ?>
        </table>
    </div>
    <div class = "footer">Y&I group.inc</div>
    </div>
</body>
</html>