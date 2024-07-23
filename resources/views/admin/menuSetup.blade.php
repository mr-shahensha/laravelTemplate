@extends('admin.layouts.main')
@section('main-container')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">Menu Setup</h1>

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header py-3 border-left-primary">
                            <h6 class="m-0 font-weight-bold text-primary ">Create Menu</h6>
                        </div>
                        <div class="p-3">
                            <form method="post" action="{{ url('menuSubmit') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>
                                            <b>
                                                <font color="#ed2618">*</font>Tab name:
                                            </b>
                                        </label>
                                        <select name="rootOrder" id="rootOrder" class="form-control " required>
                                            <option value="">--Select--</option>
                                            <option value="0">Root</option>
                                            @foreach ($menus as $menu)
                                                <option value="{{ $menu->id }}">{{ $menu->menuName }}</option>
                                            @endforeach
                                        </select>
                                        <span style="color:red;">
                                            @error('rootOrder')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>
                                            <b>
                                                <font color="#ed2618">*</font>Menu Name:
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" id="menuName" name="menuName"
                                            placeholder="Type Here" required>
                                        <span style="color:red;">
                                            @error('menuName')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>
                                            <b>
                                                <font color="#ed2618"></font>Page Name:
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" id="pageUrl" name="pageUrl"
                                            placeholder="Type Here">
                                        <span style="color:red;">
                                            @error('pageUrl')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>
                                            <b>
                                                <font color="#ed2618"></font>Order:
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" id="menuOrder" name="menuOrder"
                                            placeholder="Type Here">
                                        <span style="color:red;">
                                            @error('menuOrder')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12" align="right">
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

                            @if (count($menus) != '')
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Tab name</th>
                                            <th>Menu Name</th>
                                            <th>Page Name</th>
                                            <th>Order</th>
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
                                        @foreach ($menus as $key => $menu)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    @if ($menu->getMenu)
                                                        {{ $menu->getMenu->menuName }}
                                                    @endif
                                                </td>
                                                <td>{{ $menu->menuName }}</td>
                                                <td>{{ $menu->pageUrl }}</td>
                                                <td>{{ $menu->menuOrder }}</td>
                                                <td>
                                                    <a href="" class="btn btn-sm btn-info" data-toggle="modal"
                                                        data-target="#assignModal" onclick=""><i class="fas fa-male"></i> Assign</a>
                                                    <a href="{{ url('menuSetupEdit/' . base64_encode($menu->id)) }}"
                                                        class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>

                                                    @if ($menu->stat == 0)
                                                        <a href="{{ url('acdc/Menu/menu.entry/1/' . $menu->id) }}"
                                                            title="Click to deactivate" class="btn btn-sm btn-success"><i
                                                                class="fas fa-check"></i>
                                                            Active</a>
                                                    @elseif ($menu->stat == 1)
                                                        <a href="{{ url('acdc/Menu/menu.entry/0/' . $menu->id) }}"
                                                            class="btn btn-sm btn-warning" title="Click to activate"><i
                                                                class="fas fa-ban"></i> De-active</a>
                                                    @endif
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

        <div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Assign Member</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="post" action="{{ url('menuAssign') }}">
                        <div class="modal-body">
                            <select id="user" name="user[]" class="form-control select2" style="width:100%"
                                multiple required>

                                @foreach ($userTypes as $userType)
                                    <option value="{{ $userType['lvl'] }}">{{ $userType['typ'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <input class="btn btn-primary" type="submit" value="Assign">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
