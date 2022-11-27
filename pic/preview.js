let vm = new Vue({
    data() {
          return {
              dataURI: null,
          }
      },
    methods:{
      previewDataURI(e) {
              const _self = this;
              let [file] = e.target.files;
              console.log('previewDataURI', file);
              const _fileReader = new FileReader();
              _fileReader.readAsDataURL(file);
              _fileReader.onload = (e => {
                  console.log('result', e.target.result);
                  _self.dataURI = e.target.result;
              })
          },
    }
    
  }).$mount('#app');