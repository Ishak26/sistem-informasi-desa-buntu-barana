@extends('Dashboard.layout.main')
 @section('container')
<div class="container">
    <form class="row g-3">
      <legend>Data Pribadi</legend>
        <div class="col-sm-4">
            <label for="validationDefault01" class="form-label">Nik</label>
            <input
                type="number"
                class="form-control"
                id="validationDefault01"
                required
            />
        </div>
        <div class="col-sm-4">
            <label for="validationDefault02" class="form-label">Nama</label>
            <input type="text" class="form-control" id="validationDefault02" "
            required>
        </div>
        <div class="col-sm-4">
            <label for="validationDefaultUsername" class="form-label"
                >Email</label
            >
            <div class="input-group">
                <input
                    type="Email"
                    class="form-control"
                    id="validationDefaultUsername"
                    aria-describedby="inputGroupPrepend2"
                    required
                />
            </div>
        </div>
        <div class="col-sm-6">
            <label for="validationDefault03" class="form-label">Alamat</label>
            <input
                type="text"
                class="form-control"
                id="validationDefault03"
                required
            />
        </div>
        <div class="col-sm-3">
            <label for="validationDefault04" class="form-label">Dusun</label>
            <select class="form-select" id="validationDefault04" required>
                <option selected value="">Pilih...</option>
                <option>...</option>
            </select>
        </div>
        <div class="col-sm-3">
            <label for="validationDefault05" class="form-label">Zip</label>
            <input
                type="text"
                class="form-control"
                id="validationDefault05"
                required
            />
        </div>
        <div class="col-sm-3">
            <label for="validationDefault05" class="form-label"
                >Jenis Kelamin</label
            >
            <div class="d-flex flex-row">
                <div class="form-check me-2">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="flexRadioDefault"
                        id="flexRadioDefault1"
                    />
                    <label class="form-check-label" for="flexRadioDefault1">
                        Laki-Laki
                    </label>
                </div>
                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="flexRadioDefault"
                        id="flexRadioDefault2"
                        checked
                    />
                    <label class="form-check-label" for="flexRadioDefault2">
                        Perempuan
                    </label>
                </div>
            </div>
        </div>
         <div class="col-sm-2">
            <label for="TempatLahir" class="form-label">Tempat Lahir</label>
            <input
                type="Text"
                class="form-control"\
                name="tempatlahir"
                id="Tempatlahir"
                required
            />
        </div>
        <div class="col-sm-3">
            <label for="validationDefault01" class="form-label">Tanggal_Lahir</label>
            <input
                type="Date"
                class="form-control"
                id="validationDefault01"
                required
            />
        </div>
         <div class="col-sm-4">
            <label for="hp" class="form-label">Nomor Telpon</label>
            <input
                type="number"
                class="form-control"
                id="hp"
                name="hp"
                required
            />
         </div>
        </div>
         <fieldset>
          <legend>Pendidikan</legend>
          <div class="row row-col-6">
               <div class="border">
                <div class="col-sm-3">
                  <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                  <select class="form-select" id="pendidikan" required>
                      <option selected value="">Pilih...</option>
                      <option>...</option>
                  </select>
               </div>
               <div class="col-sm-4">
                  <label for="Namasekolah" class="form-label">Nama Sekolah</label>
                  <input type="text" class="form-control" id="Namasekolah" "
                  required>
               </div>
            </div>
     </div>
          </fieldset>


        {{-- <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div> --}}
    </form>
</div>
@endsection
