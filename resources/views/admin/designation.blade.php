@extends('admin.layouts.main')
{{-- chosen --}}

<link rel="stylesheet" href="{{ url('admin/css/chosen.css') }}">
@section('main-container')

    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">Designation Setup</h1>

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header py-3 border-left-primary">
                            <h6 class="m-0 font-weight-bold text-primary ">Create Designation</h6>
                        </div>
                        <?php

                        ?>
                        <div class="p-3">
                            <form method="post" action="{{ url('designationSubmit') }}">
                                @csrf
                                <div class="form-group row">

                                    <div class="col-sm-4">
                                        <label>
                                            <b>
                                                <font color="#ed2618">*</font>Department Name:
                                            </b>
                                        </label>
                                        <select name="deptNm" id="deptNm"  class="form-control" >
                                            <option value="">--Select--</option>
                                            @if(isset($dept))
                                            @foreach ($dept as $deptS)
                                            <option value="{{ $deptS['id'] }}">{{ $deptS['deptNm'] }}</option>
                                        @endforeach
                                        @endif
                                        </select>
                                        <span style="color:red;">
                                            @error('deptNm')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>
                                            <b>
                                                <font color="#ed2618">*</font>Designation Name:
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" id="desigNm" name="desigNm"
                                            placeholder="Type Here">
                                        <span style="color:red;">
                                            @error('desigNm')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-sm-2" align="left">
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
                            <h6 class="m-0 font-weight-bold text-primary">Designation List</h6>
                        </div>
                        <div class="p-3">


                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Departments</th>
                                        <th>Designation</th>
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
                                    @foreach ($desg as $key=> $des)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $des->getDepartment->deptNm }}</td>
                                            <td>{{ $des->desigNm }}</td>
                                            <td>
                                                <a href="{{ url('designationEdit/' . base64_encode($des->id)) }}"
                                                    class="btn btn-sm btn-primary"><i class="fas fa-edit"></i>Edit</a>
                                                @if ($des->stat == 0)
                                                    <a href="{{ url('acdc/Designation/designation.entry/1/' . $des->id ) }}"
                                                        title="Click to deactivate" class="btn btn-sm btn-success"><i
                                                            class="fas fa-check"></i>
                                                        Active</a>
                                                @elseif ($des->stat == 1)
                                                    <a href="{{ url('acdc/Designation/designation.entry/0/' . $des->id) }}"
                                                        class="btn btn-sm btn-warning" title="Click to activate"><i
                                                            class="fas fa-ban"></i> De-active</a>
                                                @endif
                                                <a href="{{ url('delete/Designation/designation.entry/' . $des->id) }}"
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
