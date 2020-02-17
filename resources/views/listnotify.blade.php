<ul class="products-list product-list-in-card pl-2 pr-2">
    @if ($notification->count())
    @foreach ($notification as $errors)
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
          {{$errors->data['masukan']}}
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
          {{$errors->data['masukan']}}
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
