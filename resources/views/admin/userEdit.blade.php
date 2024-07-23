@extends('admin.layouts.main')
@section('main-container')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">User Setup</h1>

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header py-3 border-left-primary">
                            <h6 class="m-0 font-weight-bold text-primary ">Create User</h6>
                        </div>


                        <div class="p-3">
                            <form method="post" action="{{ url('userEdits/'.$users->username) }}">
                                @csrf
                                <div class="form-group row">

                                    <div class="col-sm-3">
                                        <label>
                                            <b>
                                                <font color="#ed2618">*</font>Department Name:
                                            </b>
                                        </label>
                                        <select name="deptNm" id="deptNm" class="form-control" onchange="getDes()"
                                            required>
                                            <option value="">--Select--</option>
                                            @if (isset($depts))
                                                @foreach ($depts as $dept)
                                                    <option value="{{ $dept['id'] }}"
                                                        @if($dept['id'] == $users->deptNm) {{ 'selected' }} @endif>
                                                        {{ $dept['deptNm'] }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span style="color:red;">
                                            @error('deptNm')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>
                                            <b>
                                                <font color="#ed2618">*</font>Designation Name:
                                            </b>
                                        </label>
                                        <div id="show">
                                            <select name="desigNm" id="desigNm" class="form-control" required>
                                                <option value="">--Select--</option>
                                                @if (isset($users))
                                                    @foreach ($Designation as $dept)
                                                        <option value="{{ $dept['id'] }}" @if ($dept['id'] == $users->desigNm) selected @endif>{{ $dept['desigNm'] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <span style="color:red;">
                                                @error('desigNm')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>
                                            <b>
                                                <font color="#ed2618">*</font>Name:
                                            </b>
                                        </label>
                                        <input type="text" name="name" id="name" class="form-control" required
                                            value="{{ $users->name }}">
                                        <span style="color:red;">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-sm-3" align="left">
                                        <br>
                                        <input type="submit" value="UPDATE" class="btn btn-primary btn-md">
                                    </div>

                                </div>

                            </form>
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

        <script>

            function getDes() {

                var deptNm = document.getElementById('deptNm').value;
                $.get("{{ url('getDesig') }}/" + deptNm, function(data) {
                    $('#desigNm').empty();
                    $('#desigNm').append($('<option>', {
                        value: '',
                        text: '--Select--'
                    }));
                    $.each(data, function(index, desg) {
                        $('#desigNm').append($('<option>', {
                            value: desg.id,
                            text: desg.desigNm,
                        }));
                    });
                });
            }
        </script>


    </div>
@endsection
{{-- chosen --}}

<script src="{{ url('admin/js/chosen.jquery.js') }}" type="text/javascript"></script>
<script src="{{ url('admin/js/prism.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ url('admin/js/select2.full.min.js') }}"></script>
