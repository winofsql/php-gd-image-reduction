<?php 
$view_head_height = 220

?>
<!DOCTYPE html>
<html>
<head>
<title>PHP GD Test</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css">

<?php require_once("iframe-css.php") ?>
</head>
<body>
<div id="main">
<h1 class="alert alert-primary">GD で単純な画像処理( 縮小あり )</h1>
<div class="m-4">
  <a class="btn btn-primary mt-1" target="myframe" href="gd-1.php">🟥 【gd image ver  1】: URL参照の jpg 画像表示</a>

  <a class="btn btn-primary mt-1" target="myframe" href="gd-2.php">🟥 【gd image ver  2】: URL参照の jpg 画像縮小表示</a><br>

  <a class="btn btn-primary mt-1" target="myframe" href="gd-3.php">🟥 【gd image ver  3】: 指定大きさの画像を指定色で塗りつぶす</a><br>

</div>
</div>

<iframe id="extend" src="about:blank" name="myframe"></iframe>

</body>
</html>



<?//php phpinfo() ?>