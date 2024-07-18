@extends('Dashboard.layout.main')

@section('container')
    @php
        use Illuminate\Support\Str;
    @endphp
    @if (session('edit'))
        <script>alert('{{session('edit')}}');</script>
    @endif
     @if (session('hapus'))
       <script>alert('{{session('hapus')}}');</script>
    @endif
    <div class="container">
        <h2 class="mt-2 text-uppercase text-bluelight text-center fw-bold encode-sans-condensed-bold">Data berita</h2>
           <a href="/formberita" class="btn btn-sm  btn-bluedark float-start"><i class="bi bi-database-fill-add"></i></a>
        <form action="/databerita" method="get" class=" d-flex">
            <div class="input-group input-group-sm mb-3 w-50 m-auto ">
                <button class="btn btn-sm  btn-bluedark" type="submit">Cari</button>
                <input type="text" class="form-control" placeholder="Cari judul berita" name="filter">
            </div>
        </form>
        <div class="table-responsive shadow p-2">
            <table class="table table-striped table-sm">
                <thead>
                    <tr class=" text-center">
                        <th scope="col">No</th>
                        <th scope="col">judul</th>
                        <th scope="col">gambar</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->gambar }}</td>
                            <td>{{ str::limit($item->deskripsi, 165, ' . . . ') }}</td>
                            <td class="p-3 d-flex flex-rows">
                                <a href="/berita/{{ $item->slug }}" target="_blank">
                                    <button class="btn btn-primary btn-sm me-1" >
                                        <span class="bi bi-info"></span>
                                    </button>
                                </a>
                                <a href="/databerita/{{ $item->slug }}/updatedataberita">
                                    <button class="btn btn-warning btn-sm">
                                        <span class="bi bi-pencil-square"></span>
                                    </button>
                                </a>
                                <form class="d-inline" action="/databerita/{{ $item->slug }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button  class=" ms-1 btn btn-danger  btn-sm" type="submit">
                                        <span class="bi bi-trash"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection
