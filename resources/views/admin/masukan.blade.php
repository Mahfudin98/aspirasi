@extends('adminlte::page')

@section('title', 'Aspirasi')

@section('content_header')
    <h1 class="m-0 text-dark">Aspirasi</h1>
@stop

@section('content')
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">List Masukan</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  {{-- <input type="text" class="form-control" placeholder="Search Mail">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div> --}}
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive mailbox-messages">
                <table id="example1" class="table table-hover table-striped">
                @if ($masukan->count())
                @foreach ($masukan as $row)
                 @if ($row->kategori === 'masukan')
                   <tbody>
                    <tr>
                      {{--  <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>  --}}
                      <td class="mailbox-name"><a href="complain/{{$row->id}}">
                        {{ $row->nama }}</a></td>
                      <td class="mailbox-subject"><b> {{ $row->keterangan }} </b>,{{ substr(strip_tags($row->masukan),0,20) }} .....</td>
                      <td>
                        @foreach ($tasks as $item)
                            @if ($item->complaint_id == $row->id)
                            @if ($item->completed == true)
                            <span class="badge bg-success">Completed</span>
                            @else
                            <span class="badge bg-danger">Proses</span>
                            @endif
                            @endif
                        @endforeach
                      </td>
                      @if ($row->file === 'noimage.jpg')
                      <td class="mailbox-attachment"></td>
                      @else
                      <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                      @endif
                      <td class="mailbox-date">{{ date('d,M,Y', strtotime($row->created_at)) }}</td>
                    </tr>
                  </tbody>
                 @endif
                @endforeach
                @else
                  <div class="text-center">
                    <span class="text-bold">Data Belum Ada!</span>
                  </div>
                @endif

                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                {{--  <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>  --}}
                <div class="float-right">
                  {{$masukan->links()}}
                </div>
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">List Keluhan</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  {{-- <input type="text" class="form-control" placeholder="Search Mail">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div> --}}
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive mailbox-messages">
                <table id="example1" class="table table-hover table-striped">
                @if ($keluhan->count())
                @foreach ($keluhan as $row)
                 @if ($row->kategori === 'keluhan')
                   <tbody>
                    <tr>
                      {{--  <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>  --}}
                      <td class="mailbox-name"><a href="complain/{{$row->id}}">{{ $row->nama }}</a></td>
                      <td class="mailbox-subject"><b> {{ $row->keterangan }} </b>,{{ substr(strip_tags($row->masukan),0,20) }} .....
                      </td>
                      <td>
                        @foreach ($tasks as $item)
                            @if ($item->complaint_id == $row->id)
                            @if ($item->completed == true)
                            <span class="badge bg-success">Completed</span>
                            @else
                            <span class="badge bg-danger">Proses</span>
                            @endif
                            @endif
                        @endforeach
                      </td>
                      @if ($row->file === 'noimage.jpg')
                      <td class="mailbox-attachment"></td>
                      @else
                      <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                      @endif
                      <td class="mailbox-date">{{ date('d,M,Y', strtotime($row->created_at)) }}</td>
                    </tr>
                  </tbody>
                 @endif
                @endforeach
                @else
                <div class="text-center">
                    <span class="text-bold">Data Belum Ada!</span>
                </div>
                @endif
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                {{--  <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>  --}}
                <div class="float-right">
                  {{$keluhan->links()}}
                </div>
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@stop
