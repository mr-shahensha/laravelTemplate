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
                            <form method="post" action="{{ url('userSubmit') }}">
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
                                                    <option value="{{ $dept['id'] }}">{{ $dept['deptNm'] }}</option>
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
                                        <input type="text" name="name" id="name" class="form-control" required>
                                        <span style="color:red;">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-sm-3" align="left">
                                        <br>
                                        <input type="submit" value="CREATE" class="btn btn-primary btn-md">
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
        <div class="card o-hidden border-0 shadow-lg my-5  ">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header py-3 border-left-primary">
                            <h6 class="m-0 font-weight-bold text-primary">Designation List</h6>
                        </div>
                        <div class="p-3">


                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Departments</th>
                                        <th>Designation</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (session()->has('alert2'))
                                    <div class="alert alert-{{ session()->get('color2') }} alert-dismissible fade show"  role="alert">
                                        {{session()->get('alert2')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                    </div>
                                @endif
                                @foreach ( $users as $key=>$user)

                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $user->getDepartment->deptNm }}</td>
                                    <td>{{ $user->getDesignation->desigNm }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <a href="{{ url('userEdit/' . base64_encode($user->id)) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i>Edit</a>
                                        @if ($user->stat == 0)
                                            <a href="{{ url('acdc/User/user.entry/1/' . $user->id ) }}"
                                                title="Click to deactivate" class="btn btn-sm btn-success"><i
                                                    class="fas fa-check"></i>
                                                Active</a>
                                        @elseif ($user->stat == 1)
                                            <a href="{{ url('acdc/User/user.entry/0/' . $user->id) }}"
                                                class="btn btn-sm btn-warning" title="Click to activate"><i
                                                    class="fas fa-ban"></i> De-active</a>
                                        @endif
                                        <a href="{{ url('delete/User/user.entry/' . $user->id) }}"
                                            class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                @endforeach


                                </tbody>
                            </table>

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
                            text: desg.desigNm
                        }));
                    });
                });
            }
        </script>


    </div>
@endsection

