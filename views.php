<?php
    session_start();
    if(!isset($_SESSION['id'])){
        echo "<script>location.href='start.php'</script>";
    }
    require_once ('SQL_connection.php');
    $sqlQuery = sprintf("SELECT `subject_name` FROM `subject` WHERE `subject_short`='%s';",$_SESSION['subject']);
    $result = $connection->query($sqlQuery);
    $row = $result->fetch_row();
    $subject_name=$row[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="pic/bird.ico" type="image/x-icon">
    <link rel="preload" href="test4.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <title>VIEW PAGE</title>
    <style type="text/css">
            body{
                background-image: url(pic/mist.jpg);/*背景圖片*/
                background-position:top;
            }
    </style>
</head>
<body>
    <div class="title-font">
        #<img src="pic/ccu-removebg-preview.png" style="height:70px;">CCU FOCUS <div class="title-font2">VIEW</div> PAGE#
    </div>
    <div class="title-font-ch">#CCU FOCUS <div class="title-font-ch2">瀏覽</div>頁面#</div><br/>
    <form  method="POST" action="">
    <?php
        echo "<div class=\"saying\">請選擇".$subject_name."系科目:";
    ?>
    <select name="s_subject" id="s_subject" class="sform">
    <?php
            
            require_once ('SQL_connection.php');
            $subject=$_SESSION['subject'];
            $sqlQuery = sprintf("SELECT * FROM `%s`;",$subject);
            if ($result = $connection->query($sqlQuery)) {
                # 取得結果
                while ($row = $result->fetch_row()) {
                  echo "<option value=".$row[1].">".$row[0]."</option>";
                }
                $result->close();
              } else {
                echo "執行失敗：" . $connection->error;
              }
              
        ?>
    </select><br/><br/>
    <?php
        echo "</div>";
    ?>
    <div class='saying2'>請珍惜筆記和考古資源<br/>by JOJOTOOL</div><br/>
    <input type="submit" value="SUBMIT">
    <a href="main.php" title="RETURN" class="sign1">RETURN</a>
    </form>
    <img src="pic/dog-removebg-preview.png" width="300"><br/>
    <div class="search container">
    <table>
    
        <thead>
            <th scope="col" >NUMBER</th>
            <th scope="col" >STUDENT ID</th>
            <th scope="col" >NAME</th>
            <th scope="col" >TITLE</th>
            <th scope="col" >FILE URL(ID)</th>
            <th scope="col" >DATE</th>
            <th scope="col" >NOTE</th>
        </thead>
        <script src="show.js"></script>
        <?php
        $num=1;
         if ($_SERVER["REQUEST_METHOD"] === "POST"){
            $s_subject=$_POST['s_subject'];
            require_once ('SQL_connection.php');
            $sqlQuery = sprintf("SELECT * FROM `%s` ORDER BY `upload_like` ASC;",$s_subject);
            
            if ($result = $connection->query($sqlQuery)) {
                # 取得結果
                while ($row = $result->fetch_row()) {    
                    $note=$row[5];
                    echo "<tr><td>".$num."</td><td>".$row[2]."</td><td>".$row[1]."</td><td>".$row[3]."</td><td><a href=\"".$row[4]."\"  target=\"_blank\" class=\"sign2\">".$row[0]."</a></td><td>".$row[6]."</td><td>".$note."</td></tr>";
                    $num++;
                }
                $result->close();
              } else {
                echo "執行失敗：" . $connection->error;
              }
            }
        ?>
        
    </table>
    </div><br/><br/>
</body>
</html>
    
