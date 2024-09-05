import $ from 'jquery';

// Import our custom CSS
import '../scss/style.scss'

// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'

// export function loadModal(modalId){
//   window.onload = function() {
//           var myModal = new bootstrap.Modal(modalId);
//           myModal.show();
//   };      
// }



// ajax modal tambah data Penerima bantuan
window.updatePenerimaBantuan=(datas)=>{
  $('#FormTambahPenerima').attr('action',`/dashboard/bantuan/penerima/update/${datas.pivot.id}`)
  $('#nikPenduduk').on('keyup',function() {
    $.get('/dashboard/caripenduduk',{data: $('#nikPenduduk').val()}).done(function (data){
      $('#namaPenduduk').val(data.nama)
      $('#penduduk_id').val(data.id)
    }
    )
  });
}
