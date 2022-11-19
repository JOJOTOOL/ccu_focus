<?php
  session_start();
  if(!isset($_SESSION['id'])){
    echo "<script>location.href='start.php'</script>";
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PROFILE PAGE</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="pic/rcat.ico" type="image/x-icon">
        <link rel="preload" href="test2.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <!-- response website -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            body{
                background-image: url(pic/bg6.jpg);/*背景圖片*/
                background-position:top;
            }
        </style>
    </head>
    <body>
    <div class="title-font">
        #CCU FOCUS <div class="title-font2">PROFILE</div> PAGE#
    </div>
    <div class="title-font-ch">#CCU FOCUS <div class="title-font-ch2">個人資料</div>頁面#</div>
    <br/><br/>
    <?php
        require_once ('SQL_connection.php');
        $sqlQuery = sprintf("SELECT * FROM `student_info` WHERE student_id='%s';",$_SESSION['id']);
            if ($result = $connection->query($sqlQuery)) {
                # 取得結果
                $row = $result->fetch_row();
              } else {
                echo "執行失敗：" . $connection->error;
              }
              echo"<div style=\"text-align:inherit;color:#fcbe24;font-family:fantasy;font-size:50px;color:#ffaf5a;\">學生學號: ".$row[0]."</div>";
              echo"<div style=\"text-align:inherit;color:#fcbe24;font-family:fantasy;font-size:50px;color:#ffaf5a;\">學生姓名: ".$row[1]."</div>";
              echo"<div style=\"text-align:inherit;color:#fcbe24;font-family:fantasy;font-size:50px;color:#ffaf5a;\">CCU信箱: ".$row[3]."</div>";
              echo"<div style=\"text-align:inherit;color:#fcbe24;font-family:fantasy;font-size:50px;color:#ffaf5a;\">就讀系所: ".$row[4]."</div><br/><br/>";
              echo"<div style=\"text-align:inherit;color:#fcbe24;font-family:fantasy;font-size:50px;color:#f0311b;\">當前積分: ".$row[5]."</div>";
    ?>
    <br/><br/><a href="main.php" title="RETURN" class="sign1">RETURN</a>
</body>
</html>
