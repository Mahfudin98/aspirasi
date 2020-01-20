@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Terkonfirmasi</h1>
@stop

@section('content')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Condensed Full Width Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                @foreach ($tasks as $row)
                <form action="/terkonfirmasi/{{$row->id}}" method="post">
                  @method('PATCH')
                  @csrf
                </form>
                @endforeach
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Masukan</th>
                      <th>Progress</th>
                      <th style="width: 40px">Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($tasks as $row)
                      <form action="/terkonfirmasi/{{$row->id}}" method="post">
                          @method('PATCH')
                          @csrf

                        <tr class="todo-list" data-widget="todo-list">
                            <td>
                                <input type="checkbox" name="completed" onchange="this.form.submit()" {{$row->completed ? 'checked' : ''}} id="todoCheck1">
                                <label for="todoCheck1"></label>
                            </td>
                            <td>
                                <span class="text {{$row->completed ? 'is-complete' : ''}}">{{$row->masukan}}</span>
                            </td>
                            @if ($row->completed == true)
                            <td>
                                <div class="progress progress-xs">
                                  <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
                                </div>
                              </td>
                            <td><span class="badge bg-success">Completed</span></td>
                            @else
                            <td>
                                <div class="progress progress-xs">
                                  <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-danger">Proses</span></td>
                            @endif
                        </tr>
                      </form>
                      @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
@stop
