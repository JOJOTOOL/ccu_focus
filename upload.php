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
    <link rel="shortcut icon" href="pic/bird.ico" type="image/x-icon">
    <link rel="preload" href="test4.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <!-- <script src="preview.js"></script> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPLOAD PAGE</title>
    <style type="text/css">
            body{
                background-image: url(pic/mist.jpg);/*背景圖片*/
                background-position:top;
            }
        </style>
    <script type= "text/javascript" >
        function  changeAgentContent(){
            document.getElementById( "inputFileAgent" ).value = document.getElementById( "inputFile" ).value;
        }
    </script>

</head>
<body>
    
    <div class="title-font">
        # <img src="pic/ccu-removebg-preview.png" style="height:70px;">CCU FOCUS <div class="title-font2">UPLOAD</div> PAGE#
    </div>
    <div class="title-font-ch">#CCU FOCUS <div class="title-font-ch2">上傳</div>頁面#</div>
    <form  method="POST" action="" enctype="multipart/form-data">
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
    </select><br/>
    <?php
        echo "</div>";
    ?>
    <div class="saying">檔案標題(限100字)：<br/><textarea name="titles" id="titles" cols="40" rows="1" class="saying2"></textarea></div>
    <br/>
        <div>
            <label for="file" class="saying2">點此選擇上傳檔案(PNG,JPG,BMP,GIF,PDF)</label>
            <input type="file" id="file" name="file">
        </div>
        <div class="preview saying2">
            <p>尚未選擇上傳檔案</p>
        </div>
        <div class="saying">備註(限1000字)：<br/><textarea name="notes" id="notes" cols="52" rows="7" class="saying2"></textarea></div>
        <input type="submit" value="SUBMIT">
        <a href="main.php" title="RETURN" class="sign1">RETURN</a>
    </form>
    <script  type="text/javascript" src="preview.js"></script><br/>
</body>
</html>

<?php
    $accept_type=array(
    'image/apng',
    'image/bmp',
    'image/gif',
    'image/jpeg',
    'image/pjpeg',
    'image/png',
    'image/svg+xml',
    'image/tiff',
    'image/webp',
    'image/x-icon',
    'application/pdf',
    'application/word');
    require_once ('SQL_connection.php');
        //限制圖片型別格式，大小
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
       
        if($_FILES['file']["name"]===''||$_POST['titles']===''){
            
            echo "<br/><div class=\"error\">(請選擇上傳檔案或填寫檔案標題)</div><br/>";
            exit;
        }else{
        $titles=$_POST['titles'];
        $file_type=$_FILES["file"]["type"];
        $s_subject=$_POST['s_subject'];
        $subject=$_SESSION['subject'];
        if (in_array($file_type,$accept_type)) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
            } else {
                $arr=explode('.',$_FILES["file"]["name"]);
                $upload_file_name=time().".".end($arr);
            //設定檔案上傳路徑，選擇指定資料夾
                if (file_exists("files/".$subject."/".$s_subject."/".$upload_file_name)) {
                    echo $_FILES["file"]["name"] . " already exists. ";
                } else {
                    move_uploaded_file(
                        $_FILES["file"]["tmp_name"],
                        "files/".$subject."/".$s_subject."/".$upload_file_name
                    );
                    $file_path="files/".$subject."/".$s_subject."/".$upload_file_name;
                    $name=$_SESSION['name'];
                    $id=$_SESSION['id'];
                    $notes=$_POST['notes'];
                    $sqlQuery = sprintf("SELECT `num` FROM `count`;");
                    $result = $connection->query($sqlQuery);
                    $row = $result->fetch_row();
                    $upload_id=$row[0];
                    $upload_id++;
                    $sqlQuery = sprintf("UPDATE `count` SET num=%d;",$upload_id);
                    $connection->query($sqlQuery);
                    $sqlQuery = sprintf("INSERT INTO `%s` VALUES (%d,'%s','%s','%s','%s','%s',DEFAULT,DEFAULT,DEFAULT);",$s_subject,$upload_id,$name,$id,$titles,$file_path,$notes);
                    $connection->query($sqlQuery);
                    echo"<script language=\"javascript\">alert('上傳成功!');location.href=\"main.php\";</script>";
                    //echo "儲存於: " . "../upload/" . $_FILES["file"]["name"];//上傳成功後提示上傳資訊
                }
            }
        } else {
            echo "<br/><div class=\"error\">(請選擇有效上傳檔案)</div>";//上傳失敗後顯示錯誤資訊
        }
        
        }
    }
?>