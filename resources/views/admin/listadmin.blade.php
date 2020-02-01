@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">List Admin</h1>
@stop

@section('content')

    <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            @foreach ($users as $row)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                    Data Admin
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                    <div class="col-7">
                        <h2 class="lead"><b>{{$row->name}}</b></h2>
                        <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                        </ul>
                    </div>
                    <div class="col-5 text-center">
                        <img src="../../dist/img/user2-160x160.jpg" alt="" class="img-circle img-fluid">
                    </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> View Profile
                    </a>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
            <a >
            <a class="nav-link btn btn-primary back-to-top" href="#" data-toggle="modal" data-target="#createadmin" aria-label="Tambah Admin" role="button" >
                <i class="fas fa-plus"></i>
            </a>
          </div>
        </div>
    </div>

    <div class="modal fade" id="createadmin" role="dialog" aria-labelledby="CreateAdmin" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="float-right">Tambah Admin</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                      <i class="fas fa-times"></i>
                    </span>
                  </button>
            </div>
            <div class="modal-body">
                    <form method="post" action="{{ route('admin-setting.store')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}  
                      <div class="card-body">

                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}"
                                   placeholder="Nama Lengkap" autofocus required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>

                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}"
                                   placeholder="Email" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                   placeholder="Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </div>
                            @endif
                        </div>                        
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            Tambah Admin
                        </button>

                      </div>
                    </form>
            </div>
          </div>
        </div>
    </div>
@stop
