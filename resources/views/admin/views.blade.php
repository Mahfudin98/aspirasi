@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @foreach ($complaints as $row)
        @if ($row[0]->kategori === 'masukan')
            <h1 class="m-0 text-dark">Masukan</h1>
        @else
            <h1 class="m-0 text-dark">Keluhan</h1>
        @endif
    @endforeach
@stop

@section('content')
        <div class="col-md-12">
          <div class="card collapsed-card">
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <div class="nav-link">
                    <textarea class="form-control" rows="6" placeholder="Enter ..."></textarea>
                    <hr>
                    <button type="button" class="btn btn-block btn-primary">Success</button>
                  </div>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>

          @foreach ($complaints as $row)
            @if ($row[0]->kategori === 'masukan')

                <div class="card card-primary card-outline">
                    @foreach ($tasks as $item)
                        @if ($item->complaint_id == $row[0]->id)
                        @if ($item->completed == true)
                          <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-success text-xl">
                              Completed
                            </div>
                          </div>
                        @else
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-danger text-xl">
                              Proses
                            </div>
                        </div>
                        @endif
                        @endif
                    @endforeach
                    <div class="card-header">
                    <h3 class="card-title">Baca Masukan</h3>

                    <div class="card-tools">
                        <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
                        <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
                    </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                    <div class="mailbox-read-info">
                        <h5>{{$row[0]->nama}} <span class="mailbox-read-time float-right">Keterangan : {{$row[0]->keterangan}}</span></h5>
                        <h6>From: {{$row[0]->email}}
                        <span class="mailbox-read-time float-right">{{ date('F d, Y', strtotime($row[0]->created_at)) }}</span></h6>
                    </div>
                    <!-- /.mailbox-read-info -->
                    <div class="mailbox-controls with-border text-center">
                        <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm" href="#" data-toggle="modal" data-target="#confirmDelete{{$row[0]->id}}" title="Delete">
                            <i class="far fa-trash-alt"></i></button>
                        <form action="/complaint/{{$row[0]->id}}/tasks" method="post">
                            @csrf
                            <input type="hidden" value="{{ $row[0]->nama }}" name="nama">
                            <input type="hidden" value="{{ $row[0]->masukan }}" name="masukan">
                            <button type="submit" class="btn btn-default btn-sm" title="proses {{ $row[0]->kategori }}">
                                Proses {{ $row[0]->kategori }} <span><i class="fas fa-hourglass"></i></span>
                            </button>
                        </form>
                    </div>
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">
                        <p class="text-justify">{{ $row[0]->masukan }}</p>
                    </div>
                    <!-- /.mailbox-read-message -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer bg-white">
                    @if ($row[0]->file === 'noimage.jpg')
                    @else
                    <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                      <li>
                        <span class="mailbox-attachment-icon has-img"><img src="{{URL::to('/file/'.$row[0]->file) }}" alt="Attachment"></span>

                        <div class="mailbox-attachment-info">
                        </br>
                          <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> {{ substr(strip_tags($row[0]->file),0,10) }} </a>
                            <span class="mailbox-attachment-size clearfix mt-1">
                                <span>1.9 MB</span>
                                <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                </span>
                        </div>
                      </li>
                    </ul>
                    @endif
                    </div>
                    <!-- /.card-footer -->
                </div>
            @else
                <div class="card card-primary card-outline">
                    @foreach ($tasks as $item)
                        @if ($item->complaint_id == $row[0]->id)
                        @if ($item->completed == true)
                          <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-success text-xl">
                              Completed
                            </div>
                          </div>
                        @else
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-danger text-xl">
                              Proses
                            </div>
                        </div>
                        @endif
                        @endif
                    @endforeach
                    <div class="card-header">
                    <h3 class="card-title">Baca Keluhan</h3>

                    <div class="card-tools">
                        <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
                        <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
                    </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                    <div class="mailbox-read-info">
                        <h5>{{$row[0]->nama}} <span class="mailbox-read-time float-right">Keterangan : {{$row[0]->keterangan}}</span></h5>
                        <h6>From: {{$row[0]->email}}
                        <span class="mailbox-read-time float-right">{{$row[0]->created_at}}</span></h6>
                    </div>
                    <!-- /.mailbox-read-info -->
                    <div class="mailbox-controls with-border text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm" href="#" data-toggle="modal" data-target="#confirmDelete{{$row[0]->id}}" title="Delete">
                            <i class="far fa-trash-alt"></i></button>
                        <form action="/complaint/{{$row[0]->id}}/tasks" method="post">
                            @csrf
                            <input type="hidden" value="{{ $row[0]->nama }}" name="nama">
                            <input type="hidden" value="{{ $row[0]->masukan }}" name="masukan">
                            <button type="submit" class="btn btn-default btn-sm" title="proses {{ $row[0]->kategori }}">
                                Proses {{ $row[0]->kategori }} <span><i class="fas fa-hourglass"></i></span>
                            </button>
                        </form>
                    </div>
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">
                        <p class="text-justify">{{ $row[0]->masukan }}</p>
                    </div>
                    <!-- /.mailbox-read-message -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer bg-white">
                    @if ($row[0]->file === 'noimage.jpg')
                    @else
                    <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                      <li>
                        <span class="mailbox-attachment-icon has-img"><img src="{{URL::to('/file/'.$row[0]->file) }}" alt="Attachment"></span>

                        <div class="mailbox-attachment-info">
                        </br>
                          <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> {{ substr(strip_tags($row[0]->file),0,10) }} </a>
                            <span class="mailbox-attachment-size clearfix mt-1">
                                <span>1.9 MB</span>
                                <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                </span>
                        </div>
                      </li>
                    </ul>
                    @endif
                    </div>
                    <!-- /.card-footer -->

                </div>
            @endif
          @endforeach


          <!-- /.card -->
        </div>

        @foreach ($complaints as $row)
        <div class="modal fade" id="confirmDelete{{$row[0]->id}}" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="float-right">Delete Aspirasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                <p>Anda yakin menghapus Aspirasi dari {{$row[0]->nama}}?</p>
                </div>
                <div class="modal-footer">
                <form method="POST" action="{{ url('/complain/'.$row[0]->id)}}" accept-charset="UTF-8" style="display:inline">
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
