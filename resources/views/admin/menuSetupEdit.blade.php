@extends('admin.layouts.main')
@section('main-container')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">Update Menu</h1>

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header py-3 border-left-primary">
                            <h6 class="m-0 font-weight-bold text-primary ">Update Menu</h6>
                        </div>
                        <div class="p-3">

                            <form method="post" action="{{ url('menuSetupEdits/' . $editMenu->id) }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>
                                            <b>
                                                <font color="#ed2618">*</font>Tab name:
                                            </b>
                                        </label>
                                        {{-- @if ($editMenu->rootOrder == $menu->id)
                                        {{'selected'}}
                                     @endif --}}
                                        <select name="rootOrder" id="rootOrder" class="form-control ">
                                            <option value="">--Select--</option>
                                            <option value="0"
                                                @if ($editMenu->rootOrder == 0) {{ 'selected' }} @endif>Root</option>
                                            @foreach ($menus as $menu)
                                                <option value="{{ $menu->id }}"
                                                    @if ($editMenu->rootOrder == $menu->id) {{ 'selected' }} @endif>
                                                    {{ $menu->menuName }}</option>
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
                                            value="{{ $editMenu->menuName }}" placeholder="Type Here">
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
                                            value="{{ $editMenu->pageUrl }}" placeholder="Type Here">
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
                                            value="{{ $editMenu->menuOrder }}" placeholder="Type Here">
                                        <span style="color:red;">
                                            @error('menuOrder')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12" align="right">
                                        <input type="submit" value="UPDATE" class="btn btn-success btn-md">
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
