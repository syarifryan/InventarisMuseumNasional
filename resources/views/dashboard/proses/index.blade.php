@extends('layouts.dashboard')

@section('title', 'Inventaris | Museum Nasional Indonesia ')

@section('content')

<div class="row mb-32 gy-32">
    <div class="col-12">
        <div class="row justify-content-between gy-32">
            <div class="col-12 col-md-8">
                <h3 class="h3">Inventaris Koleksi Museum Nasional Indonesia</h3>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 g-8 justify-content-end">
                            <h4>Inventaris Koleksi</h4>
                            <div class="row d-flex justify-content-end mb-24">
                                <p>Halaman untuk menginput, mengedit serta merubah data inventaris koleksi Museum Nasional Indonesia</p>
                                <div class="col hp-flex-none w-auto">
                              
                                </div>
                                {{-- <div class="col hp-flex-none w-auto">
                                    <button type="button" class="btn btn-primary w-100" onclick="saveData();">
                                        <span>Mulai Pengujian Kualitas Udara</span>
                                    </button>
                                </div> --}}
                                <div class="col hp-flex-none w-auto">
                                    <a href="" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalTambahInventaris" id="btn-pengujian">Input Inventaris</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div > --}}
        <div class="card mb-12">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <div class="tab-content">
                    {{-- visitor --}}
                    <div class="tab-pane active" id="visitor">
                        <div class="table-responsive">
                            <table class="table align-middle table-hover table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">No Inv</th>
                                        <th scope="col">No Reg</th>
                                        <th scope="col">Nama Benda</th>
                                        <th scope="col">Jenis Koleksi</th>
                                        <th scope="col">Tempat Asal</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                @forelse ($proses as $item)
                                    <tr>
                                        {{-- <td scope="row">{{$loop->iteration}}</td> --}}
                                        <td> {{ $item->no_inv_baru }} </td>
                                        <td> {{ $item->no_reg_baru }} </td>
                                        <td> {{ $item->nama_benda }} </td>
                                        <td> {{ $item->jenis_koleksi }} </td>
                                        <td> {{ $item->tempat_asal }} </td>
                                        <td>
                                            <button onclick="detailData({{$item->id}})" class="btn btn-text text-primary btn-sm"
                                            title="Detail">
                                            <i class="iconly-Light-Show"></i>
                                        </button>
                                    </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data Kosong</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
    {{-- Detail Proses  --}}
    <div class="modal fade" id="modalTambahInventaris" tabindex="-1" aria-labelledby="modalTambahInventaris"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {{-- @csrf --}}
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahInventaris">Manage Inventaris</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="formInventaris" action="{{route('dashboard.proses.store')}}">
                    @csrf
                    <div class="modal-body" style="padding: 20px">
                        {{-- <input type="text" id="id" name="id" class="kontraktor" hidden> --}}
                        <div class="col-12 mt-16">
                            <div class="col-12 col-md-12">
                                <div class="mb-24">
                                    <label for="nama_customer" class="form-label">
                                        <span class="text-danger me-4">*</span>
                                        Jenis Koleksi
                                    </label>
                                    <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Masukan Jenis Koleksi" value="{{ old('nama_customer') }}" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="mb-24">
                                    <label for="nama_customer" class="form-label">
                                        <span class="text-danger me-4">*</span>
                                        Nama Benda
                                    </label>
                                    <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Masukan Nama Benda" value="{{ old('nama_customer') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <div class="mb-24">
                                        <label for="nama_customer" class="col-form-label">
                                            <span class="text-danger me-4">*</span>
                                            Nomor Inventaris Lama
                                        </label>
                                        <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Masukan No Inv Lama" value="{{ old('nama_customer') }}" required>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="regency_id" class="col-form-label">
                                        <span class="text-danger me-4">*</span>
                                        Nomor Inventaris Baru
                                    </label>
                                    <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Masukan No Inv Baru" value="{{ old('nama_customer') }}" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <div class="mb-24">
                                        <label for="nama_customer" class="col-form-label">
                                            <span class="text-danger me-4">*</span>
                                            Nomor Registrasi Lama
                                        </label>
                                        <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Masukan No Reg Lama" value="{{ old('nama_customer') }}" required>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="regency_id" class="col-form-label">
                                        <span class="text-danger me-4">*</span>
                                        Nomor Registrasi Baru
                                    </label>
                                    <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Masukan No Reg Baru" value="{{ old('nama_customer') }}" required>
                                </div>
                            </div>

                            <div class="col-12 col-md-12">
                                <label for="no_ktp" class="col-form-label">
                                    <span class="text-danger me-4">*</span>
                                    Tempat Penyimpanan
                                </label>
                                <input type="number"class="form-control" id="no_ktp" name="no_ktp" placeholder="Masukan Tempat Penyimpanan" value="{{ old('no_ktp') }}" >
                            </div>
                            <div class="col-12 col-md-12">
                                <label for="alamat_customer" class="col-form-label">
                                    <span class="text-danger me-4">*</span>
                                    Ukuran
                                </label>
                                <input type="text" class="form-control" id="alamat_customer" name="alamat_customer" placeholder="Masukan Ukuran" value="{{ old('alamat_customer') }}" >
                            </div>

                            <div class="row">
                                <div class="col-6 mb-3">
                                    <div class="mb-24">
                                        <label for="nama_customer" class="col-form-label">
                                            <span class="text-danger me-4">*</span>
                                            Bahan
                                        </label>
                                        <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Masukan Bahan" value="{{ old('nama_customer') }}" required>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="regency_id" class="col-form-label">
                                        <span class="text-danger me-4">*</span>
                                        Teknik Pembuatan
                                    </label>
                                    <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Masukan Teknik Pembuatan" value="{{ old('nama_customer') }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 mb-3">
                                    <div class="mb-24">
                                        <label for="nama_customer" class="col-form-label">
                                            <span class="text-danger me-4">*</span>
                                            Tempat Asal
                                        </label>
                                        <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Masukan Tempat Asal" value="{{ old('nama_customer') }}" required>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="regency_id" class="col-form-label">
                                        <span class="text-danger me-4">*</span>
                                        Negara
                                    </label>
                                    <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Masukan Negara" value="{{ old('nama_customer') }}" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="regency_id" class="col-form-label">
                                        <span class="text-danger me-4">*</span>
                                        Provinsi
                                    </label>
                                    <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Masukan Provinsi" value="{{ old('nama_customer') }}" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="regency_id" class="col-form-label">
                                        <span class="text-danger me-4">*</span>
                                        Kabupaten
                                    </label>
                                    <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Masukan Kabupaten" value="{{ old('nama_customer') }}" required>
                                </div>
                            </div>

                            <div class="col-12 col-md-12">
                                <label for="alamat_customer" class="col-form-label">
                                    <span class="text-danger me-4">*</span>
                                    Tempat Pembuatan
                                </label>
                                <input type="text" class="form-control" id="alamat_customer" name="alamat_customer" placeholder="Masukan Tempat Pembuatan" value="{{ old('alamat_customer') }}" >
                            </div>
                            <div class="col-12 col-md-12">
                                <label for="alamat_customer" class="col-form-label">
                                    <span class="text-danger me-4">*</span>
                                    Tempat Temuan
                                </label>
                                <input type="text" class="form-control" id="alamat_customer" name="alamat_customer" placeholder="Masukan Temuan" value="{{ old('alamat_customer') }}" >
                            </div>
                            <div class="col-12 col-md-12">
                                <label for="alamat_customer" class="col-form-label">
                                    <span class="text-danger me-4">*</span>
                                    Tahun Pembuatan
                                </label>
                                <input type="text" class="form-control" id="alamat_customer" name="alamat_customer" placeholder="Masukan Tahun Pembuatan" value="{{ old('alamat_customer') }}" >
                            </div>
                            <div class="col-12 col-md-12">
                                <label for="alamat_customer" class="col-form-label">
                                    <span class="text-danger me-4">*</span>
                                    Kegunaan / Fungsi
                                </label>
                                <input type="text" class="form-control" id="alamat_customer" name="alamat_customer" placeholder="Masukan Kegunaan/Fungsi" value="{{ old('alamat_customer') }}" >
                            </div>
                            <div class="col-12 col-md-12">
                                <label for="alamat_customer" class="col-form-label">
                                    <span class="text-danger me-4">*</span>
                                    Cara Perolehan
                                </label>
                                <input type="text" class="form-control" id="alamat_customer" name="alamat_customer" placeholder="Masukan Cara Perolehan" value="{{ old('alamat_customer') }}" >
                            </div>
                            <div class="col-12 col-md-12">
                                <label for="alamat_customer" class="col-form-label">
                                    <span class="text-danger me-4">*</span>
                                    Tempat Perolehan
                                </label>
                                <input type="text" class="form-control" id="alamat_customer" name="alamat_customer" placeholder="Masukan Tempat Perolehan" value="{{ old('alamat_customer') }}" >
                            </div>

                            <div class="col-12 col-md-12">
                                <label for="alamat_customer" class="col-form-label">
                                    <span class="text-danger me-4">*</span>
                                    Kondisi
                                </label>
                                <input type="text" class="form-control" id="alamat_customer" name="alamat_customer" placeholder="Masukan Kondisi" value="{{ old('alamat_customer') }}" >
                            </div>

                            <div class="col-12 col-md-12">
                                <label for="alamat_customer" class="col-form-label">
                                    <span class="text-danger me-4">*</span>
                                    Deskripsi
                                </label>
                                <textarea class="form-control" name="" id="" cols="30" rows="2" placeholder="Masukan Deskripsi"></textarea>
                            </div>
                            <div class="col-12 col-md-12">
                                <label for="alamat_customer" class="col-form-label">
                                    <span class="text-danger me-4">*</span>
                                    Keterangan
                                </label>
                                <textarea class="form-control" name="" id="" cols="30" rows="2" placeholder="Masukan Keterangan"></textarea>
                            </div>
                           
                            <div class="mb-3">
                                <label for="img_ktp" class="col-form-label">
                                    <span class="text-danger me-4">*</span>
                                    Foto Koleksi
                                </label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="img_ktp" name="img_ktp" >
                                    </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="information_media_id" class="col-form-label">
                                    <span class="text-danger me-4">*</span>
                                    Sumber Informasi
                                </label>
                                    <select class="form-select" id="information_media_id" name="information_media_id" value="{{ old('information_media_id') }}" >
                                        <option selected disabled>-- Pilih Sumber Informasi --</option>
                                        <option value="1">Referensi Teman</option>
                                        <option value="2">Pameran</option>
                                        <option value="3">Iklan Jalan</option>
                                        <option value="4">Instagram</option>
                                        <option value="5">Facebook</option>
                                        <option value="6">WhatsApp</option>
                                        <option value="7">Email</option>
                                        <option value="8">Lainnya</option>
                                    </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer pt-0 px-24 pb-24">
                        <div class="divider"></div>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Input Inventaris</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    {{-- Detail ISPU  --}}



    <div class="modal fade" id="modalDetailISPU" tabindex="-1" aria-labelledby="modalDataLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {{-- @csrf --}}
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailISPU">Manage Detail Inventaris</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- <form method="POST" id="formISPU" action="{{route('dashboard.proses.store')}}"> --}}
                    {{-- @csrf --}}
                    <div class="modal-body">
                        {{-- <input type="text" id="id" name="id" class="kontraktor" hidden> --}}
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="date" class="col-sm-3 mb-0">Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control date" id="date"
                                    readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="co" class="col-sm-3 mb-0">Karbon Monoksida (CO)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control co" id="co"
                                    readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="nh3" class="col-sm-3 mb-0">Amonia (NH3)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control nh3" id="nh3"
                                    readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="no2" class="col-sm-3 mb-0">Nitrogen Dioksida (NO2)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control no2" id="no2"
                                    readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="no2" class="col-sm-3 mb-0">Nilai Output</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control no2" id="nilai_output"
                                    readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="no2" class="col-sm-3 mb-0">ISPU</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control no2" id="grade_output"
                                    readonly required>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="no2" class="col-sm-3 mb-0">Penanganan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control no2" id="penanganan" 
                                    readonly required>
                                </div>
                            </div>
                        </div> --}}

                        
                        
                    </div>
                    <div class="modal-footer pt-0 px-24 pb-24">
                        <div class="divider"></div>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                            {{-- <button type="submit" class="btn btn-primary">Proses</button> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    

<script>
    $(document).on("click", "#btn-pengujian", function() {
        // Mendapatkan id data terakhir dari API
        $.ajax({
            url: "{{ route('get-one-last-data-sensor') }}",
            type: "GET",
            dataType: "json",
            success: function(data) {
                // Mengisi data terakhir ke dalam field input
                $("#last-co").val(data.co);
                $("#last-nh3").val(data.nh3);
                $("#last-no2").val(data.no2);
                $("#last-date").val(data.updated_at);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });

    function fillDetailData(response = null) {
        console.log(response)
        $("#id").val(response.id.toString());
        $("#date").val(response.updated_at);
        $("#co").val(response.co);
        $("#no2").val(response.no2);
        $("#nh3").val(response.nh3);
        $("#nilai_output").val(response.defuzzy);
        $("#grade_output").val(response.grade);
        $("#penanganan").val(response.handle_id.penanganan);
    }

    function detailData(id = null) {
        if (id != null) {
            $.ajax({
                url: "{{route('dashboard.proses.show', ':id')}}".replace(":id", id),
                type: "GET",
                success: function (res) {
                    fillDetailData(res);
                }
            });
        }
        $('.btn-edit').show();
        $('.btn-delete').show();
        $('.btn-save').hide();
        $('.btn-update').hide();
        $(".modal-body :input").prop("disabled", true);
        $('#modalDetailISPU').modal('show');
    }
</script>




@endsection