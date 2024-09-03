@extends('Dashboard.layout.main')
@section('container')
@include('Dashboard.partials.sessionhandle')
{{-- SESSION HENDLING  --}}
  @if ($errors->any())
      <script>loadModal('#tambah')</script>
  @endif
  @if (session('update'))
      <script>alert("{{session('update')}}")</script>
  @endif
  {{-- END SESSION HENDLING --}}
    <button id="button" class="button btn btn-sm btn-bluedark mb-3" type="button" data-bs-toggle="modal" data-bs-target="#tambah" >
      <i class="bi bi-database-fill-add"></i>
    </button>
    
    <table class="table-responsive w-100">
      <tr class="text-center bg-bluedark text-white">
        <td class="lh-1" scope="col">No</td>
        <td class="lh-1" scope="col">Nama</td>
        <td class="lh-1" scope="col">Riwayat Penyakit</td>
        <td class="lh-1 d-none d-lg-table-cell" scope="col">Tekanan</td>
        <td class="lh-1 d-none d-lg-table-cell" scope="col">Tinggi</td>
        <td class="lh-1 d-none d-lg-table-cell" scope="col">Berat Badan</td>
        <td class="lh-1 d-none d-lg-table-cell" scope="col">Gula darah</td>
        <td class="lh-1 d-none d-lg-table-cell" scope="col">Golongan Darah</td>
        <td class="" scope="col">-</td>
      </tr>
      @foreach ($data as $item)     
      <tr class="text-center">
        <td>{{$loop->iteration}}</td>
        <td class="text-start">{{$item->Penduduk->nama}}</td>
        <td>{{$item->riwayatpenyakit}}</td>
        <td class="d-none d-lg-table-cell">{{$item->tekanan}}</td>
        <td class="d-none d-lg-table-cell">{{$item->tinggi}}</td>
        <td class="d-none d-lg-table-cell">{{$item->berat}}</td>
        <td class="d-none d-lg-table-cell">{{$item->guladarah}}</td>
        <td class="d-none d-lg-table-cell">{{$item->golongandarah}}</td>
        <td>
          <button class="btn btn-bluedark btn-sm bi bi-info" data-bs-target="#viewDataKesehatan" data-bs-toggle="modal" onclick="viewDataKesehatan({{$item}})"></button>
          <button onclick="editKesehatan({{$item}})" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editKesehatan"> <span class="bi bi-pencil-square"></span></button>
          <form class="d-inline" action="/dashboard/kesehatan/{{$item->id}}" method="post">
            @csrf
          @method('delete')
          <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin menhapus data {{$item->penduduk->nama}}?')"><span class="bi bi-trash-fill"></span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>

     {{-- form tambah --}}
    <form action="/dashboard/kesehatan/tambah" method="post">
      @csrf
      <div class="modal fade" id="tambah" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-bluedark ">
              <h4 class="text-center text-semibold text-light">Tambah Data Kesehatan</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
              <label for="search" class="col-form-label">Masukkan Nik yang terdaftar</label>
              <input class="form-control" type="search" name="search" id="search" required>
                @error('penduduk_id') 
                  <div class="invalid-feedbacks">
                    {{$message}}
                  </div>            
                @enderror
              <label for="Nama" class="col-form-label">Nama</label>
              <input class="form-control"  type="text" readonly id="Nama">
              <input class="form-control"  id="id" hidden type="text" name="penduduk_id">
              <div class="row">
                <div class="col-6">
                  <label for="Nama" class="col-form-label">Riwayat penyakit</label>
                  <input type="text" name="riwayatpenyakit" value="{{old('riwayatpenyakit')}}" class="form-control @error('riwayatpenyakit') is-invalid @enderror">
                  @error('riwayatpenyakit')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <div class="col-6">
                  <label for="Nama" class="col-form-label">tekanan(MmHg)</label>
                  <input type="text" name="tekanan" value="{{old('tekanan')}}" class="form-control @error('tekanan') is-invalid @enderror">
                  @error('tekanan') 
                    <div class="invalid-feedbacks">
                      {{$message}}
                    </div>            
                 @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-3">
                  <label for="Nama" class="col-form-label">Tinggi Badan(cm)</label>
                  <input type="number" name="tinggi" value="{{old('tinggi')}}" id="tinggi" class="form-control @error('tinggi') is-invalid @enderror">
                  @error('tinggi')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <div class="col-3">
                  <label for="Nama" class="col-form-label">Berat Badan(kg)</label>
                  <input type="number" id="berat" name="berat" value="{{old('berat')}}" class="form-control @error('berat') is-invalid @enderror">
                  @error('berat') 
                  <div class="invalid-feedbacks">
                    {{$message}}
                  </div>            
                @enderror
                </div>
                <div class="col-3">
                  <label for="guladarah" class="col-form-label">Gula darah(mg/dL)</label>
                  <input type="number" id="guladarah" name="guladarah" value="{{old('guladarah')}}" class="form-control @error('guladarah') is-invalid @enderror">
                  @error('guladarah') 
                  <div class="invalid-feedbacks">
                    {{$message}}
                  </div>            
                @enderror
                </div>
                <div class="col-3">
                  <label for="golongan-darah" class="col-form-label">Golongan Darah</label>
                  <select type="text" name="golongandarah" class="form-select @error('golongandarah') is-invalid @enderror">
                    <option {{(old('golongandarah')== 'A')?'selected':''}}>A</option>
                    <option {{(old('golongandarah')== 'B')?'selected':''}}>B</option>
                    <option {{(old('golongandarah')== 'O')?'selected':''}}>O</option>
                    <option {{(old('golongandarah')== 'AB')?'selected':''}}>AB</option>
                  </select>
                  @error('golongandarah') 
                  <div class="invalid-feedbacks">
                    {{$message}}
                  </div>            
                @enderror
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal">tutup</button>
              <button class="btn btn-sm btn-bluedark" type="submit">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    {{-- form edit --}}   
      <div class="modal fade" id="editKesehatan">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="text-center text-semibold">Pembaharuan data</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <form id="formEdit" action="" method="post">
              @csrf
              @method('put')
              <div class="modal-body">
                <label for="Nama" class="col-form-label" >Nama</label>
                <input class="form-control"  id="Nama" readonly type="text">
                <div class="row">
                  <div class="col-6">
                    <label class="col-form-label">Riwayat penyakit</label>
                    <input type="text" name="riwayatpenyakit" id="riwayatpenyakit" class="form-control" >
                    @error('riwayatpenyakit')
                      <div class="invalid-fedback">
                        {{$message}}
                      </div>
                  @enderror
                  </div>
                  <div class="col-6">
                    <label for="Nama" class="col-form-label">tekanan(MmHg)</label>
                    <input type="text" name="tekanan" id="tekanan" class="form-control">
                    @error('tekanan')
                      <div class="invalid-fedback">
                        {{$message}}
                      </div>
                  @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <label for="Nama" class="col-form-label">Tinggi Badan(cm)</label>
                    <input type="number" name="tinggi" id="tinggi" class="form-control" >
                    @error('tinggi')
                      <div class="invalid-fedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="col-3">
                    <label for="Nama" class="col-form-label">Berat Badan(kg)</label>
                    <input type="number" id="berat" name="berat"  class="form-control">
                    @error('berat')
                      <div class="invalid-fedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="col-3">
                    <label for="guladarah" class="col-form-label">Gula darah(mg/dL)</label>
                    <input type="number" id="guladarah"  name="guladarah" class="form-control">
                    @error('guladarah')
                      <div class="invalid-fedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="col-3">
                    <label for="golongan-darah" class="col-form-label">Golongan Darah</label>
                    <select type="text" name="golongandarah" class="form-select" id="golongandarah">
                      <option >A</option>
                      <option>B</option>
                      <option>O</option>
                      <option>AB</option>
                    </select>
                    @error('golongandarah')
                      <div class="invalid-fedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>
            </form>
            <div class="modal-footer">
              <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal">tutup</button>
              <button class="btn btn-sm btn-bluedark" type="submit">Simpan</button>
            </div>
          </div>
        </div>
      </div>

      {{-- view data --}}
      <div class="modal fade" id="viewDataKesehatan" z-index="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-bluedark">
              <h4 class="fs-4 text-white">Detail Data</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-4">Nama</div>
                <div class="col-8" id="viewNama"></div>
              </div>
              <div class="row">
                <div class="col-4">Riwayat Penyakir</div>
                <div class="col-8" id="viewRiwayatPenyakit"></div>
              </div>
              <div class="row">
                <div class="col-4">Tekanan </div>
                <div class="col-8" id="viewTekanan"></div>
              </div>
              <div class="row">
                <div class="col-4">Tinggi Badan</div>
                <div class="col-8" id="viewTinggi"></div>
              </div>
              <div class="row">
                <div class="col-4">Berat Badan</div>
                <div class="col-8" id="viewBerat"></div>
              </div>
              <div class="row">
                <div class="col-4"> Gula Darah <span class="text-end">:</span></div>
                <div class="col-8" id="viewGuladarah"></div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
    <script>
      function viewDataKesehatan(data){
        $('#viewDataKesehatan #viewNama').html(`: ${data.penduduk.nama}`)
        $('#viewDataKesehatan #viewRiwayatPenyakit').html(`: ${data.riwayatpenyakit}`)
        $('#viewDataKesehatan #viewTekanan').html(`: ${data.tekanan} MmHg`)
        $('#viewDataKesehatan #viewTinggi').html(`: ${data.tinggi} cm`)
        $('#viewDataKesehatan #viewBerat').html(`: ${data.berat} Kg`)
        $('#viewDataKesehatan #viewGuladarah').html(`: ${data.guladarah} mg/dL`)
        $('#viewDataKesehatan #viewGolonganDarah').html(`: ${data.golongandarah}`)
      }

      function editKesehatan(data){
        $('#formEdit #Nama').val(data.penduduk.nama)
        $('#formEdit #riwayatpenyakit').val(data.riwayatpenyakit)
        $('#formEdit #tekanan').val(data.tekanan)
        $('#formEdit #tinggi').val(data.tinggi)
        $('#formEdit #berat').val(data.berat)
        $('#formEdit #guladarah').val(data.guladarah)
        $('#formEdit #golongandarah').children().filter(function(){
         return $(this).val() == data.golongandarah
        }).prop('selected','selected')
       
      }

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
        xhttp.open("GET",`/dashboard/dataajax/${search.value}`, true);
        xhttp.send();
      });
    </script>
@endsection