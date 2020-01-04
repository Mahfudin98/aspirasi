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
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-file-signature"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-scroll"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-user"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-chart-bar"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
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
                  <form method="post" action="{{ route('post.store')}}" enctype="multipart/form-data">
                  @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputName">Title</label>
                        <input type="text" name="title" id="inputName" class="form-control">
                      </div>                              
                        <div id="accordion">
                            <div class="card card-info">
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
                                                    <input class="custom-file-input" type="file" name="image"  id="customFile">
                                                    <label class="custom-file-label" for="customFile">Pilih Gambar max : 2mb</label>
                                                </div>
                                            </div>                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <div class="form-group">
                        <label for="inputDescription">Content</label>
                        <textarea id="inputDescription" name="content" class="form-control" rows="4"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="inputName">Author</label>
                        <input type="text" id="inputName" class="form-control" name="author">
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
                  <h3 class="card-title">Donut Chart</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-chart-pie"></i>
                    </button>                    
                  </div>
                </div>
                <div class="card-body">
                    <canvas id="donutChart" style="height:230px; min-height:230px"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
            </div>            
          </div>
        </div>
      </section>
@stop
