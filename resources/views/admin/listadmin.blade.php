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
                        <p class="text-muted text-sm"><b>Jabatan: </b> {{$row->jabatan}} BPM </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Email : {{$row->email}}</li>
                        @if ($row->phonenumber == null)
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : - </li>
                        @else
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : {{$row->phonenumber}} </li>
                        @endif
                        </ul>
                    </div>
                    <div class="col-5 text-center">
                        @if ($row->images === "noimage.jpg")
                        <button>
                            <img src="{{asset('images/default.jpg')}}" alt="" class=" img-thumbnail img-fluid">
                        </button>
                        @else
                            <img src="{{URL::to('/images/'.$row->images) }}" alt="" class=" img-thumbnail img-fluid">
                        @endif
                    </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        @if (Auth::user()->name === $row->name)
                        <a href="disabled" class="btn btn-sm bg-red disabled" data-toggle="modal" data-target="#confirmDelete{{$row->id}}">
                            <i class="fas fa-trash"></i>
                        </a>
                        @else
                        <a href="#" class="btn btn-sm bg-red" data-toggle="modal" data-target="#confirmDelete{{$row->id}}">
                            <i class="fas fa-trash"></i>
                        </a>
                        @endif
                    <a href="#" class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#edit{{$row->id}}" aria-label="Tambah Admin" role="button">
                        <i class="fas fa-pen"></i>
                    </a>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
            <a class="nav-link btn btn-primary back-to-top" href="#" data-toggle="modal" data-target="#createadmin" aria-label="Tambah Admin" role="button" >
                <i class="fas fa-plus"></i>
            </a>
          </div>
        </div>
    </div>

    <!-- create -->
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
                    @csrf
                      <div class="card-body">

                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" autofocus required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="phonenumber" class="form-control" placeholder="Nomor Handphone" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                        </div>

                        <div id="accordion">
                            <div class="card card-success">
                                <div class="card-header">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    Masukan Foto <i class="fas fa-file-image float-right"></i>
                                    </a>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="card-body">
                                        <div class="form-group">
                                        <label>Masukan Foto disini :</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input class="custom-file-input" type="file" name="images"  id="file">
                                                    <label class="custom-file-label" for="file">Pilih Gambar max : 2mb</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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


    @foreach ($users as $row)
    <div class="portfolio-modal modal fade" id="edit{{$row->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <form method="post" action="{{ url('/admin-setting/'.$row->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                      <div class="card-body">

                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control" value="{{$row->name}}" autofocus required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" value="{{$row->email}}" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="jabatan" class="form-control" value="{{$row->jabatan}}" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-id-card-alt"></span>
                                </div>
                            </div>
                        </div>

                        @if ($row->phonenumber != null)
                        <div class="input-group mb-3">
                            <input type="text" name="phonenumber" class="form-control" value="{{$row->phonenumber}}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="input-group mb-3">
                            <input type="text" name="phonenumber" class="form-control" placeholder="Nomor handphone masih kosong">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" name="images"  id="image">
                                <label class="custom-file-label" for="file">{{$row->images}}</label>
                            </div>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-image"></span>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            Edit Admin
                        </button>

                      </div>
                    </form>
            </div>
          </div>
        </div>
    </div>
    @endforeach

    <!-- delete -->
    @foreach ($users as $row)
        <div class="modal fade" id="confirmDelete{{$row->id}}" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="float-right">Delete Admin</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                <p>Anda yakin menghapus admin {{$row->name}}?</p>
                </div>
                <div class="modal-footer">
                <form method="POST" action="{{ url('/admin-setting/'.$row->id)}}" accept-charset="UTF-8" style="display:inline">
                    @method('delete')
                    @csrf
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger" id="confirm">Delete</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    @endforeach
@stop

@section('js')
    <script>
        $('#file').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
@endsection
