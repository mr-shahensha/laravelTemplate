@extends('admin.layouts.main')
@section('main-container')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">Create Query</h1>

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header py-3 border-left-primary">
                            <h6 class="m-0 font-weight-bold text-primary ">Create Query</h6>
                        </div>
                        <div class="p-3">
                            <form method="post" action="{{ url('queryEdits/'.$qry->id) }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>
                                            <b>
                                                <font color="#ed2618"></font>Source:
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" id="source" name="source" value="{{ $qry->source }}"
                                            placeholder="Type Here">
                                        <span style="color:red;">
                                            @error('source')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>
                                            <b>
                                                <font color="#ed2618"></font>Consultant:
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" id="consultant" name="consultant" value="{{ $qry->consultant }}"
                                            placeholder="Type Here">
                                        <span style="color:red;">
                                            @error('consultant')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>
                                            <b>
                                                <font color="#ed2618"></font>Enquirer / Customer :
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" id="custNm" name="custNm" value="{{ $qry->custNm }}"
                                            placeholder="Type Here">
                                        <span style="color:red;">
                                            @error('custNm')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>
                                            <b>
                                                <font color="#ed2618"></font>Contact No  :
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" id="custNo" name="custNo" value="{{ $qry->custNo }}"
                                            placeholder="Type Here">
                                        <span style="color:red;">
                                            @error('custNo')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-3">
                                    <br>
                                        <label>
                                            <b>
                                                <font color="#ed2618"></font>Date :
                                            </b>
                                        </label>
                                        <input type="date" class="form-control" id="dt" name="dt" value="{{ $qry->dt }}"
                                            placeholder="Type Here">
                                        <span style="color:red;">
                                            @error('dt')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-3">
                                        <br>
                                        <label>
                                            <b>
                                                <font color="#ed2618"></font>Project Type :
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" id="projectTyp" name="projectTyp" value="{{ $qry->projectTyp }}"
                                            placeholder="Type Here">
                                        <span style="color:red;">
                                            @error('projectTyp')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-3">
                                        <br>
                                        <label>
                                            <b>
                                                <font color="#ed2618"></font>Project Details :
                                            </b>
                                        </label>
                                        <textarea  class="form-control" id="projectDtls" name="projectDtls" cols="30" rows="2">{{ $qry->projectDtls }}</textarea>

                                        <span style="color:red;">
                                            @error('projectDtls')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-3">
                                        <br>
                                        <label>
                                            <b>
                                                <font color="#ed2618"></font>Estimate Cost :
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" id="cost" name="cost" value="{{ $qry->cost }}"
                                            placeholder="Type Here">
                                        <span style="color:red;">
                                            @error('cost')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-sm-12" align="right">
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



    </div>
@endsection
