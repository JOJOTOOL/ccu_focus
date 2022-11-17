<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CCU FOCUS SIGN UP PAGE</title>
    <link rel="shortcut icon" href="pic/cat.ico" type="image/x-icon">
    <link rel="preload" href="test2.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    
    <!-- response website -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <div class="title-font">
        #CCU FOCUS <div class="title-font2">SIGN UP</div> PAGE#
    </div>
    <div class="title-font-ch">#CCU FOCUS <div class="title-font-ch2">註冊</div>頁面#</div>
    <br/><br/>
    <form method="POST" action="">
		<div class="saying">學生學號: <input type="text" name="student_id" value=""></div><br/>
        <div class="saying">學生密碼: <input type="password" name="student_pwd1" value=""></div><br/>
        <div class="saying">密碼確認: <input type="password" name="student_pwd2" value=""></div><br/>
        <div class="saying">學生姓名: <input type="text" name="student_name" value=""></div><br/>
        <div class="saying">CCU信箱: <input type="text" name="CCU_email" value=""></div><br/>
        <div class="saying">就讀系所: <input type="text" name="student_major" value=""></div>
        <br/><br/>
		<input type="submit" value="SUBMIT">
    <a href="start.php" title="RETURN" class="sign1">RETURN</a>
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
        $student_id = $_POST["student_id"];
        $student_name = $_POST["student_name"];
        $student_major = $_POST["student_major"];
        $CCU_email = $_POST["CCU_email"];
      //   if (isset($users[$username]) && $users[$username] === $password){
      // // Add your code here:
      //    header("Location: https://www.facebook.com/");
      //     exit;
          
      //   } else {
      //     $validation_error = "* Incorrect username or password.";
      //   }
        if($student_pwd1==''||$student_pwd2==''||$student_id==''||$student_name==''||$student_major==''||$CCU_email==''){
          echo "<br/><div class=\"error\">(請填寫所有欄位)</div>";
          exit;
        }else{
          if($student_pwd1!=$student_pwd2){
            echo "<br/><div class=\"error\">(學生密碼與確認密碼不同)</div>";
            exit;
          }else{
            echo"<script language=\"javascript\">alert('註冊成功!');location.href=\"start.php\";</script>";
            $student_pwd1 = password_hash($student_pwd1, PASSWORD_DEFAULT);
            $sqlQuery = sprintf("INSERT INTO `student_info` VALUES ('%s','%s','%s','%s','%s',%d);",$student_id,$student_name,$student_pwd1,$CCU_email,$student_major,100);
            $connection->query($sqlQuery);
            $connection->close();
          }
        }
        
      }
      
      
?>