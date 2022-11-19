<?php
  session_start();
  if(!isset($_SESSION['id'])){
    echo "<script>location.href='start.php'</script>";
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PASSWORD-CHANGE PAGE</title>
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
        #CCU FOCUS <div class="title-font2">PASSWORD-CHANGE</div> PAGE#
    </div>
    <div class="title-font-ch">#CCU FOCUS <div class="title-font-ch2">更改密碼</div>頁面#</div>
    <br/><br/>
    <form method="POST" action="">
        <div class="saying">更新密碼: <input type="password" name="student_pwd1" value=""></div><br/>
        <div class="saying">密碼確認: <input type="password" name="student_pwd2" value=""></div><br/>
        <br/><br/>
		<input type="submit" value="SUBMIT">
    <a href="main.php" title="RETURN" class="sign1">RETURN</a>
	</form>
</body>
</html>
<?php
    require_once ('SQL_connection.php');
?>
<?php
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $student_pwd1 = $_POST["student_pwd1"];
        $student_pwd2 = $_POST["student_pwd2"];
      
        if($student_pwd1==''||$student_pwd2==''){
          echo "<br/><div class=\"error\">(請填寫所有欄位)</div>";
          exit;
        }else{
          if($student_pwd1!=$student_pwd2){
            echo "<br/><div class=\"error\">(學生密碼與確認密碼不同)</div>";
            exit;
          }else{
            echo"<script language=\"javascript\">alert('密碼更改成功!');location.href=\"logout.php\";</script>";
            $student_pwd1 = password_hash($student_pwd1, PASSWORD_DEFAULT);
            $sqlQuery = sprintf("UPDATE `student_info` SET student_password='%s' WHERE student_id='%s';",$student_pwd1,$_SESSION['id']);
            $connection->query($sqlQuery);
            $connection->close();
          }
        }
        
      }
      
      
?>