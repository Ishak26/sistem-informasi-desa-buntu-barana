@extends('Dashboard.layout.main')
@section('container')
  @if(session('suratfail'))
      <script>alert('format surat tidak ada!!')</script>
  @endif
    <table class="table-responsive w-100 bg-bluedark text-white" >
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jenis</th>
        <th>Tujuan</th>
        <th>status</th>
        <th>Keterangan</th>
      </tr>
      @foreach ($dataSurat as $item)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$item->penduduk->nama}}</td>
        <td>{{$item->jenis}}</td>
        {{-- <td>{{$item->keperluan}}</td> --}}
        <td> {{$item->keperluan}}</td>
        {{-- @dd($item->verifikasi); --}}
        <td class="text-{{($item->verifikasi == 0 )?'danger':'success'}}" >{{($item->verifikasi == 0)?"Belum diverifikasi":"Terverifikasi"}}</td>
        <td class="text-center">
          {{-- @dd(gettype($item->verifikasi)) --}}
          {{-- @dd($item->verifikasi) --}}
          @if($item->verifikasi == 0)
            <a href="/dashboard/surat/{{$item->id}}/verifikasi" onclick="confirm('Konfirmasi Pengajuan surat ?')" class="btn btn-sm fs-6 btn-bluedark text-success">
              <i class="bi bi-patch-check-fill"></i> verifikasi
            </a>
          @else
            <a class="btn btn-sm btn-bluedark" href="{{asset('/storage/file-surat/'.$item->filesurat)}}"><i class="bi bi-filetype-pdf me-1 align-middle"></i>Cetak</a>
          @endif
        </td>
      </tr>
      @endforeach
    </table>
@endsection