    const input = document.querySelector('input');
    const preview = document.querySelector('.preview');

    input.style.opacity = 0;

    input.addEventListener('change', updateImageDisplay);

    function updateImageDisplay() {
      while(preview.firstChild) {
        preview.removeChild(preview.firstChild);
      }

      const curFiles = input.files;
      if(curFiles.length === 0) {
        const para = document.createElement('p');
        para.textContent = '尚未選擇上傳檔案';
        preview.appendChild(para);
      } else {
        const list = document.createElement('ol');
        preview.appendChild(list);

        for(const file of curFiles) {
          const listItem = document.createElement('li');
          const para = document.createElement('p');

          if(validFileType(file)) {
            para.textContent = `檔名: ${file.name}, 檔案大小: ${returnFileSize(file.size)}.`;
            const image = document.createElement('img');
            if(fileImCheck.includes(file.type)){
                image.src = "pic/chef.jpg";
            }else{
                image.src = URL.createObjectURL(file);
            }
            listItem.appendChild(image);
            listItem.appendChild(para);
          } else {
            const image = document.createElement('img');
            para.textContent = `檔名 ${file.name}: 不是可接受的檔案類型`;
            image.src = "pic/QQ.jpg";
            listItem.appendChild(image);
            listItem.appendChild(para);
          }

          list.appendChild(listItem);
        }
      }
    }

    const fileImCheck = [
      'application/pdf',
      'application/word'
    ]
    const fileTypes = [
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
        'application/word'
    ];

    function validFileType(file) {
      return fileTypes.includes(file.type);
    }

    function returnFileSize(number) {
      if(number < 1024) {
        return number + 'bytes';
      } else if(number > 1024 && number < 1048576) {
        return (number/1024).toFixed(1) + 'KB';
      } else if(number > 1048576) {
        return (number/1048576).toFixed(1) + 'MB';
      }
    }