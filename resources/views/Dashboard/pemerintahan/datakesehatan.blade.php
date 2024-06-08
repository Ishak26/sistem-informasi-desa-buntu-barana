@extends('Dashboard.layout.main')
@section('container')
{{-- SESSION HENDLING  --}}
  @if ($errors->has('penduduk_id'))
  <script>alert("{{$errors->first('penduduk_id')}}")</script>
  @endif
  @if (session('noted'))
      <script>alert("{{session('noted')}}")</script>
  @endif
  @if (session('update'))
      <script>alert("{{session('update')}}")</script>
  @endif

  {{-- END SESSION HENDLING --}}
    <h3 class="fw-semibold mt-3 text-center">RIWAYAT KESEHATAN MASYARAKAT</h3>
    <button id="button" class="button btn btn-sm btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambah" >
      <i class="bi bi-database-fill-add"></i>
    </button>
    {{-- form tambah --}}
    <form action="/dashboard/kesehatan/tambah" method="post">
      @csrf
      <div class="modal fade" id="tambah" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="text-center text-semibold">Menambahkan data</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
              <label for="search" class="col-form-label">Masukkan Nik yang terdaftar</label>
              <input class="form-control" type="search" name="search" id="search">
              <label for="Nama" class="col-form-label">Nama</label>
              <input class="form-control"  type="text" readonly id="Nama">
              <input class="form-control"  id="id" hidden type="text" name="penduduk_id">
              <div class="row">
                <div class="col-6">
                  <label for="Nama" class="col-form-label">Riwayat penyakit</label>
                  <input type="text" name="riwayatpenyakit" class="form-control">
                </div>
                <div class="col-6">
                  <label for="Nama" class="col-form-label">tekanan(MmHg)</label>
                  <input type="text" name="tekanan" class="form-control">
                </div>
              </div>
              <div class="row">
                <div class="col-3">
                  <label for="Nama" class="col-form-label">Tinggi Badan(cm)</label>
                  <input type="number" name="tinggi" id="tinggi" class="form-control">
                </div>
                <div class="col-3">
                  <label for="Nama" class="col-form-label">Berat Badan(kg)</label>
                  <input type="number" id="berat" name="berat" class="form-control">
                </div>
                <div class="col-3">
                  <label for="guladarah" class="col-form-label">Gula darah(mg/dL)</label>
                  <input type="number" id="guladarah" name="guladarah" class="form-control">
                </div>
                <div class="col-3">
                  <label for="golongan-darah" class="col-form-label">Golongan Darah</label>
                  <select type="text" name="golongandarah" class="form-select">
                    <option>-pilih-</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="O">O</option>
                    <option value="AB">AB</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal">tutup</button>
              <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    
    <table class="table">
      <tr class="text-center">
        <th scope="col">No</th>
        <th scope="col"">Nama</th>
      <th scope="col">Riwayat Penyakit</th>
      <th scope="col">Tekanan</th>
      <th scope="col">Tinggi</th>
      <th scope="col">Berat Badan</th>
      <th scope="col">Gula darah</th>
      <th scope="col">Golongan Darah</th>
      <th scope="col">-</th>
    </tr>
    @foreach ($data as $item)     
    <tr class="text-center">
      <td>{{$loop->iteration}}</td>
      <td class="text-start">{{$item->Penduduk->nama}}</td>
      <td>{{$item->riwayatpenyakit}}</td>
      <td>{{$item->tekanan}}</td>
      <td>{{$item->tinggi}}</td>
      <td>{{$item->berat}}</td>
      <td>{{$item->guladarah}}</td>
      <td>{{$item->golongandarah}}</td>
      <td>
        <a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{$item->id}}"> <span class="bi bi-pencil-square"></span></a>
        <form class="d-inline" action="/dashboard/kesehatan/{{$item->id}}" method="post">
        @method('delete')
        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin menhapus data {{$item->penduduk->nama}}?')"><span class="bi bi-trash-fill"></span></button>
        </form>
      </td>
    </tr>
    {{-- form edit --}}
    <form action="/dashboard/kesehatan/update/{{$item->id}}" method="post">
      @csrf
      @method('put')
      <div class="modal fade" id="modal{{$item->id}}" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="text-center text-semibold">Pembaharuan data</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
              <label for="Nama" class="col-form-label" >Nama</label>
              <input class="form-control"  id="Nama" readonly type="text" name="nama" value="{{$item->penduduk->nama}}">
              <div class="row">
                <div class="col-6">
                  <label for="Nama" class="col-form-label">Riwayat penyakit</label>
                  <input type="text" name="riwayatpenyakit" class="form-control" value="{{$item->riwayatpenyakit}}">
                </div>
                <div class="col-6">
                  <label for="Nama" class="col-form-label">tekanan(MmHg)</label>
                  <input type="text" name="tekanan" class="form-control" value="{{$item->tekanan}}">
                </div>
              </div>
              <div class="row">
                <div class="col-3">
                  <label for="Nama" class="col-form-label">Tinggi Badan(cm)</label>
                  <input type="number" name="tinggi" id="tinggi" class="form-control" value="{{$item->tinggi}}">
                </div>
                <div class="col-3">
                  <label for="Nama" class="col-form-label">Berat Badan(kg)</label>
                  <input type="number" id="berat" name="berat" class="form-control" value="{{$item->berat}}">
                </div>
                <div class="col-3">
                  <label for="guladarah" class="col-form-label">Gula darah(mg/dL)</label>
                  <input type="number" id="guladarah" name="guladarah" class="form-control" value="{{$item->guladarah}}">
                </div>
                <div class="col-3">
                  <label for="golongan-darah" class="col-form-label">Golongan Darah</label>
                  <select type="text" name="golongandarah" class="form-select">
                    <option value="A" {{($item->golongandarah==='A')?'selected':'';}}>A</option>
                    <option value="B" {{($item->golongandarah==='B')?'selected':'';}}>B</option>
                    <option value="O" {{($item->golongandarah==='O')?'selected':'';}}>O</option>
                    <option value="AB" {{($item->golongandarah==='AB')?'selected':'';}}>AB</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal">tutup</button>
              <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    @endforeach
  </table>
    <script>
      const search =document.getElementById('search');
      const nama =document.getElementById('Nama');
      const id =document.getElementById('id');

      search.addEventListener('keyup',function (){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            nama.value="";
            id.value="";
            const result=JSON.parse(this.responseText);  
            const data=result[0];
            if(data){
              nama.value=data.nama;
              id.value =data.id;
            }
          }
        };
        xhttp.open("GET", `/dashboard/dataajax/${search.value}`, true);
        xhttp.send();
      });

    </script>
@endsection