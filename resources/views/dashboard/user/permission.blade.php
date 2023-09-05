@extends('layouts.dashboard')

@section('title', 'Permission | SIM - KU ')

@section('content')
<div class="row mb-32 gy-32">
    <div class="col-12">
        <div class="row justify-content-between gy-32">
            <div class="col-12 col-md-4 d-flex">
                <a href="{{ url()->previous() }}" class="auth-back">
                    <i class="iconly-Light-ArrowLeft"></i>
                </a>
                <h4 class="mx-8 h4">Permission - {{$role->name}}</h4>
            </div>
            <div class="col-12 col-md-7">
                <div class="row g-16 align-items-center justify-content-end">
                    <div class="col hp-flex-none w-auto">
                        @can('role-update')
                        <button type="button" class="btn btn-success btn-edit" onclick="editData();">
                            <span>Edit</span>
                        </button>
                        @endcan
                        <button type="button" class="btn btn-text btn-cancel" onclick="cancelEdit();" style="display:none">
                            <span>Cancel</span>
                        </button>
                        @can('role-add')
                        <button type="button" class="btn btn-primary btn-save" onclick="saveData();" style="display:none">
                            <span>Save</span>
                        </button>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card hp-contact-card mb-32">
            <div class="card-body px-0">
                <div class="table-responsive">
                    <input type="hidden" id="role_id" name="role_id" value="{{$role->id}}">
                    <table class="table align-middle table-hover table-borderless">
                        <thead>
                            <tr>
                                <th>Permissions</th>
                                @php
                                $permission_in_role = [];
                                foreach ($role->permissions as $permission ) {
                                    $permission_in_role[] = $permission->name;
                                }
                                @endphp
                                <th>Read</th>
                                <th>Create</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <form id="formData" action="">
                                @csrf
                                <div id="method">
                                    @method("POST")
                                </div>
                                <tr>
                                    <td>Kualitas Udara</td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="kualitas-index" {{in_array("kualitas-index", $permission_in_role) ? "checked" : ""}} id="kualitas-index" name="kualitas-index">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="kualitas-add" {{in_array("kualitas-add", $permission_in_role) ? "checked" : ""}} id="kualitas-add" name="kualitas-add">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="kualitas-update" {{in_array("kualitas-update", $permission_in_role) ? "checked" : ""}} id="kualitas-update" name="kualitas-update">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="kualitas-delete" {{in_array("kualitas-delete", $permission_in_role) ? "checked" : ""}} id="kualitas-delete" name="kualitas-delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sensor</td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="sensor-index" {{in_array("sensor-index", $permission_in_role) ? "checked" : ""}} id="sensor-index" name="sensor-index">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="sensor-add" {{in_array("sensor-add", $permission_in_role) ? "checked" : ""}} id="sensor-add" name="sensor-add">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="sensor-update" {{in_array("sensor-update", $permission_in_role) ? "checked" : ""}} id="sensor-update" name="sensor-update">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="sensor-delete" {{in_array("sensor-delete", $permission_in_role) ? "checked" : ""}} id="sensor-delete" name="sensor-delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fuzzy Tsukamoto</td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="tsukamoto-index" {{in_array("tsukamoto-index", $permission_in_role) ? "checked" : ""}} id="tsukamoto-index" name="tsukamoto-add">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="tsukamoto-add" {{in_array("tsukamoto-add", $permission_in_role) ? "checked" : ""}} id="tsukamoto-add" name="tsukamoto-add">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="tsukamoto-update" {{in_array("tsukamoto-update", $permission_in_role) ? "checked" : ""}} id="tsukamoto-update" name="tsukamoto-update">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="tsukamoto-delete" {{in_array("tsukamoto-delete", $permission_in_role) ? "checked" : ""}} id="tsukamoto-delete" name="tsukamoto-delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fuzzy Rules</td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="rules-index" {{in_array("rules-index", $permission_in_role) ? "checked" : ""}} id="rules-index" name="rules-index">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="rules-add" {{in_array("rules-add", $permission_in_role) ? "checked" : ""}} id="rules-add" name="rules-add">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="rules-update" {{in_array("rules-update", $permission_in_role) ? "checked" : ""}} id="rules-update" name="rules-update">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="rules-delete" {{in_array("rules-delete", $permission_in_role) ? "checked" : ""}} id="rules-delete" name="rules-delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Proses</td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="proses-index" {{in_array("proses-index", $permission_in_role) ? "checked" : ""}} id="proses-index" name="proses-index">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="proses-add" {{in_array("proses-add", $permission_in_role) ? "checked" : ""}} id="proses-add" name="proses-add">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="proses-update" {{in_array("proses-update", $permission_in_role) ? "checked" : ""}} id="proses-update" name="proses-update">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="proses-delete" {{in_array("proses-delete", $permission_in_role) ? "checked" : ""}} id="proses-delete" name="proses-delete">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>User</td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="user-index" {{in_array("user-index", $permission_in_role) ? "checked" : ""}} id="user-index" name="user-index">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="user-add" {{in_array("user-add", $permission_in_role) ? "checked" : ""}} id="user-add" name="user-add">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="user-update" {{in_array("user-update", $permission_in_role) ? "checked" : ""}} id="user-update" name="user-update">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="user-delete" {{in_array("user-delete", $permission_in_role) ? "checked" : ""}} id="user-delete" name="user-delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="role-index" {{in_array("role-index", $permission_in_role) ? "checked" : ""}} id="role-index" name="role-index">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="role-add" {{in_array("role-add", $permission_in_role) ? "checked" : ""}} id="role-add" name="role-add">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="role-update" {{in_array("role-update", $permission_in_role) ? "checked" : ""}} id="role-update" name="role-update">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="role-delete" {{in_array("role-delete", $permission_in_role) ? "checked" : ""}} id="role-delete" name="role-delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Profil</td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="profile-index" {{in_array("profile-index", $permission_in_role) ? "checked" : ""}} id="profile-index" name="profile-index">
                                    </td>
                                        <td>
                                            <input class="form-check-input" type="checkbox" value="profile-add" {{in_array("profile-add", $permission_in_role) ? "checked" : ""}} id="profile-add" name="profile-add" disabled>
                                        </td>                                    
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="profile-edit" {{in_array("profile-edit", $permission_in_role) ? "checked" : ""}} id="profile-edit" name="profile-edit">
                                    </td>                                    
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @section('modal')
<div class="modal fade" id="modalData" tabindex="-1" aria-labelledby="modalDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-16 px-24">
                <h5 class="modal-title" id="modalDataLabel">Add Permission</h5>
                <button type="button" class="btn-close hp-bg-none d-flex align-items-center justify-content-center"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                </button>
            </div>

            <div class="divider m-0"></div>

            <form id="myForm">
                <div class="modal-body">
                    <input type="number" hidden>
                    <div class="row gx-8">
                        <div class="col-12 col-md-12">
                            <div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Name
                                </label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer pt-0 px-24 pb-24">
                    <div class="divider"></div>
                    <div class="d-flex justify-content-between w-100">
                        <div>
                            <button type="button" class="btn btn-danger btn-delete">Delete</button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-text btn-cancel"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-success btn-edit" onclick="editData()">Edit</button>
                            <button type="submit" class="btn btn-primary btn-save">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection --}}

