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
                    <div class="modal-body">
                        {{-- <input type="text" id="id" name="id" class="kontraktor" hidden> --}}
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="co" class="col-sm-3 mb-0">Jenis Koleksi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control co" id="last-co" 
                                    name="co" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="co" class="col-sm-3 mb-0">Nama Benda</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control co" id="last-co" 
                                    name="co" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="co" class="col-sm-3 mb-0">Nomor Inventaris</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control co" id="last-co" 
                                    name="co" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="co" class="col-sm-3 mb-0">Nomor Registrasi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control co" id="last-co" 
                                    name="co" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="co" class="col-sm-3 mb-0">Nomor Registrasi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control co" id="last-co" 
                                    name="co" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="co" class="col-sm-3 mb-0">Tempat Penyimpanan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control co" id="last-co" 
                                    name="co" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="co" class="col-sm-3 mb-0">Ukuran</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control co" id="last-co" 
                                    name="co" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="co" class="col-sm-3 mb-0">Bahan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control co" id="last-co" 
                                    name="co" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="co" class="col-sm-3 mb-0">Teknik Pembuatan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control co" id="last-co" 
                                    name="co" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="date" class="col-sm-3 mb-0">Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control date" id="last-date"
                                        name="date" readonly required>
                                </div>
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