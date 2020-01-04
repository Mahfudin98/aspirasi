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
                    <div class="card-header">
                    <h3 class="card-title">Read Mail</h3>

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
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                            <i class="far fa-trash-alt"></i></button>
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                            <i class="fas fa-reply"></i></button>
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                            <i class="fas fa-share"></i></button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                        <i class="fas fa-print"></i></button>
                    </div>
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">
                        {{ $row[0]->masukan }}
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
                    <div class="card-footer">
                    <div class="float-right">
                        <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                        <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                    </div>
                    <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                    <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                    </div>
                    <!-- /.card-footer -->
                </div>            
            @else            
                <div class="card card-primary card-outline">
                    <div class="card-header">
                    <h3 class="card-title">Read Mail</h3>

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
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                            <i class="far fa-trash-alt"></i></button>
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                            <i class="fas fa-reply"></i></button>
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                            <i class="fas fa-share"></i></button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                        <i class="fas fa-print"></i></button>
                    </div>
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">
                        {{ $row[0]->masukan }}
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
                    <div class="card-footer">
                    <div class="float-right">
                        <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                        <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                    </div>
                    <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                    <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                    </div>
                    <!-- /.card-footer -->
                </div>
            @endif                                                                              
          @endforeach
                  
          
          <!-- /.card -->
        </div>
@stop
