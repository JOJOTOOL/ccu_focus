<?php
$server = "127.0.0.1:3306";         # MySQL/MariaDB 伺服器
$dbuser = "root";       # 使用者帳號
$dbpassword = "523817"; # 使用者密碼
$dbname = "ccu_focus";    # 資料庫名稱

# 連接 MySQL/MariaDB 資料庫
$connection = new mysqli($server, $dbuser, $dbpassword, $dbname);

# 檢查連線是否成功
if ($connection->connect_error) {
  die("連線失敗：" . $connection->connect_error);
}

# MySQL/MariaDB 指令


// # 執行 MySQL/MariaDB 指令
// if ($result = $connection->query($sqlQuery)) {
//   # 取得結果
//   while ($row = $result->fetch_row()) {
//     printf ("%s \n", $row[0]);
//     echo'<br>';
//   }

//   # 釋放資源
//   $result->close();
// } else {
//   echo "執行失敗：" . $connection->error;
// }

# 關閉 MySQL/MariaDB 連線
// $connection->close();
?>