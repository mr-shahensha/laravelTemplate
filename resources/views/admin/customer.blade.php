@extends('admin.layouts.main')
@section('main-container')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">Customer</h1>

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header py-3 border-left-primary">
                            <h6 class="m-0 font-weight-bold text-primary ">Search Customer</h6>
                        </div>


                        <div class="p-3">

                            <div class="form-group row">

                                <div class="col-sm-1" align="right">
                                </div>
                                <div class="col-sm-8">
                                    <label>
                                        <b>
                                            <font color="#ed2618"></font>Search Here:
                                        </b>
                                    </label>
                                    <input type="text" class="form-control" id="srch" name="srch" placeholder="Type Here">
                                </div>

                                <div class="col-sm-3" align="left">
                                    <br>
                                    <input type="button" value="SEARCH" class="btn btn-success btn-md" onclick="search()">
                                </div>

                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="show">

        </div>


    </div>
@endsection
<script>
    function search(){
        var srch=encodeURI(document.getElementById('srch').value);
        $('#show').load("{{ url('customerList') }}?srch="+srch).fadeIn('fast');
    }
    window,onload=search;
</script>
