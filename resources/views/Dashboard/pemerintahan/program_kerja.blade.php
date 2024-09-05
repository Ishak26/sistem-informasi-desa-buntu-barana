@extends('Dashboard.layout.main')
@section('container')
@include('Dashboard.partials.sessionhandle')
    @if(session('status'))
      <script>alert("{{session()->pull('status')}}");</script>  
    @endif
    @if ($errors->any())
        <script>loadModal('#createdata')</script>
    @endif
    <button class="btn btn-sm btn-bluedark m-3 bi bi-database-fill-add " data-bs-toggle='modal' data-bs-target='#createdata' >
    </button>   
    <table class="table-responsive w-100">
      <tr class="text-center text-white bg-bluedark">
        <td rowspan="2">No</td>
        <td rowspan="2">Program Kerja</td>
        <td colspan="2" >Verifikasi</td>
        <td rowspan="2">Proposal</td>
        <td rowspan="2">-</td>
      </tr>
      <tr class="text-center bg-bluedark text-white">
        <td >Sekdes</td>
        <td>Kades</td>
      </tr>
      @foreach ($data as $item)
          <tr class="fw-light lh-sm">
            <td>{{$loop->iteration}}</td>
            <td class="lh-1">{{$item->proker}}</td>
            <td class="text-center">
              <div class="{{($item->Verifikasi_sekertaris==0)?'bi-primary bi-x-square-fill':'bi bi-check-square-fill'}}"></div>
            </td>
            <td class="text-center">
              <div class="{{($item->Verifikasi_KepalaDesa==0)?'bi-primary bi-x-square-fill':'bi bi-check-square-fill'}}"></div></td>
            <td>
              <a href="{{asset('storage/'.$item->proposal)}}" class="btn btn-sm btn-outline-danger">
                 <i class="bi bi-filetype-pdf"></i>
              </a>
            </td>
            <td class="d-flex gap-1">
              <button class="btn btn-sm btn-primary"><i class="bi bi-eye-fill"></i></button>
              <button class="btn btn-sm btn-bluelight" onclick="editData({{$item}})" data-bs-target="#editdata" data-bs-toggle="modal"><i class="bi bi-pencil-square"></i></button>
              <form action="/dashboard/programkerja/hapus/{{$item->id}}" method="post">
              @csrf
              @method('delete')
              <button class="btn btn-sm btn-danger" onclick="confirmedHapus(event)" type="submit">
                <i class="bi bi-trash3-fill text-dark"></i>
              </button>
              </form>

              @if ($item->Verifikasi_KepalaDesa && $item->Verifikasi_sekertaris==1)
                <a href="/dashboard/programkerja/belanja/{{$item->id}}" class="btn btn-sm btn-warning"><i class="bi bi-cart-plus-fill"></i></a>
              @else
                @canany(['sekertaris','kepaladesa'])
                  <button class="btn btn-sm btn-success ms-1" data-bs-toggle="modal" data-bs-target="#verifikasi{{$item->id}}"><i class="bi bi-patch-check"></i></button>
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
                @endcanany
              @endif                
            </td>
          </tr>
          @endforeach
    </table>



