<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{$data->jenis}}</title>
  <style>
  
    *{
      margin:0%;
      padding: 0%;
    }
    .header{
      margin: 0%;
      text-align: center;
      font-family:"Bodoni MT";
      font-size: 16pt;
      font-weight: bold;
    }
    .alamat{
      margin: 0%;
      font-style: italic;
      font-size: 10pt;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;  
      text-align: center;
      border-bottom: 3px solid black;
    }
  .skck{
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    border-bottom: 2px solid;
    font-size: 12pt;
    margin: auto; 
    width: 300px;
    padding-top: 1.5mm;
  }
  .nomor{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    text-align: center;
    font-size: 12pt;
    margin: 0%;

  }
  table{
    margin-left: 30px;
  }
  .ttd{
   margin-left: 35%;
  }
  </style>
</head>
<body>
  <img>
  <p class="header" >Pemerintah Kabupaten Enrekang <br>
    Kecamatan Curio <br>
    Desa Buntu Barana</p>
      <p class="alamat">Alamat : Jl. Pendidikan No. 1 Rante Limbong, Kode.Pos. 91755</p>
  <p class="skck">SURAT KETERANGAN PENGANTAR</p>
  <p class="nomor"> Nomor: {{$data->id}}/02/DBB/KC//II/{{date('Y',strtotime($data->created_at))}}</p>
  <ol type="1">
    <li>Pemerintah Desa Buntu Barana dengan ini menerangkan bahwa :</li>
      <table class="table">
        <tr>
          <td>Nama</td>$
          <td>: {{$data->penduduk->nama}}</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>: {{$data->penduduk->alamat}}</td>
        </tr>
        <tr>
          <td>Tempat/Tgl. lahir	</td>
          <td>: {{$data->penduduk->tanggallahir}}</td>
        </tr>
        <tr>
          <td>Kewarganegaraan</td>
          <td>: Indonesia</td>
        </tr>
        <tr>
          <td>Pendidikan Terakhir</td>
          <td>: {{$data->penduduk->pendidikan}}</td>
        </tr>
        <tr>
          <td>Pekerjaan</td>
          <td>: {{$data->penduduk->pekerjaan}}</td>
        </tr>
        <tr>
          <td>Agama</td>
          <td>: {{$data->penduduk->agama}}</td>
        </tr>
      </table>
      <p>Orang tersebut diatas, memang benar adalah warga Desa Buntu Barana Kecamatan Curio Kabupaten Enrekang, Surat pengantar ini dibuat guna melengkapi syarat pembuatan atau pengurusan KTP (Kartu Tanda Penduduk)</p>
    <li>Surat keterangan ini diberikan untuk keperluan :</li>
    <p style="text-align: center; font-size:12pt; font-weight=bold; ">- {{$data->keperluan}} -</p>
    <li>Demikian surat keterangan ini dibuat dengan sebenar-benarnya untuk dipergunakan sebagaimana mestinya.</li>  
      <div class="container">
        <div class="ttd">
          <table style="margin:auto; margin-left:100px; margin-top:1.5cm;">
            <tr>
              <td>Di keluarkan di</td>
              <td>: Rante limbong</td>
            </tr>
            <tr>
              <td>Pada Tanggal</td>
              <td>: {{ date('d-M-Y',strtotime($data->created_at))}}</td>
            </tr>
          </table>
          <p style="height:2cm; text-align:center;">KEPALA DESA BUNTU BARANA</p>
          <p style="text-align: center; text-decoration-line:underline; font-weight:bold;">malik,A.Md</p>
        </div>
      </div>
  </ol>
  <footer>
    <p>Catatan:<br>
    <em>Tidak berlaku apabila yang bersangkutan ternyata sedang dalam proses Perkara Pidana.</em></p>
  </footer>
</body>
</html>