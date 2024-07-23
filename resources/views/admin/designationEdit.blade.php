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
                            <form method="post" action="{{ url('designationEdits/'.$desgs->id) }}">
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
                                            @if(isset($depts))
                                            @foreach ($depts as $dept)
                                            <option value="{{ $dept['id'] }}" @if($dept['id']==$desgs->deptNm)
                                                {{ 'selected' }}
                                            @endif>{{ $dept['deptNm'] }}</option>
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
                                        <input type="text" class="form-control" id="desigNm" name="desigNm" value="{{ $desgs->desigNm }}"
                                            placeholder="Type Here">
                                        <span style="color:red;">
                                            @error('desigNm')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-sm-2" align="left">
                                        <br>
                                        <input type="submit" value="UPDATE" class="btn btn-primary btn-md">
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




    </div>
@endsection
