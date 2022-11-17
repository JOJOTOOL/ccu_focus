var aI = document.getElementsByTagName("i");

function getTime() {
  // 設置倒數計時: 結束時間 - 當前時間

  // 當前時間
  var time = new Date();
  var nowTime = time.getTime(); // 獲取當前毫秒數
  // 設置結束時間 : 12月22號 0點0分0秒
  time.setMonth(11); //   獲取當前 月份 (從 '0' 開始算)
  time.setDate(22); //   獲取當前 日
  time.setHours(0); //   獲取當前 時
  time.setMinutes(0); //   獲取當前 分
  time.setSeconds(0);
  var endTime = time.getTime();

  // 倒數計時: 差值
  var offsetTime = (endTime - nowTime) / 1000; // ** 以秒為單位
  var sec = parseInt(offsetTime % 60); // 秒
  var min = parseInt((offsetTime / 60) % 60); // 分 ex: 90秒
  var hr = parseInt((offsetTime / 60 / 60) % 24); // 時
  var day = parseInt(offsetTime / 60 / 60 / 24); // 時

  aI[0].textContent = day + "天";
  aI[1].textContent = hr + "時";
  aI[2].textContent = min + "分";
  aI[3].textContent = sec + "秒!";
}

setInterval(getTime, 1000);
