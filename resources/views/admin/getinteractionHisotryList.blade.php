<div class="card o-hidden border-0 shadow-lg my-5  ">

    <div class="card-body p-0">

        <div class="row">
            <div class="col-md-12">
                <div class="card-header py-3 border-left-primary">
                    <h6 class="m-0 font-weight-bold text-primary">Interaction Lists</h6>
                </div>
                <div class="p-3">

                    @if (count($qry) > 0)
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>QueryId</th>
                                    <th>Source</th>
                                    <th>Consultant</th>
                                    <th>Enquirer / Customer Details</th>
                                    <th>Project </th>
                                    <th>Interactions </th>
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
                                @foreach ($qry as $key => $qr)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>

                                        <td>{{ $qr->qryid }}</td>
                                        <td>{{ $qr->source }}</td>
                                        <td>{{ $qr->consultant }}</td>
                                        <td><b>Name : </b>         @if ($qr->exstCust == 0)
                                            {{ $qr->custNm }}
                                        @endif
                                        @if ($qr->exstCust == 1)
                                            {{ $qr->getCustomer->custName }}
                                        @endif<br>
                                            <b>Contact No :</b> {{ $qr->custNo }}
                                        </td>
                                        <?php
                                        $dateString = $qr['dt'];
                                        $date = new DateTime($dateString);

                                        $dt = $date->format('d F Y');
                                        ?>
                                        <td>
                                            <b>Date : </b>{{ $dt }} <br>
                                            <b>Type : </b> {{ $qr->projectTyp }} <br>
                                            <b>Details : </b> {{ $qr->projectDtls }} <br>
                                            <b>Estimate Cost :</b> {{ $qr->cost }}
                                        </td>
                                        <td><?php echo count($qr->getCount); ?> times</td>
                                        <td>
                                            <a onclick="acpt('{{ $qr->qryid }}')" class="btn btn-sm btn-success"><i
                                                    class="fas fa-check"></i>Project</a>
                                            <a href="{{ url('addInteraction/' . base64_encode($qr->qryid)) }}"
                                                class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Add Interaction
                                            </a>

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
                                            <a class="btn btn-sm btn-danger"><i class="fas fa-ban"></i> Reject</a>
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
