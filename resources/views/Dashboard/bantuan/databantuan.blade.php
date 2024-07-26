@extends('Dashboard.layout.main')
@section('container')
@if(session('sukses'))
    <script>
        alert("{{ session('sukses') }}");
    </script>
@endif

<div class="container mt-3">
    <a href="" class="btn btn-sm btn-bluedark" data-bs-toggle="modal" data-bs-target="#tambahbantuan">
        <i class="bi bi-database-fill-add"></i></a>
    <table class="table ">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">bantuan</th>
                <th scope="col">jenis</th>
                <th scope="col">sumber</th>
                <th scope="col">-</th>
            </tr>
        </thead>
            </tr>
        </thead>
        <tbody>
            @foreach ($bantuan as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->bantuan }}</td>
                <td>{{ $item->jenis }}</td>
                <td>{{ $item->sumber }}</td>
                <td class="d-flex">
                    <a class="btn btn-sm btn-bluedark" href="/dashboard/databantuan/{{$item->id}}/penerima"><i class="bi bi-info"></i></a>
                </td>
            </tr>
        @endforeach  
        </tbody>
    </table>
    {{-- modal tambah data bantuan --}}
   <form action="/dashboard/databantuan" method="post">
    @csrf
    <div class="modal fade" aria-hidden="true" id="tambahbantuan" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-bluedark">
                    <div class="modal-title">
                        <h4 class="text-uppercase fw-bold text-light">Tambah Data Bantuan</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="d-flex-flex-column">
                        <div class="col">
                            <label for="" class="col-form-label">Keterangan bantuan</label>
                            <input type="text" name="bantuan" class="form-control @error('bantuan') is-invalid @enderror">
                        </div>
                        <div class="col">
                            <label for="" class="col-form-label">jenis Bantuan</label>
                            <select name="jenis" type="text" id="" class="form-select @error('jenis') is-invalid  @enderror">
                                <option selected>--pilih--</option>
                                <option value="UANG TUNAI">UANG TUNAI</option>
                                <option value="BARANG">BARANG</option>
                                <option value="PANGAN">PANGAN</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="col-form-label">Sumber bantuan</label>
                            <input type="text" name="sumber" class="form-control @error('sumber') is-invalid  @enderror">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-bluedark"
                        data-bs-dismiss="modal">Simpan</button>
                </div>
            </div>
        </div>
    </div>
   </form>
    {{-- akhir modal tambah data bantuan --}}

</div>
{{-- <div class="d-flex justify-content-center">
    {{ $bantuan->links() }}
</div> --}}
@endsection