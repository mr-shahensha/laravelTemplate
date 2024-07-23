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
                            <form method="post" action="{{ url('querySubmit') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>
                                            <b>
                                                <font color="#ed2618"></font>Source:
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" id="source" name="source"
                                            value="" placeholder="Type Here">
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
                                        <input type="text" class="form-control" id="consultant" name="consultant"
                                            value="" placeholder="Type Here">
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
                                        <input type="hidden" class="form-control" id="custId" name="custId"
                                            value="" placeholder="Type Here">
                                        <input type="text" class="form-control" id="custNm1" name="custNm"
                                            value="" placeholder="Type Here">

                                        <select name="" id="custNm2" class="form-control" size="1"
                                            tabindex="2" onchange="callCust(this.value)">
                                            <option value="">SELECT</option>
                                            @foreach ($csts as $cst)
                                                <option value="{{ $cst->custId }}">{{ $cst->custName }} (
                                                    {{ $cst->custId }} )</option>
                                            @endforeach
                                        </select>

                                        <span style="color:red;">
                                            @error('custNm')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <input type="checkbox" name="" id="chk" onclick="extc()"> Exsisting
                                        Customer ?
                                    </div>
                                    <div class="col-sm-3">
                                        <label>
                                            <b>
                                                <font color="#ed2618"></font>Contact No :
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" id="custNo1" name="custNo"
                                            value="" placeholder="Type Here">
                                        <input type="text" class="form-control" id="custNo2" name=""
                                            value="" placeholder="Type Here" readonly>
                                        <input type="hidden" class="form-control" id="exstCust" name="exstCust"
                                            value="" placeholder="Type Here" readonly>
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
                                        <input type="date" class="form-control" id="dt" name="dt"
                                            value="<?php echo date('Y-m-d'); ?>" placeholder="Type Here">
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
                                        <input type="text" class="form-control" id="projectTyp" name="projectTyp"
                                            value="" placeholder="Type Here">
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
                                        <textarea class="form-control" id="projectDtls" name="projectDtls" cols="30" rows="2"></textarea>

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
                                        <input type="text" class="form-control" id="cost" name="cost"
                                            value="" placeholder="Type Here">
                                        <span style="color:red;">
                                            @error('cost')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-sm-12" align="right">
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
                            <h6 class="m-0 font-weight-bold text-primary">Menu List</h6>
                        </div>
                        <div class="p-3">

                            @if (session()->has('alert2'))
                                <div class="alert alert-{{ session()->get('color2') }} alert-dismissible fade show"
                                    role="alert">
                                    {{ session()->get('alert2') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (count($qry) > 0)
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
                                        @foreach ($qry as $key => $qr)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>

                                                <td>{{ $qr->qryid }}</td>
                                                <td>{{ $qr->source }}</td>
                                                <td>{{ $qr->consultant }}</td>
                                                <td><b>Name : </b>
                                                    @if ($qr->exstCust == 0)
                                                        {{ $qr->custNm }}
                                                    @endif
                                                    @if ($qr->exstCust == 1)
                                                        {{ $qr->getCustomer->custName }}
                                                    @endif

                                                    <br>
                                                    <b>Contact No :</b>
                                                    @if ($qr->exstCust == 0)
                                                        {{ $qr->custNo }}
                                                    @endif
                                                    @if ($qr->exstCust == 1)
                                                        {{ $qr->getCustomer->custNumber }}
                                                    @endif
                                                    <br>
                                                    <b>Customer Type :</b>
                                                    @if ($qr->exstCust == 0)
                                                   New
                                                @endif
                                                @if ($qr->exstCust == 1)
                                                    Old
                                                @endif
                                                </td>
                                                <td>{{ $qr->dt }}</td>
                                                <td>
                                                    <b>Type : </b> {{ $qr->projectTyp }} <br>
                                                    <b>Details : </b> {{ $qr->projectDtls }} <br>
                                                    <b>Estimate Cost :</b> {{ $qr->cost }}
                                                </td>

                                                <td>
                                                    <a href="{{ url('queryEdit/' . base64_encode($qr->id)) }}"
                                                        class="btn btn-sm btn-primary"><i class="fas fa-edit"></i>
                                                        Edit</a>

                                                    {{-- @if ($qr->stat == 0)
                                                        <a href="{{ url('acdc/Query/qr.entry/1/' . $qr->id) }}"
                                                            title="Click to deactivate" class="btn btn-sm btn-success"><i
                                                                class="fas fa-check"></i>
                                                            Active</a>
                                                    @elseif ($qr->stat == 1)
                                                        <a href="{{ url('acdc/Query/qr.entry/0/' . $qr->id) }}"
                                                            class="btn btn-sm btn-warning" title="Click to activate"><i
                                                                class="fas fa-ban"></i> De-active</a>
                                                    @endif --}}
                                                    {{-- <a href="{{ url('delete/Query/qr.entry/' . $qr->id) }}"
                                                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
                                                        Delete</a> --}}
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
<script>
    function extc() {
        if (document.getElementById('chk').checked) {
            document.getElementById('custNm1').style.display = 'none';
            document.getElementById('custNo1').style.display = 'none';
            document.getElementById('custNm2_chosen').style.display = 'block';
            document.getElementById('custNo2').style.display = 'block';
            document.getElementById('exstCust').value = '1';
        } else {
            document.getElementById('custNm1').style.display = 'block';
            document.getElementById('custNm1').value = '';
            document.getElementById('custNo1').style.display = 'block';
            document.getElementById('custNo1').value = '';
            document.getElementById('custNm2_chosen').style.display = 'none';
            document.getElementById('custNo2').style.display = 'none';
            document.getElementById('exstCust').value = '0';

        }
    }
    window.onload = extc;


    function callCust(val) {
        document.getElementById('custNm1').value = "x";
        document.getElementById('custId').value = val;

        var custNm2 = document.getElementById('custNm2').value;

        $.get("{{ url('callCust') }}/" + custNm2, function(data) {

            var str = data;
            //var stra = str.split("")
            //var custNo2 = str.shift()
            // var mob = stra.shift()
            // var licno = stra.shift()

            // $('#dmob').val(mob);
            $('#custNo2').val(str);
            $('#custNo1').val(str);

        });
    }
</script>
