@extends('admin.layouts.main')
@section('main-container')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">Interaction History</h1>

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header py-3 border-left-primary">
                            <h6 class="m-0 font-weight-bold text-primary ">Search Department</h6>
                        </div>


                        <div class="p-3">
                            <div class="form-group row">


                                <div class="col-sm-6">
                                    <label>
                                        <b>
                                            <font color="#ed2618">*</font>Search:
                                        </b>
                                    </label>
                                    <input type="text" class="form-control" id="srch" name="srch"
                                        placeholder="Type Here">
                                    <span style="color:red;">
                                        @error('deptNm')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-sm-2">
                                    <label>
                                        <b>
                                            <font color="#ed2618">*</font>From Date:
                                        </b>
                                    </label>
                                    <input type="date" class="form-control" id="fdt" name="fdt"
                                        value="<?php echo date('Y-m-01'); ?>" placeholder="Type Here">
                                    <span style="color:red;">
                                        @error('deptNm')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-sm-2">
                                    <label>
                                        <b>
                                            <font color="#ed2618">*</font>To Date:
                                        </b>
                                    </label>
                                    <input type="date" class="form-control" id="tdt" name="tdt"
                                        value="<?php echo date('Y-m-d'); ?>" placeholder="Type Here">
                                    <span style="color:red;">
                                        @error('deptNm')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="col-sm-2">
                                    <br>
                                    <input type="submit" value="SEARCH" class="btn btn-success btn-md" onclick="srch()">
                                </div>

                            </div>


                            @if (session()->has('alert'))
                                <div class="alert alert-{{ session()->get('color') }} alert-dismissible fade show"
                                    role="alert">
                                    {{ session()->get('alert') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="show">

        </div>


    </div>
    <script>
        function srch() {
            var srch = encodeURI(document.getElementById('srch').value);
            var fdt = document.getElementById('fdt').value;
            var tdt = document.getElementById('tdt').value;
            $('#show').load("{{ url('/getinteractionHisotryList') }}?srch=" + srch + "&tdt=" + tdt + "&fdt=" + fdt).fadeIn(
                'fast');
        }
        window.onload = srch;

        function acpt(qryId) {
            //if (confirm('Are you sure ?') == true) {
            //$('#show').load("{{ url('/createProjectAndCustomer') }}?qryId=" + qryId).fadeIn('fast');

            // }



            swal("Accept this as project ?", {
                    buttons: ["Cancel", "Accept"],
                })
                .then((value) => {
                    if (value) {
                        $('#show').load("{{ url('/createProjectAndCustomer') }}?qryId=" + qryId).fadeIn('fast');
                    }
                });

        }
    </script>
@endsection
