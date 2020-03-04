@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$complaint->count()}}</h3>

                <p>Jumlah Aspirasi</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-file-signature"></i>
              </div>
              <a href="/complain" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$task->count()}}</h3>

                <p>Jumlah Terkonfirmasi</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-scroll"></i>
              </div>
              <a href="/terkonfirmasi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$user->count()}}</h3>

                <p>Jumlah Admin</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-user"></i>
              </div>
              <a href="admin-setting" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$persen->where('completed', '1')->count()}}</h3>
                <p>Terselesaikan</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-chart-bar"></i>
              </div>
              <a href="/terkonfirmasi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="col-md-6">
                <div class="card card-warning">
                    <div class="card-header">
                      <h3 class="card-title">Aspirasi Masuk Terbaru
                          {{--  @if ($notification->now())
                          <span class="badge badge-danger navbar-badge notif-count"></span>
                          @endif  --}}
                    </h3>

                      <div class="card-tools">
                        {{--  <form method="POST" action="/deletnotif" accept-charset="UTF-8" style="display:inline">
                            @method('delete')
                            <button type="submit" class="btn btn-tool">
                               <i class="fas fa-trash"></i>
                            </button>
                        </form>  --}}
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-bell"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0" id="show">
                        <!-- /.notification in here -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <a class="nav-link" href="#portfolio" data-toggle="modal" data-target="#allnotifikasi">
                          Tampilkan Semua Notifikasi
                        </a>
                    </div>
                    <!-- /.card-footer -->
                  </div>
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Buat Postingan</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-pen float-right"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ route('home.store')}}" enctype="multipart/form-data">
                    @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="inputName">Title</label>
                          <input type="text" name="title" id="inputName" class="form-control" required>
                        </div>
                          <div id="accordion">
                              <div class="card card-success">
                                  <div class="card-header">
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                      Masukan Gambar jika perlu <i class="fas fa-file-image float-right"></i>
                                      </a>
                                  </div>
                                  <div id="collapseTwo" class="panel-collapse collapse">
                                      <div class="card-body">
                                          <div class="form-group">
                                          <label>Masukan Gambar disini :</label>
                                              <div class="input-group">
                                                  <div class="custom-file">
                                                      <input class="custom-file-input" type="file" name="image"  id="file">
                                                      <label class="custom-file-label" for="file">Pilih Gambar max : 2mb</label>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        <div class="form-group">
                          <label for="inputDescription">Content</label>
                          <textarea id="inputDescription" name="content" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                          <label for="inputName">Author</label>
                          <input type="text" id="inputName" class="form-control" name="author" value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="form-group">
                          <input type="submit" name="kirim" value="Kirimkan!" class="btn btn-success float-right">
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            <div class="col-md-6">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">List Postingan</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-file-alt"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 798px;">
                              @if ($posts->count())
                              @foreach($posts as $errors)
                              <a class="nav-link" href="#portfolio" data-toggle="modal" data-target="#post{{$errors->id}}">
                                <h2 class="post-title">
                                  {{$errors->title}}
                                </h2>
                              </a>
                              <p class="post-subtitle">
                              @if ($errors->image === 'noimage.jpg')
                                {{ substr(strip_tags($errors->content),0,50) }}<a href="#">....</a>
                              @else
                                {{ substr(strip_tags($errors->content),0,50) }}<a href="#">....</a> <i class="fas fa-file-image"></i>
                              @endif
                              </p>
                              <p class="post-meta">Posted by
                                <a href="#">{{$errors->author}}</a>
                                {{ date('F d, Y', strtotime($errors->created_at)) }}</p>
                            @endforeach
                              @else
                            <div class=" text-center">
                                <span class=" swal2-center">Data belum ada</span>
                            </div>
                              @endif
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                        </div>
                      </div>
                </div>
                <!-- /.card-body -->
              </div>
            </div>

           </div>
        </div>
      </section>


      <div class="portfolio-modal modal fade" id="allnotifikasi" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content rounded mx-auto d-block">
            <div class="modal-body">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-lg-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                          <h3>Semua Notifikasi</h3>
                        </div>
                        <div class="card-body">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                @if ($notifi->count())
                                @foreach ($notifi as $errors)
                                @if ($errors->read_at === null)
                                <li class="item text-bold">
                                  <div class="product-img">
                                      <i class="fas fa-file mr-2 size-50"></i>
                                    {{--  <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">  --}}
                                  </div>
                                  <div class="product-info">
                                    <a href="complain/{{$errors->notifiable_id}}" class="product-title">{{substr(strip_tags($errors->data['nama']),0,2)}}*****
                                      <span class="badge badge-warning float-right">{{$errors->data['kategori']}}</span>
                                      <span class="badge badge-info float-right">{{$errors->created_at->diffForHumans()}}</span>
                                  </a>
                                    <span class="product-description">
                                        {{substr(strip_tags($errors->data['masukan']),0,50)}}....
                                    </span>
                                  </div>
                                </li>
                                @else
                                <li class="item">
                                  <div class="product-img">
                                      <i class="fas fa-file mr-2 size-50"></i>
                                    {{--  <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">  --}}
                                  </div>
                                  <div class="product-info">
                                    <a href="complain/{{$errors->notifiable_id}}" class="product-title">{{substr(strip_tags($errors->data['nama']),0,2)}}*****
                                      <span class="badge badge-warning float-right">{{$errors->data['kategori']}}</span>
                                      <span class="badge badge-success float-right">read at {{$errors->read_at->diffForHumans()}}</span>
                                      <span class="badge badge-info float-right">{{$errors->created_at->diffForHumans()}}</span>
                                  </a>
                                    <span class="product-description">
                                        {{substr(strip_tags($errors->data['masukan']),0,50)}}....
                                    </span>
                                  </div>
                                </li>
                                @endif
                                @endforeach
                                @else
                                <div class="text-center">
                                  <br>
                                  <span>Data masih kosong</span>
                                  <br>
                                  <br>
                                </div>
                                @endif

                              <!-- /.item -->
                            </ul>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@stop

@section('postview')

@foreach ($posts as $errors)
<div class="portfolio-modal modal fade" id="post{{$errors->id}}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content rounded mx-auto d-block">
      <div class="modal-body">
        <div class="container">
          <div class="row justify-content-center bg-gradient-info">
            <div class="col-lg-8">
                <br>
              <!-- Portfolio Modal - Title -->
                  {{--  <div class="card">
                    <!-- /.card-header -->
                    <br>
                    <br>
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-8 col-md-10 mx-auto">
                          <div class="post-heading">
                            <h2>{{$errors->title}}</h2>
                            <span class="meta">Posted by
                                <a href="#portfolio">{{$errors->author}}</a>
                              on {{ date('F d, Y', strtotime($errors->created_at)) }}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <article>
                      <div class="container">
                        <div class="row">
                          <div class="col-lg-8 col-md-10 mx-auto">
                              <hr>
                              <p>{{$errors->content}}</p>
                              <img class="img-fluid" src="{{URL::to('/image/'.$errors->image) }}" alt="">
                          </div>
                        </div>
                      </div>
                    </article>

                    <!-- /.card-body -->
                  </div>  --}}

                          <div class="card card-primary card-outline bg-info">
                              <div class="card-header">
                                <h3>{{$errors->title}} <span class="float-right h5">{{$errors->author}}</span></h3>

                              </div>
                              <!-- /.card-header -->
                              <div class="card-body p-0">

                              <!-- /.mailbox-controls -->
                              <div class="mailbox-read-message">
                                  {{ $errors->content }}
                              </div>
                              <!-- /.mailbox-read-message -->
                              </div>
                              <!-- /.card-body -->
                              @if ($errors->image === null)
                              @elseif ($errors->image === 'noimage.jpg')
                              @else
                              <div class="card-footer">
                                <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                                    <li class="rounded mx-auto d-block">
                                      <span class="mailbox-attachment-icon has-img"><img src="{{URL::to('/image/'.$errors->image) }}" alt="Attachment"></span>
                                      <div class="mailbox-attachment-info">
                                      </br>
                                        <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> {{ substr(strip_tags($errors->image),0,10) }} </a>
                                        <span class="mailbox-attachment-size clearfix mt-1">
                                            <a href="#" class="btn btn-default btn-sm float-left" data-toggle="modal" data-target="#delet{{$errors->id}}"><i class="fas fa-trash-alt"></i></a>
                                            <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-edit"></i></a>
                                        </span>
                                      </div>
                                    </li>
                                  </ul>
                              </div>
                              @endif
                              <!-- /.card-footer -->
                              <div class="card-footer bg-info">
                                  <div class="float-right">
                                    <button type="button" data-toggle="modal" data-target="#confirmDelete{{$errors->id}}" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#edit{{$errors->id}}"><i class="fas fa-edit"></i> Edit</button>
                                  </div>
                              </div>
                              <!-- /.card-footer -->
                          </div>


              <div class="text-center">
                  <button class="btn btn-danger" href="#" data-dismiss="modal">
                      <i class="fas fa-times fa-fw"></i>
                      Close Window
                  </button>
              </div>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach

@section('delete')
@foreach ($posts as $errors)
  <div class="modal fade" id="confirmDelete{{$errors->id}}" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="float-right">Delete Postingan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                  <i class="fas fa-times"></i>
                </span>
              </button>
        </div>
        <div class="modal-body">
          <p>Anda yakin menghapus ini?</p>
        </div>
        <div class="modal-footer">
        <form method="POST" action="{{ url('/home/'.$errors->id)}}" accept-charset="UTF-8" style="display:inline">
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

@section('edit')
@foreach ($posts as $errors)
    <div class="modal fade" id="edit{{$errors->id}}" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content card card-success">
                    <div class="card-header">
                      <h3 class="card-title">Edit Postingan</h3>
                      <div class="card-tools">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                              <i class="fas fa-times"></i>
                            </span>
                          </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <form method="post" action="{{ url('/home/'.$errors->id)}}" enctype="multipart/form-data">
                      @csrf
                      @method('patch')
                        <div class="card-body">
                          <div class="form-group">
                            <label for="inputName">Title</label>
                            <input type="text" name="title" value="{{$errors->title}}" id="inputName" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="file">
                                <label class="custom-file-label" for="file">Choose file</label>
                              </div>
                              <div class="input-group-append">
                                <a href="#" data-toggle="modal" class="input-group-text" data-target="#delet{{$errors->id}}"><span><i class="far fa-trash-alt"></i></span></a>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputDescription">Content</label>
                            <textarea id="inputDescription" name="content" class="form-control" rows="4">{{$errors->content}}</textarea>
                          </div>
                          <div class="form-group">
                            <label for="inputName">Author</label>
                            <input type="text" id="inputName" class="form-control" value="{{$errors->author}}" name="author">
                          </div>
                          <div class="form-group">
                            <input type="submit" name="kirim" value="Update" class="btn btn-success float-right">
                            <button type="button" class="btn btn-success float-left" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </form>
                    </div>
            </div>
        </div>
    </div>
@endforeach

@section('delimg')
  <div class="modal fade" id="delet{{$errors->id}}" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="float-right">Delete Postingan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                  <i class="fas fa-times"></i>
                </span>
              </button>
        </div>
        <div class="modal-body">
          <p>Anda yakin menghapus ini?</p>
        </div>
        <div class="modal-footer">
        <form method="POST" action="{{ url('/img/'.$errors->id)}}" accept-charset="UTF-8" style="display:inline">
            @method('delete')
            @csrf
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger" id="confirm">Delete</button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@endsection

@endsection

@stop