@section('js')
<script>
    let csrf_token;
    $(document).ready(function () {
        csrf_token = $('[name="_token"]').val();
        disableInput()
    });
    
    function disableInput(){
        //CRM
        //kualitas
        $("#kualitas-index").attr("onclick", "return false");
        $("#kualitas-add").attr("onclick", "return false");
        $("#kualitas-update").attr("onclick", "return false");
        $("#kualitas-delete").attr("onclick", "return false");
        //sensor
        $("#sensor-index").attr("onclick", "return false");
        $("#sensor-add").attr("onclick", "return false");
        $("#sensor-update").attr("onclick", "return false");
        $("#sensor-delete").attr("onclick", "return false");
        //buku tamu
        $("#tsukamoto-index").attr("onclick", "return false");
        $("#tsukamoto-add").attr("onclick", "return false");
        $("#tsukamoto-update").attr("onclick", "return false");
        $("#tsukamoto-delete").attr("onclick", "return false");
        //rules 
        $("#rules-index").attr("onclick", "return false");
        $("#rules-add").attr("onclick", "return false");
        $("#rules-update").attr("onclick", "return false");
        $("#rules-delete").attr("onclick", "return false");
        //followup 
        $("#followup-index").attr("onclick", "return false");
        $("#followup-add").attr("onclick", "return false");
        $("#followup-update").attr("onclick", "return false");
        $("#followup-delete").attr("onclick", "return false");
        //pesan unit 
        $("#unit-index").attr("onclick", "return false");
        $("#unit-add").attr("onclick", "return false");
        $("#unit-update").attr("onclick", "return false");
        $("#unit-delete").attr("onclick", "return false");

        //KONSTRUKSI
        //proyek
        $("#proyek-index").attr("onclick", "return false");
        $("#proyek-add").attr("onclick", "return false");
        $("#proyek-update").attr("onclick", "return false");
        $("#proyek-delete").attr("onclick", "return false");
        //pekerjaan
        $("#pekerjaan-index").attr("onclick", "return false");
        $("#pekerjaan-add").attr("onclick", "return false");
        $("#pekerjaan-update").attr("onclick", "return false");
        $("#pekerjaan-delete").attr("onclick", "return false");
        //material
        $("#material-index").attr("onclick", "return false");
        $("#material-add").attr("onclick", "return false");
        $("#material-update").attr("onclick", "return false");
        $("#material-delete").attr("onclick", "return false");
        //tipeunit
        $("#tipeunit-index").attr("onclick", "return false");
        $("#tipeunit-add").attr("onclick", "return false");
        $("#tipeunit-update").attr("onclick", "return false");
        $("#tipeunit-delete").attr("onclick", "return false");
        //tambahunit
        $("#tambahunit-index").attr("onclick", "return false");
        $("#tambahunit-add").attr("onclick", "return false");
        $("#tambahunit-update").attr("onclick", "return false");
        $("#tambahunit-delete").attr("onclick", "return false");
        //cluster
        $("#cluster-index").attr("onclick", "return false");
        $("#cluster-add").attr("onclick", "return false");
        $("#cluster-update").attr("onclick", "return false");
        $("#cluster-delete").attr("onclick", "return false");
        //spk
        $("#spk-index").attr("onclick", "return false");
        $("#spk-add").attr("onclick", "return false");

        //SUPERADMIN
        //profile-perusahaan
        $("#profileperusahaan-index").attr("onclick", "return false");
        $("#profileperusahaan-add").attr("onclick", "return false");
        $("#profileperusahaan-update").attr("onclick", "return false");
        $("#profileperusahaan-delete").attr("onclick", "return false");

        //SETTINGS
        //user
        $("#user-index").attr("onclick", "return false");
        $("#user-add").attr("onclick", "return false");
        $("#user-update").attr("onclick", "return false");
        $("#user-delete").attr("onclick", "return false");
        //role
        $("#role-index").attr("onclick", "return false");
        $("#role-add").attr("onclick", "return false");
        $("#role-update").attr("onclick", "return false");
        $("#role-delete").attr("onclick", "return false");
        //profile
        $("#profile-index").attr("onclick", "return false");
        $("#profile-edit").attr("onclick", "return false");
        $('.btn-cancel').hide();
        $('.btn-save').hide();
        $('.btn-edit').show();
    }

    function cancelEdit(){
        resetToSavedData();
        disableInput();
    };

    function getCheckedValue(){
        let checked = [];
    //CRM
        //kualitas
        if($("#kualitas-index").is(":checked")){
            checked.push("kualitas-index");
        }
        if($("#kualitas-add").is(":checked")){
            checked.push("kualitas-add");
        }
        if($("#kualitas-update").is(":checked")){
            checked.push("kualitas-update");
        }
        if($("#kualitas-delete").is(":checked")){
            checked.push("kualitas-delete");
        }
        //sensor
        if($("#sensor-index").is(":checked")){
            checked.push("sensor-index");
        }
        if($("#sensor-add").is(":checked")){
            checked.push("sensor-add");
        }
        if($("#sensor-update").is(":checked")){
            checked.push("sensor-update");
        }
        if($("#sensor-delete").is(":checked")){
            checked.push("sensor-delete");
        }
        //buku tamu
        if($("#tsukamoto-index").is(":checked")){
            checked.push("tsukamoto-index");
        }
        if($("#tsukamoto-add").is(":checked")){
            checked.push("tsukamoto-add");
        }
        if($("#tsukamoto-update").is(":checked")){
            checked.push("tsukamoto-update");
        }
        if($("#tsukamoto-delete").is(":checked")){
            checked.push("tsukamoto-delete");
        }
        //rules        
        if($("#rules-index").is(":checked")){
            checked.push("rules-index");
        }
        if($("#rules-add").is(":checked")){
            checked.push("rules-add");
        }
        if($("#rules-update").is(":checked")){
            checked.push("rules-update");
        }
        if($("#rules-delete").is(":checked")){
            checked.push("rules-delete");
        }
        //proses        
        if($("#proses-index").is(":checked")){
            checked.push("proses-index");
        }
        if($("#proses-add").is(":checked")){
            checked.push("proses-add");
        }
        if($("#proses-update").is(":checked")){
            checked.push("proses-update");
        }
        if($("#proses-delete").is(":checked")){
            checked.push("proses-delete");
        }
     

    //SETTINGS        
        //user
        if($("#user-index").is(":checked")){
            checked.push("user-index");
        }
        if($("#user-add").is(":checked")){
            checked.push("user-add");
        }
        if($("#user-update").is(":checked")){
            checked.push("user-update");
        }
        if($("#user-delete").is(":checked")){
            checked.push("user-delete");
        }
        //role
        if($("#role-index").is(":checked")){
            checked.push("role-index");
        }
        if($("#role-add").is(":checked")){
            checked.push("role-add");
        }
        if($("#role-update").is(":checked")){
            checked.push("role-update");
        }
        if($("#role-delete").is(":checked")){
            checked.push("role-delete");
        }
        //role
        if($("#profile-index").is(":checked")){
            checked.push("profile-index");
        }
        if($("#profile-edit").is(":checked")){
            checked.push("profile-edit");
        }
        return checked;
    }
    function saveData() { 

        let checked = getCheckedValue();

        $.ajax({
            url: "{{route('dashboard.user.permission.store')}}",
            type: "POST",
            data: {
                _token: csrf_token,
                _method: "POST",
                permission: checked,
                role_id: $("#role_id").val()
            },
            dataType: 'JSON',
            success: function(res){
                resetToSavedData();
                disableInput();
            }, error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError)
                console.log(xhr);
            }
        });
        
    }
    function fillDetailData(response){

        //kualitas
        if(response.includes("kualitas-index")){
            $("#kualitas-index").prop("checked", true);
        } else {
            $("#kualitas-index").prop("checked", false);
        }
        if(response.includes("kualitas-add")){
            $("#kualitas-add").prop("checked", true);
        } else {
            $("#kualitas-add").prop("checked", false);
        }
        if(response.includes("kualitas-add")){
            $("#kualitas-add").prop("checked", true);
        } else {
            $("#kualitas-add").prop("checked", false);
        }
        if(response.includes("kualitas-update")){
            $("#kualitas-update").prop("checked", true);
        } else {
            $("#kualitas-update").prop("checked", false);
        }
        if(response.includes("kualitas-delete")){
            $("#kualitas-delete").prop("checked", true);
        } else {
            $("#kualitas-delete").prop("checked", false);
        }
        //sensor
        if(response.includes("sensor-index")){
            $("#sensor-index").prop("checked", true);
        } else {
            $("#sensor-index").prop("checked", false);
        }
        if(response.includes("sensor-add")){
            $("#sensor-add").prop("checked", true);
        } else {
            $("#sensor-add").prop("checked", false);
        }
        if(response.includes("sensor-add")){
            $("#sensor-add").prop("checked", true);
        } else {
            $("#sensor-add").prop("checked", false);
        }
        if(response.includes("sensor-update")){
            $("#sensor-update").prop("checked", true);
        } else {
            $("#sensor-update").prop("checked", false);
        }
        if(response.includes("sensor-delete")){
            $("#sensor-delete").prop("checked", true);
        } else {
            $("#sensor-delete").prop("checked", false);
        }
        //buku tamu
        if(response.includes("tsukamoto-index")){
            $("#tsukamoto-index").prop("checked", true);
        } else {
            $("#tsukamoto-index").prop("checked", false);
        }
        if(response.includes("tsukamoto-add")){
            $("#tsukamoto-add").prop("checked", true);
        } else {
            $("#tsukamoto-add").prop("checked", false);
        }
        if(response.includes("tsukamoto-update")){
            $("#tsukamoto-update").prop("checked", true);
        } else {
            $("#tsukamoto-update").prop("checked", false);
        }
        if(response.includes("tsukamoto-delete")){
            $("#tsukamoto-delete").prop("checked", true);
        } else {
            $("#tsukamoto-delete").prop("checked", false);
        }
        //rules
        if(response.includes("rules-index")){
            $("#rules-index").prop("checked", true);
        } else {
            $("#rules-index").prop("checked", false);
        }
        if(response.includes("rules-add")){
            $("#rules-add").prop("checked", true);
        } else {
            $("#rules-add").prop("checked", false);
        }
        if(response.includes("rules-update")){
            $("#rules-update").prop("checked", true);
        } else {
            $("#rules-update").prop("checked", false);
        }
        if(response.includes("rules-delete")){
            $("#rules-delete").prop("checked", true);
        } else {
            $("#rules-delete").prop("checked", false);
        }
        //proses
        if(response.includes("proses-index")){
            $("#proses-index").prop("checked", true);
        } else {
            $("#proses-index").prop("checked", false);
        }
        if(response.includes("proses-add")){
            $("#proses-add").prop("checked", true);
        } else {
            $("#proses-add").prop("checked", false);
        }
        if(response.includes("proses-update")){
            $("#proses-update").prop("checked", true);
        } else {
            $("#proses-update").prop("checked", false);
        }
        if(response.includes("proses-delete")){
            $("#proses-delete").prop("checked", true);
        } else {
            $("#proses-delete").prop("checked", false);
        }
        
        //user
        if(response.includes("user-index")){
            $("#user-index").prop("checked", true);
        } else {
            $("#user-index").prop("checked", false);
        }
        if(response.includes("user-add")){
            $("#user-add").prop("checked", true);
        } else {
            $("#user-add").prop("checked", false);
        }
        if(response.includes("user-edit")){
            $("#user-edit").prop("checked", true);
        } else {
            $("#user-edit").prop("checked", false);
        }
        if(response.includes("user-delete")){
            $("#user-delete").prop("checked", true);
        } else {
            $("#user-delete").prop("checked", false);
        }
        //role
        if(response.includes("role-index")){
            $("#role-index").prop("checked", true);
        } else {
            $("#role-index").prop("checked", false);
        }
        if(response.includes("role-add")){
            $("#role-add").prop("checked", true);
        } else {
            $("#role-add").prop("checked", false);
        }
        if(response.includes("role-edit")){
            $("#role-edit").prop("checked", true);
        } else {
            $("#role-edit").prop("checked", false);
        }
        if(response.includes("role-delete")){
            $("#role-delete").prop("checked", true);
        } else {
            $("#role-delete").prop("checked", false);
        }
        //profile
        if(response.includes("profile-index")){
            $("#profile-index").prop("checked", true);
        } else {
            $("#profile-index").prop("checked", false);
        }
        if(response.includes("profile-edit")){
            $("#profile-edit").prop("checked", true);
        } else {
            $("#profile-edit").prop("checked", false);
        }
    }
    function editData() {
    //CRM    
        //kualitas udara
        $('#kualitas-index').attr("onclick", "");
        $('#kualitas-add').attr("onclick", "");
        $('#kualitas-update').attr("onclick", "");
        $('#kualitas-delete').attr("onclick", "");
        //sensor
        $('#sensor-index').attr("onclick", "");
        $('#sensor-add').attr("onclick", "");
        $('#sensor-update').attr("onclick", "");
        $('#sensor-delete').attr("onclick", "");
        //buku tamu
        $("#tsukamoto-index").attr("onclick", "");
        $("#tsukamoto-add").attr("onclick", "");
        $("#tsukamoto-update").attr("onclick", "");
        $("#tsukamoto-delete").attr("onclick", "");
        //rules
        $("#rules-index").attr("onclick", "");
        $("#rules-add").attr("onclick", "");
        $("#rules-update").attr("onclick", "");
        $("#rules-delete").attr("onclick", "");
        //proses
        $("#proses-index").attr("onclick", "");
        $("#proses-add").attr("onclick", "");
        $("#proses-update").attr("onclick", "");
        $("#proses-delete").attr("onclick", "");
       

    //SETTINGS    
        //user
        $("#user-index").attr("onclick", "");
        $("#user-add").attr("onclick", "");
        $("#user-update").attr("onclick", "");
        $("#user-delete").attr("onclick", "");
        //role
        $("#role-index").attr("onclick", "");
        $("#role-add").attr("onclick", "");
        $("#role-update").attr("onclick", "");
        $("#role-delete").attr("onclick", "");
        //profile
        $("#profile-index").attr("onclick", "");
        $("#profile-edit").attr("onclick", "");

        //button
        $('.btn-save').show();
        $('.btn-cancel').show();
        $('.btn-edit').hide();
    }

    function resetToSavedData() { 
        event.preventDefault();
        $.ajax({
            url: "{{route('dashboard.user.permission.index')}}",
            type: "GET",
            data: {
                role: $("#role_id").val()
            },
            success: function(res){
                fillDetailData(res);
            }
        });
    }

</script>
@endsection
