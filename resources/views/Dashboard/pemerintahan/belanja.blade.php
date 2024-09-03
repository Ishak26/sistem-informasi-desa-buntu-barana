@extends('Dashboard.layout.main')
@section('container')
{{-- SESSION HANDLING --}}
@include('Dashboard.partials.sessionhandle')
{{-- END SESSION HANDLING --}}

   <h3 class="text-center">Riwayat Belanja</h3>
   <table class="mb-3">
    <tr>
      <td width="200" >Nama Program Kerja</td>
      <td width="3">:</td>
      <td>{{$proker->proker}}</td>
    </tr>
    <tr>
      <td width="200" >Anggaran</td>
      <td width="3">:</td>
      <td>{{"Rp ". number_format($proker->anggaran,0,',','.')}}</td>
    </tr>
    <tr>
      <td width="200" >Terbilang</td>
      <td width="3">:</td>
      <td>{{$proker->terbilang}}</td>
    </tr>
    <tr>
      <td width="200" >Tanggal Pengerjaan</td>
      <td width="3">:</td>
      <td>{{$proker->Tanggal_Pengerjaan}}</td>
    </tr>
   </table>

  <button type="button" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#Belanja"><i class="bi bi-cart-plus me-2"></i>Belanja</button>
  {{-- Modal Belanja --}}
  <div class="modal fade" id="Belanja" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Belanja</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/dashboard/programkerja/belanja/tambah" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="number" name="ProgramKerja_id" value="{{$proker->id}}" id="" hidden>
            <div class="mb-3">
              <label class="col-form-label">Keterangan Belanja</label>
              <textarea class="form-control @error('Belanja') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="Belanja" required value={{old('Belanja')}}></textarea>
              @error('Belanja')
                  {{$message}}
              @enderror
            </div>
            <div class="mb-3">
              <label class="col-form-label">Jumlah satuan</label>
              <input class="form-control @error('Jumlah_satuan') is-invalid @enderror" onchange="jumlah()" type="number" name="Jumlah_satuan" id="satuan" required value={{old('Jumlah_satuan')}}>
              @error('Jumlah_satuan')
                  {{$message}}
              @enderror
            </div>
            <div class="mb-3">
              <label class="col-form-label">harga</label>
              <input class="form-control @error('harga') is-invalid @enderror" onchange="jumlah()" type="number" name="harga" id="harga" value={{old('haraga')}} required>
              @error('harga')
                  {{$message}}
              @enderror
            </div>
            <div class="mb-3">
              <label class="col-form-label">Total belanja</label>
              <input class="form-control @error('total_harga') is-invalid @enderror"  type="number" name="total_harga" id="total" readonly value={{old('total_harga')}} required>
              @error('total_harga')
                  {{$message}}
              @enderror
            </div>
            <div class="mb-3">
              <label class="col-form-label">Bukti Belanja</label>
              <input class="form-control @error('Bukti_belanja') is-invalid @enderror" type="file" name="Bukti_belanja" id="" value={{old('Bukti_belanja')}} required>
              @error('Bukti_belanja')
                  {{$message}}
              @enderror
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <table class="table table-bordered">
    <tr>
      <th>Belanja</th>
      <th>Jumlah</th>
      <th>harga</th>
      <th>Total harga</th>
      <th>Status verifikasi</th>
      @canany(['sekertaris', 'kasipemerintahan'])
        <th>Verifikasi</th>
      @endcanany
    </tr>
    {{-- @dd($Belanja) --}}
    @foreach ($Belanja as $item)
        <tr>
          <td>{{$item->Belanja}}</td>
          <td>{{$item->Jumlah_satuan}}</td>
          <td>{{$item->harga}}</td>
          <td>{{$item->total_harga}}</td>
          <td>
            <i class="{{($item->verifikasi==0)?'bi bi-x-square-fill':'bi bi-check-square-fill'}}">
            </i>
          </td>
          @canany(['sekertaris', 'kasipemerintahan'])
            <td>
              @if ($item->verifikasi==0)
              <form action="/dashboard/programkerja/belanja/{{$item->id}}/verifikasi" method="POST">
                @csrf
                <button class="btn btn-sm btn-success" type="submit">verifikasi</button>
              </form>
              @else
                  <i class="bi">diverifikasi</i>
              @endif
            </td>
           @endcanany
        </tr>
    @endforeach
  </table>
 <script>
    function jumlah(){
      let satuan =document.getElementById("satuan").value;
      let harga = document.getElementById("harga").value;
      let total = document.getElementById("total");
      return total.value =satuan*harga;
    }
  </script>

@endsection