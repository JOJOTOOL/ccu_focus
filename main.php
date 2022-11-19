<?php
  session_start();
  if(!isset($_SESSION['id'])){
    echo "<script>location.href='start.php'</script>";
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MAIN PAGE</title>
    <link rel="shortcut icon" href="pic/rcat.ico" type="image/x-icon">
    <link rel="preload" href="test3.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <script src="timer.js"></script>
    <!-- response website -->
    <meta name="viewpoint" content="width=device-width,initial-scale=1,maximum-scale=1"/> 
    <style type="text/css">
      @media screen and (max-width:600px){
		  .head{font-size:24px}              
		  .content{width:100%;text-align:center}
	  }
    </style>
</head>
<body>
    <img src="pic/ccu-removebg-preview.png" style="height:40px;">
    <div class="title-font"><a href="start.php" title="home page" style="text-decoration:none; color:#0c4293;">CCU <div class="title-font2">FOCUS</div></a>
    
  <form method="POST" action="" class="sform">
    <input type="submit" value="VIEW" class="sign1" name="view" title="view">
    <input type="submit" value="UPLOAD" class="sign1" name="upload" title="upload">
  
    <select name="subject" id="subject" class="sform">
    <?php
            require_once ('SQL_connection.php');
            $sqlQuery = sprintf("SELECT * FROM `subject`;");
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
        <!-- <option value="ee">電機</option>
        <option value="ls">生醫</option>
        <option value="cs">資工</option> -->
    </select>
    <select name="type" id="type" class="sform">
        <option value="archeology">考古題</option>
        <option value="notes">筆記</option>
    </select>
    
  </form>
  
    </div><br><br>
    <?php
        echo "<div class=\"welcome\">&emsp;Welcome! <div class=\"user\">".$_SESSION['id']." ".$_SESSION['name']."</div></div>";
     ?><br/><br/>
    
    <a href="https://ecourse2.ccu.edu.tw/" target="_blank"><img src="pic/ecourse2.png" alt="eCourse2" width="270" style="position:absolute; bottom:290px; left:53px;"></a>
    <a href="https://www.ccu.edu.tw/" target="_blank"><img src="pic/ccu2.png" alt="ccu" width="350" style="position:absolute; bottom:190px; left:50px;"></a>
    <a href="https://ee.ccu.edu.tw/" target="_blank"><img src="pic/ccuee.png" alt="ccuee" width="745" style="position:absolute; bottom:50px; left:40px;"></a>
    <br/>
    
    <div>&emsp;&emsp;&emsp;<a href="profile.php" title="profile" class="sign2">PROFILE</a></div><br/><br/>
    <div>&emsp;&emsp;&emsp;<a href="change_password.php" title="change password" class="sign2">CHANGE PASSWORD</a></div><br/><br/>
    <div>&emsp;&emsp;&emsp;<a href="logout.php" title="logout" class="sign2">LOGOUT</a></div>
    <div class="search">
    <table>
    
        <thead>
            <th scope="col" width="100px">RANK</th>
            <th scope="col" >ID</th>
            <th scope="col" >NAME</th>
            <th scope="col" >SCORE</th>
        </thead>
        <?php
            require_once ('SQL_connection.php');
            $sqlQuery = sprintf("SELECT * FROM `student_info` ORDER BY `student_value` DESC;");
            $num=1;
            if ($result = $connection->query($sqlQuery)) {
                # 取得結果
                while ($row = $result->fetch_row()) {
                  if($num>11){
                    break;
                  }
                  echo "<tr><td>".$num."</td><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[5]."</td></tr>";
                  $num++;
                }
                $result->close();
              } else {
                echo "執行失敗：" . $connection->error;
              }
        ?>
        
    </table>
    </div>
    <div class="timer1">#距離段考週12月22號還有...</div>
        <div class="timer2">
            <i></i> <i></i> <i></i> <i></i>
    </div>
</body>
</html>

<?php
  if(isset($_REQUEST['view'])){
    $_SESSION['subject']=$_POST['subject'];
    $_SESSION['type']=$_POST['type'];
    echo"<script language=\"javascript\">location.href=\"views.php\";</script>";
  }else if(isset($_REQUEST['upload'])){
    $_SESSION['subject']=$_POST['subject'];
    $_SESSION['type']=$_POST['type'];
    echo"<script language=\"javascript\">location.href=\"upload.php\";</script>";
  }
?>