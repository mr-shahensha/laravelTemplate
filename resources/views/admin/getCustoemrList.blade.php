<div class="card o-hidden border-0 shadow-lg my-5  ">

    <div class="card-body p-0">

        <div class="row">
            <div class="col-md-12">
                <div class="card-header py-3 border-left-primary">
                    <h6 class="m-0 font-weight-bold text-primary">Customer Lists</h6>
                </div>
                <div class="p-3">

                    @if (count($custs) > 0)
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Customer Id</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Kyc</th>
                                    <th>Address</th>
                                    <th>Company</th>
                                    <th>Customer Since</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (session()->has('alert2'))
                                    <div class="alert alert-{{ session()->get('color2') }} alert-dismissible fade show"
                                        role="alert">
                                        {{ session()->get('alert2') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @foreach ($custs as $key => $cust)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>

                                        <td>{{ $cust->custId }}</td>
                                        <td>{{ $cust->custName }}</td>
                                        <td>{{ $cust->custNumber }}</td>
                                        <td> Details : {{ $cust->custKycDtl }} <br> No : {{ $cust->custKycNo }}</td>
                                        <td>{{ $cust->custAdress }}</td>
                                        <td>{{ $cust->custCompany }}</td>
                                        <?php
                                        $dateString = $cust['edt'];
                                        $date = new DateTime($dateString);

                                        $dt = $date->format('d F Y');
                                        ?>
                                        <td>{{ $dt }}</td>


                                        <td>
                                            <a href="{{ url('customerEdit/' . base64_encode($cust->custId)) }}"
                                                class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit
                                            </a>
                                            @if ($cust->stat == 0)
                                            <a href="{{ url('acdc/Customer/Customer.entry/1/' . $cust->id ) }}"
                                                title="Click to deactivate" class="btn btn-sm btn-success"><i
                                                    class="fas fa-check"></i>
                                                Active</a>
                                        @elseif ($cust->stat == 1)
                                            <a href="{{ url('acdc/Customer/Customer.entry/0/' . $cust->id) }}"
                                                class="btn btn-sm btn-warning" title="Click to activate"><i
                                                    class="fas fa-ban"></i> De-active</a>
                                        @endif                                        </td>
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
