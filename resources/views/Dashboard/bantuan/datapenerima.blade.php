@extends('Dashboard.layout.main')
@section('container')
@include('Dashboard.partials.sessionhandle')
@if(session('berhasil'))
  <script>alert({{session('berhasil')}})</script>
@endif
    <div class="container">
      <h3 class="fw-bold text-center">Penerima bantuan dari {{$bantuan->bantuan}}</h3>
      <table class="border-none mb-3">
        <tr>
          <td width="100">Bantuan</td>
          <td>: {{$bantuan->bantuan}}</td>
        </tr>
        <tr>
          <td>Jenis Bantuan</td>
          <td>: {{$bantuan->jenis}}</td>
        </tr>
        <tr>
          <td>Sumber</td>
          <td>: {{$bantuan->sumber}}</td>
        </tr>
      </table>
      <div class="d-flex flex-rows gap-2">
        <button class="btn btn-bluedark" data-bs-toggle="modal" data-bs-target="#addPenerimas" >
          <i class="bi bi-database-fill-add align-top me-1"></i>
        </button>  
        <button class="btn btn-sm btn-bluedark" data-bs-toggle="modal" data-bs-target="#filterModal"><i class="bi bi-funnel-fill"></i></button>
      </div>
      <table class="table">
        <tr>
          <th scope="col">no</th>
          <th scope="col">nama</th>
          <th scope="col">nik</th>
          <th scope="col">status</th>
          <th scope="col">bukti</th>
          <th scope="col">-</th>
        </tr>
        @foreach ($penerima as $item)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$item->nama}}</td>
          <td>{{$item->nik}}</td>
          <td>{{($item->pivot->status===0)?'belum diterima':'diterima'}}</td>
          <td>
            <img src="{{asset('storage/'.$item->pivot->buktiterima)}}" width="50" height="50" alt="">
          </td>
          <td>
            <button type="button" class="btn btn-sm btn-bluelight" onclick="updatePenerimaBantuan({{$item}})" data-bs-toggle="modal" data-bs-target="#updatePenerima" >
              <i class="bi bi-pencil-square"></i>
            </button>
          </td>
        </tr>
        @endforeach
      </table>
    </div>

    {{-- modal filter --}}
    <div class="modal fade" id="filterModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title">
              <h4>Filter penerima</h4>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
          </div>
          <div class="modal-body">
            <form action="/dashboard/bantuan/penerima/filterpenduduk" method="post">
              @csrf
                <div class="d-flex flex-columns">
                  <div class="col">
                    <div class="row">
                      <label class="col-3" >Pendidikan  :</label>
                      <div class="col-9">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" name="pendidikan[]" value="Tidak sekolah">
                          <label class="form-check-label">Tidak sekolah</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="sma" name="pendidikan[]" value="SMA">
                          <label class="form-check-label" for="sma">SMA</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="s1" name="pendidikan[]" value="S1">
                          <label class="form-check-label" for="s1">S1</label>
                        </div>
                      </div>
                    </div>
      
                    <div class="row">
                      <label class="col-3" for="">Status  :</label>
                      <div class="col-9">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="kawin" name="status[]" value="kawin">
                          <label class="form-check-label" for="kawin">Kawin</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="Belum Kawin" name="status[]" value="Belum Kawin">
                          <label class="form-check-label" for="Belum Kawin">Belum Kawin</label>
                        </div>
                      </div>
                    </div>
      
                    <div class="row">
                      <label class="col-3" for="">jenis kelamin  :</label>
                      <div class="col-9">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="laki-laki" name="jk[]" value="laki-laki">
                          <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="perempuan" name="jk[]" value="perempuan">
                          <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>
                      </div>
                    </div>
      
                    <div class="row">
                      <label class="col-3" for="">Pekerjaan  :</label>
                      <div class="col-9">
                        <div class="form-check form-check-inline">
                          <input type="hidden" id="bantuan_id" name="bantuan_id" value="{{$bantuan->id}}">
                          <input class="form-check-input" type="checkbox" id="petani" name="pekerjaan[]" value="petani">
                          <label class="form-check-label" for="Petani">Petani</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="PNS" name="pekerjaan[]" value="pns">
                          <label class="form-check-label" for="PNS">PNS</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="Pengusaha" name="pekerjaan[]" value="pengusaha">
                          <label class="form-check-label" for="Pengusaha">Pengusaha</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="Peternak" name="pekerjaan[]" value="peternak">
                          <label class="form-check-label" for="Peternak">Peternak</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="Pedagang" name="pekerjaan[]" value="pedagang">
                          <label class="form-check-label" for="Pedagang">Pedagang</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="Belum bekerja" name="pekerjaan[]" value="Tidakbekerja
                          ">
                          <label class="form-check-label" for="Belum bekerja">Belum bekerja</label>
                        </div>
                      </div>
                    </div>
      
                    <div class="row">
                      <label class="col-3" for="">Penghasilan kurang dari  :</label>
                      <div class="col-9">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="500000" name="Penghasilan" value="500000">
                          <label class="form-check-label" for="500000">Rp 500.000,.</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="1000000" name="Penghasilan" value="1000000">
                          <label class="form-check-label" for="1000000">Rp 1.000.000,.</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="1500000" name="Penghasilan" value="1500000">
                          <label class="form-check-label" for="1500000">Rp 1.500.000,.</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="2000000" name="Penghasilan" value="2000000">
                          <label class="form-check-label" for="2000000">Rp 2.000.000,.</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="2500000" name="Penghasilan" value="2500000">
                          <label class="form-check-label" for="2500000">Rp 2.500.000,.</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="3000000" name="Penghasilan[]" value="3000000">
                          <label class="form-check-label" for="3000000">Rp 3.000.000,.</label>
                        </div>
                      </div>
                    </div>
      
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                <button class="btn btn-bluedark" type="submit" >Filter</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    {{-- modal add data --}}
      <div class="modal fade" id="addPenerimas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form action="/dashboard/bantuan/penerima/tambah" method="post">
            @csrf
            @method('post')
            <div class="modal-content">
              <div class="modal-header">
                <div class="modal-title">
                  <h4>Tambah Penerima</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
              </div>
              <div class="modal-body">
                <div class="row">
                  <input type="hidden" name="bantuan_id" value="{{$bantuan->id}}">
                  <input type="hidden" name="penduduk_id" id="penduduk_id">
                  <div class="col-6">
                    <label class="col-form-label" placholder="Masukkan Nik yang belum terdaftar !!">Nik</label>
                    <input type="text" id="nikPenduduk"  class="form-control">
                  </div>
                  <div class="col-6">
                    <label for="" class="col-form-label" >Nama</label>
                    <input type="text" id="namaPenduduk" readonly class="form-control">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger">Tutup</button>
                <button type="submit" class="btn btn-bluedark">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    {{-- update penerima --}}
    <div class="modal fade" id="updatePenerima" tabindex="-1">
      <div class="modal-dialog">
       <form id="FormTambahPenerima" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="modal-content">
          <div class="modal-header bg-bluedark">
            <div class="modal-title">
              <h4 class="fs-4 fw-bold text-white">Update Data Penerima</h4>
            </div>
            <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <label class="col-form-label">status terima</label>
            <select class="form-select @error('status') is-invalid @enderror" name="status">
              <option value="0">Belum diterima</option>
              <option value="1">Terima</option>
            </select>
            @error('status')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
            <label >Bukti Terima</label>
            <img id="buktiPenerimaBantuan" alt="">
            <input type="file" class="form-control fileBuktiTerima @error('buktiterima') is-invalid @enderror" onchange="previewImage('buktiPenerimaBantuan','.fileBuktiTerima')" name="buktiterima" >
            @error('buktiterima')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
          </div>
          <div class="modal-footer">
            <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Tutup</button>
            <button type="submit" class="btn btn-bluedark">Simpan</button>
          </div>
        </div>
       </form>
      </div>
    </div>
@endsection