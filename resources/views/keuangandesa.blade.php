@extends('layout.main')
@section('container')
@php
    $tkasipemerintahan=0;
    $tpendapatan=0;
    $tkasikesra =0;
    $tkasikemasyarakatan=0;
    $tsekertariat=0;
@endphp
{{-- <img class="position-fixed top-0 w-100 h-100 object-fit" src="/img/bgkeuangan.jpg" alt=""> --}}
<img class="position-fixed top-0 w-100 h-100 object-fit bg-bluelight" alt="">
  <div class="container position-relative text-white start-0 bg-bluedark bg-opacity-75 shadow rounded">
    <div class="row pt-2 justify-content-center align-items-center">
      <div class="col-sm-3 text-center text-sm-end" >
        <img class="obcject-fit w-25 h-25" src="/storage/R.png" alt="">
      </div>
      <div class="col-sm-9">
        <p class="fw-bold sm-fs-10 text-center p-sm-3 text-light">LAMPIRAN: PERATURAN KEPALA DESA BUNTU BARANA NOMOR 06 TAHUN 2022 TENTANG PENJABARAN ANGGARAN PENDAPATAN DAN BELANJA DESA, PEMERINTAH DESA BUNTU BARANA TAHUN ANGGARAN 2024</p>
      </div>
    </div>
    <div class="p-3 text-bluelight">
      <table style="width:100%" class="sm-fs-10 p-3">
        <tr class="bg-bluedark">
          <th style="width:65%">PENDAPATAN</th>
          <th style="width:15%">ANGGARAN</th>
          <th style="width:20%">SUMBER DANA</th>
        </tr>
        @foreach ($pendapatan as $item)
        @php
        $tpendapatan=$tpendapatan+$item->nominal;
        @endphp
        <tr class="">
          <td>{{$item->Keterangan}}</td>
          <td>{{"Rp ". number_format($item->nominal,0,',','.')}}</td>
          <td>  
            @switch($item->sumberdana)
              @case('DD')
                  {{'DANA DESA'}}
                  @break
              @case('BHP')
                  {{'BAGI HASIL PAJAK'}}
                  @break
              @case('ADD')
                  {{'ALOKASI DANA DESA'}}
                  @break
              @case('LAINNYA')
                  {{'HASIL USAHA'}}
                  @break
              @default
                  
          @endswitch
          </td>
        </tr>
        @endforeach
        <tr class="">
          <td>Total:</td>
          <td>{{"Rp ". number_format($tpendapatan,0,',','.')}}</td>
          <td></td>
        </tr>
        <tr class="bg-bluedark">
          <td style="width:10%">BELANJA</td>
          <td>ANGGARAN</td>
          <td>SUMBER DANA</td>
        </tr>
        <tr class="bg-bluedark">
          <td class="text-uppercase">kesekretariatan</td>
          <td></td>
          <td></td>
        </tr>
        @foreach ($kesektariatan as $items)
        @php
        $tsekertariat=$tsekertariat+$items->anggaran;
        @endphp
        <tr>
          <td>{{$items->proker}}</td>
          <td>{{"Rp ". number_format($items->anggaran,0,',','.')}}</td>
          <td>
          @switch($items->Sumber_dana)
              @case('DD')
                  {{'DANA DESA'}}
                  @break
              @case('BHP')
                  {{'BAGI HASIL PAJAK'}}
                  @break
              @case('ADD')
                  {{'ALOKASI DANA DESA'}}
                  @break
              @default
                  
          @endswitch
          </td>
        </tr>
        @endforeach
        <tr class="">
          <td>Total:</td>
          <td>{{"Rp ". number_format($tsekertariat,0,',','.')}}</td>
          <td></td>
        </tr>
        <tr class="bg-bluedark">
          <td>KASI PEMERINTAHAN</td>
          <td></td>
          <td></td>
        </tr>
        @foreach ($pkpemerintahan as $items)
        @php
        $tkasipemerintahan=$tkasipemerintahan+$items->anggaran;
        @endphp
        <tr>
          <td>{{$items->proker}}</td>
          <td>{{"Rp ". number_format($items->anggaran,0,',','.')}}</td>
          <td>
          @switch($items->Sumber_dana)
              @case('DD')
                  {{'DANA DESA'}}
                  @break
              @case('BHP')
                  {{'BAGI HASIL PAJAK'}}
                  @break
              @case('ADD')
                  {{'ALOKASI DANA DESA'}}
                  @break
              @default
                  
          @endswitch
          </td>
        </tr>
        @endforeach
        <tr class="">
          <td>Total:</td>
          <td>{{"Rp ". number_format($tkasipemerintahan,0,',','.')}}</td>
          <td></td>
        </tr>
        <tr class="bg-bluedark">
          <td>KASI KESEJAHTERAAAN MASYARAKAT</td>
          <td></td>
          <td></td>
        </tr>
        @foreach ($pkkesra as $kesra)
        @php
        $tkasikesra=$tkasikesra+$kesra->anggaran;
        @endphp
        <tr>
          <td>{{$kesra->proker}}</td>
          <td>{{"Rp ". number_format($kesra->anggaran,0,',','.')}}</td>
          <td>
          @switch($kesra->Sumber_dana)
              @case('DD')
                  {{'DANA DESA'}}
                  @break
              @case('BHP')
                  {{'BAGI HASIL PAJAK'}}
                  @break
              @case('ADD')
                  {{'ALOKASI DANA DESA'}}
                  @break
              @default
                  
          @endswitch
          </td>
        </tr>
        @endforeach
        <tr class="">
          <td>Total:</td>
          <td>{{"Rp ". number_format($tkasikesra,0,',','.')}}</td>
          <td></td>
        </tr>
        <tr class="bg-bluedark">
          <td>KASI KEMASYARAKATAN</td>
          <td></td>
          <td></td>
        </tr>
        @foreach ($pkkemasyarakatan as $kemasyarakatan)
        @php
        $tkasikemasyarakatan=$tkasikemasyarakatan+$kesra->anggaran;
        @endphp
        <tr>
          <td>{{$kemasyarakatan->proker}}</td>
          <td>{{"Rp ". number_format($kemasyarakatan->anggaran,0,',','.')}}</td>
          <td>
          @switch($kemasyarakatan->Sumber_dana)
              @case('DD')
                  {{'DANA DESA'}}
                  @break
              @case('BHP')
                  {{'BAGI HASIL PAJAK'}}
                  @break
              @case('ADD')
                  {{'ALOKASI DANA DESA'}}
                  @break
              @default
                  
          @endswitch
          </td>
        </tr>
        @endforeach
        <tr class="">
          <td>Total:</td>
          <td>{{"Rp ". number_format($tkasikemasyarakatan,0,',','.')}}</td>
          <td></td>
        </tr>
      </table>
    </div>
  </div>
@endsection