@extends('layout.main')
@section('container')
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          @foreach ($datas as $item)
          <div class="card" style="width: 16rem; height:16rem">
            <img src="{{asset('./storage/'.$item->gambar)}}" class="w-100 h-50 object-fit" alt="...">
            <div class="card-body">
              <p class="p-0 m-0 fw-semibold">{{$item->perihal}}</p>
              <ul class="card-text list-unstyled">
                <li><i class="bi bi-calendar-event me-3"></i>{{date('D,d-M-Y',strtotime($item->tanggal))}}</li>
                <li><i class="bi bi-clock-fill me-3"></i>{{date('h:i A',strtotime($item->jam))}}</li>
                <li><i class="bi bi-geo-fill me-3"></i>{{$item->tempat}}</li>
              </ul>
            </div>
          </div>
          @endforeach
        </div>
        <div class="col-sm-4">
          <p class="fs-5 fw-semibold">KEGIATAN TERAKHIR :</p>
          <div class="d-flex flex-column">
            @foreach ($latest as $item)
            <div class="d-flex gap-2 w-100" style="height:100px">
              <img src="{{asset('./storage/'.$item->gambar)}}" class="w-50 h-100 rounded object-fit" alt="...">
              <div class="">
                <h5 class="">{{$item->perihal}}</h5>
                <ul class="list-unstyled">
                  <li><i class="bi bi-calendar-event me-3"></i>{{date('D,d-M-Y',strtotime($item->tanggal))}}</li>
                  <li><i class="bi bi-clock-fill me-3"></i>{{date('h:i A',strtotime($item->jam))}}</li>
                  <li><i class="bi bi-geo-fill me-3"></i>{{$item->tempat}}</li>
                </ul>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
@endsection