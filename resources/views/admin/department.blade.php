@extends('admin.layouts.main')
@section('main-container')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">Department Setup</h1>

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header py-3 border-left-primary">
                            <h6 class="m-0 font-weight-bold text-primary ">Create Department</h6>
                        </div>


                        <div class="p-3">
                            <form method="post" action="{{ url('departmentSubmit') }}">
                                @csrf
                                <div class="form-group row">

                                    <div class="col-sm-1" align="right">
                                    </div>
                                    <div class="col-sm-8">
                                        <label>
                                            <b>
                                                <font color="#ed2618">*</font>Department Name:
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" id="deptNm" name="deptNm"
                                            placeholder="Type Here">
                                        <span style="color:red;">
                                            @error('deptNm')
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
                                <div class="alert alert-{{ session()->get('color') }} alert-dismissible fade show"  role="alert">
                                    {{session()->get('alert')}}
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
                            <h6 class="m-0 font-weight-bold text-primary">Department List</h6>
                        </div>
                        <div class="p-3">


                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Departments</th>
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
                                    @foreach ($depts as $key => $dept)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $dept->deptNm }}</td>
                                            <td>
                                                <a href="{{ url('departmentEdit/' . base64_encode($dept->id)) }}"
                                                    class="btn btn-sm btn-primary"><i class="fas fa-edit"></i>Edit</a>
                                                @if ($dept->stat == 0)
                                                    <a href="{{ url('acdc/Department/department.entry/1/' . $dept->id ) }}"
                                                        title="Click to deactivate" class="btn btn-sm btn-success"><i
                                                            class="fas fa-check"></i>
                                                        Active</a>
                                                @elseif ($dept->stat == 1)
                                                    <a href="{{ url('acdc/Department/department.entry/0/' . $dept->id) }}"
                                                        class="btn btn-sm btn-warning" title="Click to activate"><i
                                                            class="fas fa-ban"></i> De-active</a>
                                                @endif
                                                <a href="{{ url('delete/Department/department.entry/' . $dept->id) }}"
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


    </div>
@endsection
