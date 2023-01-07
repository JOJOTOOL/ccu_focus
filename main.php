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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preload" href="test3_v3.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <script src="timer.js"></script>
    <!-- response website -->
    <meta name="viewpoint" content="width=device-width,initial-scale=1,maximum-scale=1"/> 
    <style type="text/css">
      
    </style>
</head>
<body class="img-fluid" >
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <img src="pic/ccu-removebg-preview.png" style="height:40px;">
    <div class="title-font"><a href="start.php" title="home page" style="text-decoration:none; color:#0c4293;">CCU <div class="title-font2">FOCUS</div></a></div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
             <div style="margin:5px;"><a href="profile.php" title="profile" class="sign2 nav-link">PROFILE</a></div>
        </li>
        <li class="nav-item">
             <div style="margin:5px;"><a href="change_password.php" title="change password" class="sign2 nav-link">CHANGE PASSWORD</a></div>
        </li>
        <li class="nav-item">
             <div style="margin:5px;"><a href="logout.php" title="logout" class="sign2 nav-link">LOGOUT</a></div>
        </li> 
        </ul>
    <div class="welcome" align="center" valign="center">Welcome! </div>
    <?php
            echo "<div class=\"user\">".$_SESSION['id']." ".$_SESSION['name']."</div"?>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
<div class="col-12 col-lg-6">
<form method="POST" action="" class="sform">
<div style="margin:10px;"></div>
<p class="fw-bold fs-4 text-light">選擇一個系所</p>
<div style="margin:10px;"></div>
                <select name="subject" id="subject" class="text-light bg-dark form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>系所</option>
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
<div style="margin:10px;"></div>
<p class="fw-bold fs-4 text-light">選擇一個類型</p>
<div style="margin:10px;"></div>
<div style="margin:10px;"></div>
                    <select  name="type" id="type" class="text-light bg-dark form-select form-select-sm" aria-label=".form-select-sm example">
                      <option selected>類型</option>
                      <option value="archeology">考古題</option>
                      <option value="notes">筆記</option>
                    </select>
<div style="margin:10px;"></div>
<div class="container text-center">
  <div class="row align-items-center">
    <div class="col">
      <button type="submit" value="VIEW" name="view" title="view" class="btn btn-danger fs-4"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-journal-arrow-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 5a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5A.5.5 0 0 1 8 5z"/>
  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
</svg>view</button>
    </div>
    <div class="col">
      <button type="submit" value="UPLOAD" name="upload" title="upload" class="btn btn-danger fs-4"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-journal-arrow-up" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 11a.5.5 0 0 0 .5-.5V6.707l1.146 1.147a.5.5 0 0 0 .708-.708l-2-2a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L7.5 6.707V10.5a.5.5 0 0 0 .5.5z"/>
  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
</svg>upload</button>
    </div>
  </div>
</div>
              </form>
</div>
    <div class="col-12 col-lg-6">
        <div style="margin:10px;"></div>
        <table class="table text-light bg-dark">
            <thead>
                <th scope="col" width="100px">RANK</th>
                <th scope="col" >STUDENT ID</th>
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
        
        <div class="timer1">#距離段考週12月22號還有...</div>
        <div class="timer2">
            <i></i> <i></i> <i></i> <i></i>
        </div>
          
    </div>
    <div class="col-6">
        
    </div>
    </div>
  </div>
</div>  
<footer class="text-center text-lg-start fixed-bottom" >
    <div class="text-center">
        <a href="https://ecourse2.ccu.edu.tw/" target="_blank"><img src="pic/ecourse2.png" alt="eCourse2" width="70"></a>
        <a href="https://www.ccu.edu.tw/" target="_blank"><img src="pic/ccu2.png" alt="ccu" width="70"></a>
        <a href="https://ee.ccu.edu.tw/" target="_blank"><img src="pic/ccuee.png" alt="ccuee" width="70"></a>
    </div>
  <!-- Copyright -->
  <div class="text-center p-1" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright:
    <a class="text-dark" href="start.php">cat.com</a>
  </div>
  <!-- Copyright -->
</footer>
    
    
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
