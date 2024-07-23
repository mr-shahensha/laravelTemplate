@extends('admin.layouts.main')
@section('main-container')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">Add Interaction</h1>

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header py-3 border-left-primary">
                            <h6 class="m-0 font-weight-bold text-primary ">Original Query [ {{ $qry->qryid }} ]</h6>
                        </div>
                        <div class="p-3">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label>
                                        <b>
                                            <font color="#ed2618"></font>Source:
                                        </b>
                                    </label>
                                    <h4> {{ $qry->source }}</h4>
                                </div>
                                <div class="col-sm-3">
                                    <label>
                                        <b>
                                            <font color="#ed2618"></font>Consultant:
                                        </b>
                                    </label>
                                    <h4> {{ $qry->consultant }}</h4>

                                </div>
                                <div class="col-sm-3">
                                    <label>
                                        <b>
                                            <font color="#ed2618"></font>Enquirer / Customer :
                                        </b>
                                    </label>
                                    <h4> {{ $qry->custNm }}</h4>


                                </div>
                                <div class="col-sm-3">
                                    <label>
                                        <b>
                                            <font color="#ed2618"></font>Contact No :
                                        </b>
                                    </label>
                                    <h4> {{ $qry->custNo }}</h4>

                                </div>
                                <div class="col-sm-3">
                                    <br>
                                    <label>
                                        <b>
                                            <font color="#ed2618"></font>Date :
                                        </b>
                                    </label>
                                    <?php
                                    $dateString = $qry['dt'];
                                    $date = new DateTime($dateString);

                                    $dt = $date->format('d F Y');
                                    ?>
                                    <h4> {{ $dt }}</h4>

                                </div>
                                <div class="col-sm-3">
                                    <br>
                                    <label>
                                        <b>
                                            <font color="#ed2618"></font>Project Type :
                                        </b>
                                    </label>
                                    <h4> {{ $qry->projectTyp }}</h4>

                                </div>
                                <div class="col-sm-3">
                                    <br>
                                    <label>
                                        <b>
                                            <font color="#ed2618"></font>Project Details :
                                        </b>
                                    </label>
                                    <h4> {{ $qry->projectDtls }}</h4>

                                </div>
                                <div class="col-sm-3">
                                    <br>
                                    <label>
                                        <b>
                                            <font color="#ed2618"></font>Estimate Cost :
                                        </b>
                                    </label>
                                    <h4> {{ $qry->cost }}</h4>

                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header py-3 border-left-primary">
                            <h6 class="m-0 font-weight-bold text-primary ">Add New Interaction</h6>
                        </div>
                        <div class="p-3">
                            <form method="post" action="{{ url('addInteractions/' . $qry->qryid) }}">
                                @csrf
                                <div class="form-group row">


                                    <div class="col-sm-4">

                                        <label>
                                            <b>
                                                <font color="#ed2618"></font>Date :
                                            </b>
                                        </label>
                                        <input type="date" class="form-control" id="dt" name="dt"
                                            value="<?php echo date('Y-m-d'); ?>" placeholder="Type Here">
                                        <span style="color:red;">
                                            @error('dt')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>
                                            <b>
                                                <font color="#ed2618"></font>Consultant:
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" id="consultant" name="consultant"
                                            value="" placeholder="Type Here">
                                        <span style="color:red;">
                                            @error('consultant')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-sm-4">
                                        <label>
                                            <b>
                                                <font color="#ed2618"></font>Revised Cost :
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" id="cost" name="cost"
                                            value="" placeholder="Type Here">
                                        <span style="color:red;">
                                            @error('cost')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <br>
                                        <label>
                                            <b>
                                                <font color="#ed2618"></font>Revised Project Details :
                                            </b>
                                        </label>
                                        <textarea class="form-control" id="projectDtls" name="projectDtls" cols="30" rows="2"></textarea>

                                        <span style="color:red;">
                                            @error('projectDtls')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-sm-6">
                                        <br>
                                        <label>
                                            <b>
                                                <font color="#ed2618"></font>Project Note :
                                            </b>
                                        </label>
                                        <textarea class="form-control" id="projectNote" name="projectNote" cols="30" rows="2"></textarea>

                                        <span style="color:red;">
                                            @error('projectNote')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-sm-12" align="right">
                                        <br>
                                        <input type="submit" value="ADD" class="btn btn-primary btn-md">
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
                            <h6 class="m-0 font-weight-bold text-primary">Interaction List</h6>
                        </div>
                        <div class="p-3">

                            @if (count($ints) > 0)
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>QueryId</th>
                                            <th>Source</th>
                                            <th>Consultant</th>
                                            <th>Enquirer / Customer Details</th>
                                            <th>Date </th>
                                            <th>Project </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (session()->has('alert2'))
                                            <div class="alert alert-{{ session()->get('color2') }} alert-dismissible fade show"
                                                role="alert">
                                                {{ session()->get('alert2') }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif

                                        @foreach ($ints as $key => $int)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>

                                                <td>{{ $int->qryid }}</td>
                                                <td>{{ $int->source }}</td>
                                                <td>{{ $int->consultant }}</td>
                                                <td><b>Name : </b> {{ $int->custNm }}<br>
                                                    <b>Contact No :</b> {{ $int->custNo }}
                                                </td>
                                                <td>{{ $int->dt }}</td>
                                                <td>
                                                    <b>Type : </b> {{ $int->projectTyp }} <br>
                                                    <b>Details : </b> {{ $int->projectDtls }} <br>
                                                    <b>Estimate Cost :</b> {{ $int->cost }}
                                                </td>

                                                <td>

                                                    <a href="{{ url('deleteInt/' . $int->qryid) }}"
                                                        class="btn btn-sm btn-danger"><i class="fas fa-ban"></i>
                                                        Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            @else
                                <Span style="color:red;">No data found</Span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

@endsection
