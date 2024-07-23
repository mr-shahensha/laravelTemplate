@extends('admin.layouts.main')
@section('main-container')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">Update Department</h1>

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header py-3 border-left-primary">
                            <h6 class="m-0 font-weight-bold text-primary ">Update Department</h6>
                        </div>
                        <div class="p-3">
                            <form method="post" action="{{ url('departmentEdits/'.$dept->id ) }}">
                                @csrf
                                <div class="form-group row">

                                    <div class="col-sm-1" align="right">
                                    </div>
                                    <div class="col-sm-8">
                                        <label>
                                            <b>
                                                <font color="#ed2618"></font>Department Name:
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" id="deptNm" name="deptNm" value="{{ $dept->deptNm }}"
                                            placeholder="Type Here">
                                        <span style="color:red;">
                                            @error('deptNm')
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

                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
