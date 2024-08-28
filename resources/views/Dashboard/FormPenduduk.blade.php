@extends('Dashboard.layout.main')
@section('container')

    @if (session('sukses'))
        <div class="alert alert-info" role="alert">
            {{ session('sukses') }}
        </div>
    @endif

    <!-- Create Post Form -->
    <div class="container">
        <form action="/dashboard/datapenduduk" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <legend>Data Pribadi</legend>
                    <div class="col-sm-auto mb-1">
                        <label for="validationDefault01" class="form-label">Nik</label>
                        <input type="text" class="form-control @error('nik') is-invalid  @enderror" id="validationDefault01" name="nik"
                            value="{{ old('nik') }}" placeholder="" />
                        @error('nik') 
                        <div class="invalid-feedback">
                            {{$message}}
                          </div>
                        @enderror
                    </div>
                
                    <div class="col-sm-auto mb-1">
                        <label for="validationDefault02" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid  @enderror" id="validationDefault02" name="nama"
                            value="{{ old('nama') }}">
                            @error('nik') 
                            <div class="invalid-feedback">
                                {{$message}}
                              </div>
                            @enderror
                    </div>

                    <div class="col-sm-auto mb-1">
                        <label for="validationDefaultUsername" class="form-label">Email</label>
                        <div class="input-group">
                            <input type="Email" name="email" class="form-control @error('email') is-invalid  @enderror" id="validationDefaultUsername"
                                aria-describedby="inputGroupPrepend2" value="{{ old('email') }}" />
                                @error('nik') 
                                <div class="invalid-feedback">
                                    {{$message}}
                                  </div>
                                @enderror
                        </div>
                       
                    </div>

                    <div class="col-sm-auto mb-1">
                        <label for="validationDefault03" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid  @enderror" id="validationDefault03"
                            value="{{ old('alamat') }}" />
                            @error('nik') 
                            <div class="invalid-feedback">
                                {{$message}}
                              </div>
                            @enderror
                    </div>

                    <div class="col-sm-auto mb-1">
                        <label for="validationDefault04" class="form-label">Dusun</label>
                        <select class="form-select @error('dusun') is-invalid  @enderror" name="dusun" id="validationDefault04">
                            <option>--Pilih--</option>
                            <option {{ old('dusun') == 'DUSUN BUNTUN KALOSI' ? 'selected' : '' }} value="DUSUN BUNTUN KALOSI">DUSUN BUNTUN KALOSI</option>
                            <option {{ old('dusun') == 'DUSUN RANTE LIMBONG' ? 'selected' : '' }} value="DUSUN RANTE LIMBONG">DUSUN RANTE LIMBONG</option>
                            <option {{ old('dusun') == 'DUSUN BALABATU' ? 'selected' : '' }} value="DUSUN BALABATU ">DUSUN BALABATU </option>
                            <option {{ old('dusun') == 'DUSUN MALIBA' ? 'selected' : '' }} value="DUSUN MALIBA ">DUSUN MALIBA </option>
                        </select>
                        @error('dusun') 
                            <div class="invalid-feedback">
                                {{$message}}
                              </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-sm-6 mb-1">
                            <label for="validationDefault05" class="form-label">Agama</label>
                            <select name="agama" class="form-select @error('agama') is-invalid  @enderror" aria-label="Default select example">
                                <option>--Pilih--</option>
                                <option {{ old('agama') == 'islam' ? 'selected' : '' }} value="islam">Islam</option>
                                <option {{ old('agama') == 'kristen' ? 'selected' : '' }} value="kristen">Kristen</option>
                                <option {{ old('agama') == 'hindu' ? 'selected' : '' }} value="hindu">HIndu</option>
                            </select>
                            @error('agama') 
                            <div class="invalid-feedback">
                                {{$message}}
                              </div>
                            @enderror
                        </div>

                        <div class="col-sm-6 mb-1">
                            <label for="validationDefault05" class="form-label">Status</label>
                            <select name="status" class="form-select @error('status') is-invalid  @enderror" aria-label="Default select example">
                                <option>--Pilih--</option>
                                <option {{ old('status') == 'kawin' ? 'selected' : '' }} value="kawin">Kawin</option>
                                <option {{ old('status') == 'Belum kawin' ? 'selected' : '' }} value="Belum kawin">Belum
                                    Kawin
                                </option>
                            </select>
                            @error('status') <div class="invalid-feedback">{{$message}}</div>@enderror
                        </div>

                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6 mb-1">
                            <label for="validationDefault05" class="form-label">Nomor Hp</label>
                            <input type="number" name="hp" class="form-control @error('hp') is-invalid  @enderror" id="validationDefault05"
                                value="{{ old('hp') }}" />
                            @error('hp') <div class="invalid-feedback">{{$message}}</div>@enderror
                        </div>

                        <div class="col-sm-6 mb-1">
                            <label for="validationDefault05" class="form-label">Umur</label>
                            <input type="number" name="umur" class="form-control @error('umur') is-invalid  @enderror" id="validationDefault05"
                                value="{{ old('umur') }}" />
                            @error('umur') <div class="invalid-feedback">{{$message}}</div>@enderror
                        </div>

                    </div>
                    <div class="col-sm-12 my-3">
                        <label for="validationDefault05" class="form-label">Jenis Kelamin</label>
                        <div class="d-flex flex-row">
                            <div class="form-check mx-3">
                                <input class="form-check-input @error('nik') is-invalid  @enderror" type="radio" name="jk" value="laki-laki"
                                    id="flexRadioDefault1" {{ old('jk') == 'laki-laki' ? 'checked' : '' }} />
                                <label class="form-check-label" for="flexRadioDefault1">Laki-Laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('jk') is-invalid  @enderror" type="radio" name="jk" id="flexRadioDefault2 "
                                    value="perempuan" {{ old('jk') == 'perempuan' ? 'checked' : '' }} />
                                <label class="form-check-label" for="flexRadioDefault2"> Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-1">
                            <label for="TempatLahir" class="form-label">Tempat Lahir</label>
                            <input type="Text" class="form-control @error('tempatlahir') is-invalid  @enderror"\ name="tempatlahir" id="Tempatlahir"
                                value="{{ old('tempatlahir') }}" />
                                @error('tempatlahir') <div class="invalid-feedback">{{$message}}</div>@enderror
                        </div>
                        <div class="col-sm-6 mb-1">
                            <label for="validationDefault01" class="form-label">Tanggal_Lahir</label>
                            <input type="Date" name="tanggallahir" class="form-control @error('tanggallahir') is-invalid  @enderror" id="validationDefault01"
                             value="{{ old('tanggallahir') }}" />
                             @error('tanggallahir') <div class="invalid-feedback">{{$message}}</div>@enderror
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 ">
                    <div class="border p-2 border-box mt-4 rounded shadow">
                        <legend class="ms-3">Pendidikan</legend>
                        <div class="col-sm-8 mb-3 ms-3">
                            <label for="validationDefault01" class="form-label">Pendidikan Terakhir</label>
                            <select name="pendidikan" class="form-select @error('pendidikan') is-invalid  @enderror" aria-label="Default select example">
                                <option>--Pilih--</option>
                                <option value="SMP" {{ old('pendidikan') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ old('pendidikan') == 'SMA' ? 'selected' : '' }}>SMA</option>
                                <option value="D3" {{ old('pendidikan') == 'D3' ? 'selected' : '' }}>D3</option>
                                <option value="S1" {{ old('pendidikan') == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ old('pendidikan') == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3"{{ old('pendidikan') == 'S3' ? 'selected' : '' }}>S3</option>
                                <option value="Tidak sekolah"{{ old('pendidikan') == 'Tidak sekolah' ? 'selected' : '' }}>
                                    Tidak sekolah</option>
                            </select>
                            @error('pendidikan') <div class="invalid-feedback">{{$message}}</div>@enderror
                        </div>
                        <div class="col-sm-8 ms-3 mb-3">
                            <label for="validationDefault01" class="form-label">Nama Sekolah</label>
                            <input name="namasekolah" type="text" class="form-control @error('namasekolah') is-invalid  @enderror" id="validationDefault01"
                             value="{{ old('namasekolah') }}" />
                             @error('namasekolah') <div class="invalid-feedback">{{$message}}</div>@enderror
                        </div>
                    </div>
                    <div class="border p-2 border-box mt-4 rounded shadow d-flex flex-column justify-content-center">
                        <legend class="ms-3">Pekerjaan</legend>
                        <div class="col-sm-8 mb-3 ms-3">
                            <label for="validationDefault01" class="form-label">Pekerjaan</label>
                            <select name="pekerjaan" class="form-select @error('pekerjaan') is-invalid  @enderror" aria-label="Default select example">
                                <option>--pilih--</option>
                                <option value="petani" {{ old('pekerjaan') == 'petani' ? 'selected' : '' }}>Petani
                                </option>
                                <option value="pns" {{ old('pekerjaan') == 'pns' ? 'selected' : '' }}>PNS</option>
                                <option value="pengusaha" {{ old('pekerjaan') == 'pengusaha' ? 'selected' : '' }}>
                                    Pengusaha
                                </option>
                                <option value="Peternak" {{ old('pekerjaan') == 'Peternak' ? 'selected' : '' }}>
                                    Peternak
                                </option>
                                <option value="Pedagang" {{ old('pekerjaan') == 'Pedagang' ? 'selected' : '' }}>
                                    Pedagang
                                </option>
                                <option value="Belum bekerja" {{ old('pekerjaan') == 'Belum bekerja' ? 'selected' : '' }}>
                                    Belum bekerja
                                </option>
                            </select>
                            @error('pekerjaan') <div class="invalid-feedback">{{$message}}</div>@enderror
                        </div>
                        <div class="col-sm-8 ms-3 mb-3">
                            <label for="validationDefault01" class="form-label">Penghasilan /bulan</label>
                            <input name="penghasilan" type="text" class="form-control @error('penghasilan') is-invalid  @enderror" id="validationDefault01"
                             value="{{ old('penghasilan') }}" />
                             @error('penghasilan') <div class="invalid-feedback">{{$message}}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="d-block m-auto mt-3 btn btn-primary text-center">Simpan</button>
        </form>
    </div>
@endsection
