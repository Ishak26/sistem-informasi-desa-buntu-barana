    // function previewImage(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function (e) {
    //             document.getElementById('gambar').src = e.target.result;
    //         reader.readAsDataURL(input.files[0]);
    //     }
    //   }
    // }
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