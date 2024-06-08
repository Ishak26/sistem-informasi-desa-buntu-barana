@extends('Dashboard.layout.main')
@section('container')
{{-- SESSION HANDLING --}}
    @if (session('berhasil'))
      <script>alert('{{session("berhasil")}}')</script>
    @endif

    @foreach ($errors->all() as $item)
      <script>alert('{{$item}}')</script>
    @endforeach
{{-- END SESSION HANDLING --}}
    <div class="row mt-2 mb-2">
      <div class="col-sm-6">
        <div class="w-75 border border-2 border-success rounded m-auto p-2 shadow border-opacity-50 bg-success">
          <p class="fs-4 fw-bold">Pendapatan:</p>
          <p class="fs-5 fw-bold text-muted text-center">
            @php
            $i=0;
           foreach ($data as $key) {
             $i=$i+intval($key->nominal);
           }
           echo "Rp ". number_format($i,0,',','.')
       @endphp
          </p>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="w-75 border border-2 border-opacity-50 border-danger rounded m-auto p-2 shadow bg-danger">
          <p class="fs-4 fw-bold">Pengeluaran:</p>
          <p class="fs-5 fw-bold text-muted text-center">
            @php
            $i=0;
           foreach ($pengeluaran as $key) {
             $i=$i+intval($key->total_harga);
           }
           echo "Rp ". number_format($i,0,',','.')
       @endphp
          </p>
        </div>
      </div>
    </div>
    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#pendapatan"><span class="bi bi-plus-square"></span></button>

    <form action="/dashboard/pendapatan/tambah" method="post">
      @csrf
      <div class="modal fade" id="pendapatan" index="-1">
        <div class="modal-dialog"> 
          <div class="modal-content">
            <div class="modal-header">
              <h4>Tambah Pendapatan</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
              <label for="" class="form-col-label">Keterangan Pendapatan</label>
              <input type="text" name="Keterangan" class="form-control" id="">
              <div class="row">
                <div class="col-sm-4">
                  <label for="" class="form-col-label">Nominal</label>
                  <input id="nominal" type="number" class="form-control" name="nominal" >
                </div>
                <div class="col-sm-4">
                  <label for="" class="form-col-label">atau</label>
                  <input id="rupiah" readonly class="form-control">
                </div>
                <div class="col-sm-4">
                  <label for="" class="form-col-label">Priode</label>
                  <select class="form-select" name="tahunanggaran">                  
                      @for ($year = (int)date('Y'); 2020 <= $year; $year--): 
                        <option value="{{$year}}"> {{$year}}</option>
                      @endfor;
                   </select>
                </div>
              </div>
              <label for="" class="form-col-label">Sumber Dana</label>
              <select name="sumberdana" class="form-select" id="">
                <option >--Pilih--</option>
                <option value="DD">Dana Desa</option>
                <option value="DBH">Bagi Hasil Pajak</option>
                <option value="ADD">Alokasi Dana Desa</option>
                <option value="LAINNYA">Lain-Nya..</option>
              </select>
            </div>
            <div class="modal-footer">
              <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal">tutup</button>
              <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <h3 class="text-center m-3 mt-2">Pendapatan</h3>
    <table class="table">
      <tr class="text-center">
        <th scope="col">No</th>
        <th scope="col">Keterangan Pendapatan</th>
        <th scope="col">Tahun Anggaran</th>
        <th scope="col">Sumber Dana</th>
        <th scope="col">Nominal</th>
      </tr>
      @foreach ($data as $item)
      <tr class="text-center">
        <td>{{$loop->iteration}}</td>
        <td>{{$item->Keterangan}}</td>
        <td>{{$item->tahunanggaran}}</td>
        <td>{{$item->sumberdana}}</td>
        <td>{{"Rp ". number_format($item->nominal,0,',','.')}}</td>
      </tr>
   @endforeach
      <tr class="text-center bg bg-primary">
        <td></td>
        <td class="fw-bold">Total:</td>
        <td></td>
        <td></td>
        <td class="fw-bold">
          @php
              $i=0;
              foreach ($data as $key) {
                $i=$i+intval($key->nominal);
              }
              echo "Rp ". number_format($i,0,',','.')
          @endphp
        </td>
      </tr>
  </table>
  <h3 class="fs-3 text-center"> Pengeluaran</h3>
  <table class="table">
    <tr class="text-center">
      <th scope="col">No</th>
      <th scope="col">Keterangan Pengeluaran</th>
      <th scope="col">Sumber Dana</th>
      <th scope="col">Nominal</th>
    </tr>
   @foreach ($pengeluaran as $item)
   <tr class="text-center">
    <td>{{$loop->iteration}}</td>
    <td>{{$item->Belanja}}</td>
    <td>{{"Rp ". number_format($item->total_harga,0,',','.')}}</td>
  </tr>
   @endforeach
   <tr class="text-center bg bg-danger">
    <td></td>
    <td class="fw-bold">Total:</td>
    <td></td>
    <td></td>
    <td class="fw-bold">
      @php
           $i=0;
          foreach ($pengeluaran as $key) {
            $i=$i+intval($key->total_harga);
          }
          echo "Rp ". number_format($i,0,',','.')
      @endphp
    </td>
  </tr>
  </table>
  <script>
    const nilai=document.getElementById('nominal');
    const harga=document.getElementById('rupiah');
    nilai.addEventListener('keyup',function(){
      console.log(nilai.value);
      int=nilai.value
      var number_string = int.replace(/[^,\d]/g, '').toString(),
      split   		= number_string.split(','),
      sisa     		= split[0].length % 3,
      rupiah     		= split[0].substr(0, sisa),
      ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
    
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
    
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return harga.value='Rp '+rupiah;
    });
  </script>
@endsection