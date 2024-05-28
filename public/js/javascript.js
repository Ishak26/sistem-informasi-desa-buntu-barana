    // function previewImage(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function (e) {
    //             document.getElementById('gambar').src = e.target.result;
    //         reader.readAsDataURL(input.files[0]);
    //     }
    //   }
    // }
    function previewImage() {
      const file = document.querySelector('.gambar');
      const gambar = document.getElementById('Gambar');
      gambar.style.height='200px'; 
          var reader = new FileReader();
          reader.readAsDataURL(file.files[0]);
          reader.onload = function (e) {
              gambar.src = e.target.result;
          }
      }
