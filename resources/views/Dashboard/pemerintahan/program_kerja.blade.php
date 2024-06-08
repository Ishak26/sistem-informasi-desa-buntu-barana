@extends('Dashboard.layout.main')
@section('container')
    @if(session('status'))
      <script>alert("{{session('status')}}");</script>  
    @endif
    <h3 class="text-center fw-semibold mt-3">Program Kerja {{(auth()->user()->bidang==null)?'':auth()->user()->bidang}}</h3>
    <button class="btn btn-sm btn-primary m-3 bi bi-clipboard-plus-fill " data-bs-toggle='modal' data-bs-target='#createdata' >
    </button>
{{-- Form kontrol --}}
    <form action="/dashboard/programkerja/ajuanproker" method="post" enctype="multipart/form-data">
      @csrf
      <div class="modal" id='createdata' tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-center d-block">Pengajuan Program Kerja</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row mb-2">
                <div class="col-md-4"><label for="proker" class="col-form-label">Program Kerja</label></div>
                <div class="col-md-8"><textarea class="form-control"style="height: 100px" name="proker" placeholder="Program kerja yang di rencanakan" required></textarea></div>
              </div>
              <input type="text" value="{{auth()->user()->bidang}}" name="bidang" hidden>
              <div class="row mb-2">
                <div class="col-md-4"><label for="" class="col-form-label">Anggaran</label></div>
                <div class="col-md-8"><input type="number" name="anggaran"  class="form-control" required placeholder="Anggaran yang Dibutuhkan"></div>
              </div>
              <div class="row mb-2">
                <div class="col-md-4"><label for="" class="col-form-label">Terbilang</label></div>
                <div class="col-md-8"><input type="text" name="terbilang"  class="form-control" required placeholder="Terbilang sebanyak!!"></div>
              </div>
              <div class="row mb-2">
                <div class="col-md-4"><label for="Tanggal_Pengerjaan" class="col-form-label">Waktu pengerjaan</label></div>
                <div class="col-md-8"><input type="date" name="Tanggal_Pengerjaan" class="form-control" required></div>
              </div>
              <div class="row mb-2">
                <div class="col-md-4"><label for="Proposal" class="col-form-label">Proposal</label></div>
                <div class="col-md-8"><input type="file" class="form-control" name="proposal" required> </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button class="btn btn-primary" type="submit">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <table class="table">
      <tr>
        <th>No</th>
        <th>Program Kerja</th>
        <th>Anggaran</th>
        <th>Terbilang</th>
        <th>Sumber dana</th>
        <th>Verifikasi sekertaris</th>
        <th>Verifikasi Kepala Desa</th>
        <th>Proposal</th>
        <th></th>
      </tr>
      @foreach ($data as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->proker}}</td>
            <td>{{$item->anggaran}}</td>
            <td>{{$item->terbilang}}</td>
            <td>{{$item->Sumber_dana}}</td>
            <td class="text-center"><div class="{{($item->Verifikasi_sekertaris==0)?'bi-primary bi-x-square-fill':'bi bi-check-square-fill'}}"></div>
            </td>
            <td class="text-center"><div class="{{($item->Verifikasi_KeplaDesa==0)?'bi-primary bi-x-square-fill':'bi bi-check-square-fill'}}"></div></td>
            <td><a href="{{asset('storage/'.$item->proposal)}}" class="btn btn-outline-danger"> <div class="bi bi-filetype-pdf"></div></a></td>
            <td class="d-flex">
              <button class="btn btn-sm btn-primary"><i class="bi bi-eye-fill"></i></button>
              <a href="/dashboard/programkerja/belanja/{{$item->id}}" class="btn btn-sm btn-warning ms-1"><i class="bi bi-cart-plus-fill"></i></a>
              @canany(['sekertaris','kepaladesa'])
              <button class="btn btn-sm btn-success ms-1" data-bs-toggle="modal" data-bs-target="#verifikasi{{$item->id}}"><i class="bi bi-patch-check"></i></button>
              @endcanany
              {{-- verifikasi modal --}}
              <div class="modal fade" id="verifikasi{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Belanja</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="/dashboard/programkerja/verifikasi/{{$item->id}}" method="POST">
                        @method('PUT')
                        @csrf
                       @can('sekertaris')
                       <div class="mb-3">
                        <label class="col-form-label">Verifikasi Sekertaris</label>
                        <select class="form-select" name="Verifikasi_sekertaris">
                          <option value="0" >Tidak setuju</option>
                          <option value="1">Setuju</option>
                        </select>
                      </div>
                       @endcan
                       @can('kepaladesa')
                       <div class="mb-3">
                         <label class="col-form-label">Verifikasi Kepala</label>
                         <select class="form-select" name="Verifikasi_KepalaDesa" >
                           <option value="0" >Tidak Setuju</option>
                           <option value="1">Setuju</option>
                         </select>
                       </div>
                       @endcan
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Verifikasi</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </table>

        @endsection