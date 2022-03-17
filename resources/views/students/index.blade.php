@extends('layouts.master')
@section('content')
    <div class="card-body">
        <div class="py-2">
            <div class="btn-group btn-group-sm">
                <a href="javascript:void(0)" class="btn btn-primary text-white" data-bs-toggle="modal"
                    data-bs-target=".modal-add"> <i class="fas fa-plus"></i> add new</a>
                <a href="#" class="btn btn-secondary text-white"> delete all data <i class="fa-solid fa-bolt"></i></a>
            </div>
        </div>
        <div class="overflow-auto" style=" height:760px !important">
            <table id="example1" class="table  table-hover table-bordered  table-fixed-a">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>FULL NAME</th>
                        <th>DOB</th>
                        <th>FROM</th>
                        <th>REGISTER DATE</th>
                        <th>SCHOOL </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody class="">
                    {{-- data here --}}
                </tbody>
            </table>
        </div>
        {{-- Add --}}
        <div class=" modal modal-add fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Student </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addform">
                            @csrf
                            <div class="mb-2 row">
                                <div class="col-6">
                                    <label for="recipient-name" class="col-form-label">Full Name</label>
                                    <input type="text" class="form-control" name="s_name" id="s_name">
                                </div>
                                <div class=" col-6">
                                    <label for="recipient-name" class="col-form-label">DOB</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="date" class="form-control datetimepicker-input"
                                            data-target="#reservationdate" name="s_dob" id="s_dob">
                                    </div>
                                </div>

                            </div>
                            <div class="mb-2 row">
                                <div class="col-6">
                                    <label for="recipient-name" class="col-form-label">School Name </label>
                                    <input type="text" class="form-control" name="s_school_name" id="s_school_name">
                                </div>
                                <div class="col-6">
                                    <label for="recipient-name" class="col-form-label">Register Date</label>
                                    <input type="date" class="form-control" name="s_register_date" id="s_register_date">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">FROM</label>
                                <textarea class="form-control" id="s_from" name="s_from"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        {{-- Edit --}}

        <div class=" modal modal-edit fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Student </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editform">
                            @csrf
                            <div class="mb-2 row">
                                <input type="hidden" id="id" class="" name="s_id">
                                <div class="col-6">
                                    <label for="recipient-name" class="col-form-label">Full Name</label>
                                    <input type="text" class="form-control" name="s_name" id="es_name">
                                </div>
                                <div class=" col-6">
                                    <label for="recipient-name" class="col-form-label">DOB</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="date" class="form-control datetimepicker-input"
                                            data-target="#reservationdate" name="s_dob" id="es_dob">
                                    </div>
                                </div>

                            </div>
                            <div class="mb-2 row">
                                <div class="col-6">
                                    <label for="recipient-name" class="col-form-label">School Name </label>
                                    <input type="text" class="form-control" name="s_school_name" id="es_school_name">
                                </div>
                                <div class="col-6">
                                    <label for="recipient-name" class="col-form-label">Register Date</label>
                                    <input type="date" class="form-control" name="s_register_date" id="es_register_date">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">FROM</label>
                                <textarea class="form-control" name="s_from" id="es_from"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"
                                    aria-label="Close">Save </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <style>
            .table-hover tbody tr:hover {
                color: #212529;
                background-color: rgba(0, 0, 0, .005) !important;
            }

            .table-fixed-a thead {
                position: sticky;
                top: 0;
                background: rgb(219, 219, 219) !important;
                opacity: 1;
            }

        </style>
    @endsection
    @section('scripts')
        <script type="text/javascript">
            getAllStudent();

            function getAllStudent() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('student.get') }}",
                    type: "GET",
                    dataType: 'json',
                    success: function(response) {
                        $("tbody").html("");
                        $.each(response.student, function(key, row) {
                            let i = key + 1;
                            $("tbody").append(
                            '<tr >\
                            <td>' +i+'</td>\
                            <td>' +row.s_name +'</td>\
                            <td>' +row.s_dob +'</td>\
                            <td>' +row.s_from +'</td>\
                            <td>' +row.s_register_date +'</td>\
                            <td>' +row.s_school_name +'</td>\
                            <td style=" width:120px">\
                                <div class="d-flex justify-conent-center align-items-center  ">\
                                    <div class="btn-group btn-group-sm">\
                                        <button type="button" class="btn btn-outline-secondary btn-xs "  onclick="cloneStudent('+row.s_id +')"><i class="fa-solid fa-copy "></i></button>\
                                        <button type="button" class="btn btn-outline-primary btn-xs " data-bs-toggle="modal" data-bs-target=".modal-edit" onclick="editStudent('+row.s_id +')"><i class="fa-solid fa-sliders "></i></button>\
                                        <button type="button" class="btn btn-outline-danger btn-xs "onclick="deleteStudent(' +row.s_id +')" "><i class="fa-solid fa-trash "></i>  </button>\
                                </div>\
                                </div>\
                                </td>\
                            </tr>\
                            ')
                        })
                    }
                })
            }

            function editStudent(id) {
                $.get('/student_id/'+id, function(st){
                    console.log(st);
                    $("#id").val(st.s_id);
                    $("#es_name").val(st.s_name);
                    $("#es_dob").val(st.s_dob);
                    $("#es_from").val(st.s_from);
                    $("#es_register_date").val(st.s_register_date);
                    $("#es_school_name").val(st.s_school_name);
                });
            };
            $("#editform").submit(function(e) {
                e.preventDefault();
                let s_id = $("#id").val();
                let s_name = $("#es_name").val();
                let s_dob = $("#es_dob").val();
                let s_from = $("#es_from").val();
                let s_register_date = $("#es_register_date").val();
                let s_school_name = $("#es_school_name").val();
                let _token = $("input[name=_token ]").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('student.update') }}",
                    type: "PUT",
                    data: {
                        s_id: s_id,
                        s_name: s_name,
                        s_dob: s_dob,
                        s_from: s_from,
                        s_register_date: s_register_date,
                        s_school_name: s_school_name,
                        _token: _token,
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#editform')[0].reset();
                    }
                })
                getAllStudent();
            });
            $("#addform").submit(function(e) {
                e.preventDefault();
                let s_name = $("#s_name").val();
                let s_dob = $("#s_dob").val();
                let s_from = $("#s_from").val();
                let s_register_date = $("#s_register_date").val();
                let s_school_name = $("#s_school_name").val();
                let _token = $("input[name=_token ]").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('student.add') }}",
                    type: "POST",
                    data: {
                        s_name: s_name,
                        s_dob: s_dob,
                        s_from: s_from,
                        s_register_date: s_register_date,
                        s_school_name: s_school_name,
                        _token: _token,
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#addform')[0].reset();
                        $('#addModal').removeClass('show');
                        $('.modal-backdrop').removeClass('show');
                    }
                })
                getAllStudent();
            });

            function deleteStudent(id) {
                alert("You will lost this record  👻 id = " + id);
                let ID = id;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/delete_student/" + ID,
                    type: "DELETE",
                    dataType: 'json',
                    success: function(response) {}
                })
                getAllStudent();

            };
            function cloneStudent(id) {
                let ID = id;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/clone_student/" + ID,
                    type: "PUT",
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                    }
                })
                getAllStudent();
            };
        </script>
    @endsection
