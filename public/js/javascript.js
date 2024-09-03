   function previewImage(img,fileimg) {
      const file = document.querySelector(fileimg);
      const gambar = document.getElementById(img);
        gambar.style.height='200px'; 
            var reader = new FileReader();
            reader.readAsDataURL(file.files[0]);
            reader.onload = function (e) {
                gambar.src = e.target.result;
            }
      }

    function loadModal(modalId){
        window.onload = function() {
                var myModal = new bootstrap.Modal(modalId);
                myModal.show();
        };      
      }

    // fungsi verifikasi tombol hapus

    function confirmedHapus(e){
      const konfirmasi =confirm('yakin ingin menghapus data ??')
      if(konfirmasi==false){
            e.preventDefault()
        }
    }

    function myAlert(Waktu){
      var time = 5;
      const alert =document.getElementById('alert')
      const waktuTunggu =document.getElementById('time')
      if(alert != null ){
          const timeOut =  setInterval(() => {
              waktuTunggu.innerHTML= time-=1
               if (time === -1){
                   alert.style.display ='none'
                  }
                  
          }, 1000);
          
          setTimeout(() => {
           clearInterval(timeOut);
          }, 6000);
      }
    }
    