{{-- Form kontrol tambah data--}}
    <form action="/dashboard/programkerja/ajuanproker" method="post" enctype="multipart/form-data">
      @csrf
      <div class="modal" id='createdata' tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-bluedark">
              <h4 class="text-bluelight">Pengajuan Program Kerja</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row mb-2">
                <div class="col-md-4"><label for="proker" class="col-form-label">Program Kerja</label></div>
                <div class="col-md-8">
                  <textarea class="form-control @error('proker') is-invalid @enderror" style="height: 100px" name="proker" id="proker" placeholder="Program kerja yang di rencanakan">{{old('proker')}}</textarea>
                  @error('proker')
                      <div class="invalid-feedback">
                        {{$message}}  
                      </div>
                  @enderror
                </div>
              </div>
              <input type="hidden" value="{{auth()->user()->bidang}}" name="bidang" id="bidang">
              <div class="row mb-2">
                <div class="col-md-4"><label for="" class="col-form-label">Anggaran</label></div>
                <div class="col-md-8">
                  <input type="number" name="anggaran" id="anggaran"  class="form-control  @error('anggaran') is-invalid @enderror" required placeholder="Anggaran yang Dibutuhkan" value="{{old('anggaran')}}">
                  @error('anggaran')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-4"><label for="" class="col-form-label">Terbilang</label></div>
                <div class="col-md-8">
                  <input type="text" name="terbilang" id="terbilang"  class="form-control  @error('terbilang') is-invalid @enderror" required placeholder="Terbilang sebanyak!!" value="{{old('terbilang')}}" >
                  @error('terbilang')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-4"><label for="" class="col-form-label">Sumber Dana</label></div>
                <div class="col-md-8">
                  <select name="Sumber_dana" class="form-select  @error('Sumber_dana') is-invalid @enderror" id="Sumber_dana">
                    <option value="">--Pilih--</option>
                    <option value="DD" {{(old('Sumber_dana')=='DD')?'selected':''}}>Dana Desa</option>
                    <option value="DBH" {{(old('Sumber_dana')=='DBH')?'selected':''}}>Bagi Hasil Pajak</option>
                    <option value="ADD" {{(old('Sumber_dana')=='ADD')?'selected':''}}>Alokasi Dana Desa</option>
                    <option value="LAINNYA" {{(old('Sumber_dana')=='LAINNYA')?'selected':''}}>Lain-Nya..</option>
                  </select>
                  @error('Sumber_dana')
                     <div class="invalid-feedback">
                      {{$message}}
                     </div>
                  @enderror
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-4"><label for="Tanggal_Pengerjaan" class="col-form-label">Waktu pengerjaan</label></div>
                <div class="col-md-8">
                  <input type="date" name="Tanggal_Pengerjaan" value="{{old('Tanggal_Pengerjaan')}}" id="Tanggal_Pengerjaan" class="form-control  @error('Tanggal_Pengerjaan') is-invalid @enderror">
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-4"><label for="Proposal" class="col-form-label">Proposal</label></div>
                <div class="col-md-8">
                  <input type="file" class="form-control  @error('proposal') is-invalid @enderror" name="proposal" id="proposal">
                  @error('proposal')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
              <button class="btn btn-bluedark" type="submit">simpan</button>
            </div>
          </div>
        </div>
      </div>
    </form>
{{-- akhir Form kontrol tambah data--}}
{{-- Form kontrol edit data--}}
<form id="form" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="modal" id='editdata' tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="text-center d-block">Ubah Data Program Kerja</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row mb-2">
            <div class="col-md-4"><label for="proker" class="col-form-label">Program Kerja</label></div>
            <div class="col-md-8"><textarea class="form-control @error('proker') is-invalid @enderror" style="height: 100px" name="proker" id="proker" placeholder="Program kerja yang di rencanakan"></textarea>
              @error('proker')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
            </div>
          </div>
          <input type="text" value="{{auth()->user()->bidang}}" name="bidang" id="bidang" hidden>
          <div class="row mb-2">
            <div class="col-md-4"><label for="" class="col-form-label">Anggaran</label></div>
            <div class="col-md-8">
              <input type="number" name="anggaran" id="anggaran"  class="form-control @error('anggaran') is-invalid @enderror"" placeholder="Anggaran yang Dibutuhkan">
              @error('anggaran')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4"><label for="" class="col-form-label">Terbilang</label></div>
            <div class="col-md-8"><input type="text" name="terbilang" id="terbilang"  class="form-control @error('terbilang') is-invalid @enderror" placeholder="Terbilang sebanyak!!">
              @error('terbilang')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4"><label for="" class="col-form-label">Sumber Dana</label></div>
            <div class="col-md-8">
              <select name="Sumber_dana" class="form-select @error('Sumber_dana') is-invalid @enderror" id="Sumber_dana">
                <option>--Pilih--</option>
                <option value="DD">Dana Desa</option>
                <option value="DBH">Bagi Hasil Pajak</option>
                <option value="ADD">Alokasi Dana Desa</option>
                <option value="LAINNYA">Lain-Nya..</option>
              </select>
              @error('Sumber_dana')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4"><label for="Tanggal_Pengerjaan" class="col-form-label">Waktu pengerjaan</label></div>
            <div class="col-md-8"><input type="date" name="Tanggal_Pengerjaan" id="Tanggal_Pengerjaan" class="form-control @error('Tanggal_Pengerjaan') is-invalid @enderror">
              @error('Tanggal_Pengerjaan')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4"><label for="Proposal" class="col-form-label">Proposal</label></div>
            <div class="col-md-8">
              <input type="file" class="form-control @error('proposal') is-invalid @enderror" onchange="updateFile()" name="proposal" id="proposal">
              @error('proposal')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
              @enderror
              <a id="fileProposal" class="btn btn-sm btn-outline-danger p-3 m-auto d-block">
                <i class="bi bi-filetype-pdf"></i>
             </a>
            </div>
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
{{-- akhir Form kontrol edit data--}}
<script>
  function editData(datas){
    $('#form').attr('action','/dashboard/programkerja/edit/'+datas.id)
    $('#form #proker').val(datas.proker)
    $('#form #anggaran').val(datas.anggaran)
    $('#form #terbilang').val(datas.terbilang)
    $('#form #Sumberdana').val(datas.Sumber_dana)
    $('#form #Tanggal_Pengerjaan').val(datas.Tanggal_Pengerjaan)
    $('#form #Sumber_dana').children().filter(function(){
      return $(this).val() === datas.Sumber_dana
    }).attr('selected','selected')
    $('#form #fileProposal').attr('href',`asset('storage/${datas.proposal}')`)
    $('#form #proposal').val(datas.proposal)
  }
  function updateFile(){
    $('#form #fileProposal').remove()
  }
</script>
@endsection