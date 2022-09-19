@extends('layouts.master')
@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
  <div class="container">
    <nav class="breadcrumb bg-transparent m-0 p-0">
      <a class="breadcrumb-item" href="{{route('home')}}">Beranda</a>
      <a class="breadcrumb-item" href="{{route('category.all')}}">Kategori</a>
      <span class="breadcrumb-item active">{{ucfirst($title)}}</span>
    </nav>
  </div>
</div>
<!-- Breadcrumb End -->


<!-- News With Sidebar Start -->
<div class="container-fluid py-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          <div class="col-12">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
              <h3 class="m-0">List Kategori {{ucfirst($title)}}</h3>
              <!-- <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a> -->
            </div>
          </div>
          @if (sizeof($posts) > 0)
          @foreach($posts as $post)
          <div class="col-lg-6">
            <div class="position-relative mb-3">
              @if (substr($post['image'], 0, 4) === 'http')
              <img class="img-fluid w-100" src="{{$post['image']}}"
                style="width: 350px; height: 350px; object-fit: cover;">
              @else
              <img class="img-fluid w-100" src="{{asset('post-image/' . $post['image'])}}"
                style="width: 350px; height: 350px; object-fit: cover;">
              @endif
              <div class="overlay position-relative bg-light">
                <a class="h4" href="{{route('category.singleArticle', $post['slug'])}}">{{ ucwords($post['title'])
                  }}</a>
                <p class="m-0">
                  {!! strip_tags(substr(ucfirst(ucwords($post['content'])), 0, 200)) !!}...
                </p>
              </div>
            </div>
          </div>
          @endforeach
          @else
          <div class="col-lg my-5">
            <h5 class='text-center'>Belum ada artikel</h5>
          </div>
          @endif
        </div>
        <div class="row">
          <div class="col-12">
            {{ $posts->withQueryString()->links('vendor.pagination.kp-karet') }}
          </div>
        </div>

        <!-- <div class="mb-3">
          <a href=""><img class="img-fluid w-100" src="{{asset("template/img/ads-700x70.jpg")}}" alt=""></a>
        </div> -->
      </div>

      <div class="col-lg-4 pt-3 pt-lg-0">
        <!-- Social Follow Start -->
        <div class="pb-3">
          <div class="bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Follow Us</h3>
          </div>
          <div class="d-flex mb-3">
            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #39569E;">
              <small class="fab fa-facebook-f mr-2"></small><small>12,345 Fans</small>
            </a>
            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #52AAF4;">
              <small class="fab fa-twitter mr-2"></small><small>12,345 Followers</small>
            </a>
          </div>
          <div class="d-flex mb-3">
            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #0185AE;">
              <small class="fab fa-linkedin-in mr-2"></small><small>12,345 Connects</small>
            </a>
            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #C8359D;">
              <small class="fab fa-instagram mr-2"></small><small>12,345 Followers</small>
            </a>
          </div>
          <div class="d-flex mb-3">
            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #DC472E;">
              <small class="fab fa-youtube mr-2"></small><small>12,345 Subscribers</small>
            </a>
            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #1AB7EA;">
              <small class="fab fa-vimeo-v mr-2"></small><small>12,345 Followers</small>
            </a>
          </div>
        </div>
        <!-- Social Follow End -->

        <!-- Ads Start -->
        <!-- <div class="mb-3 pb-3">
          <a href=""><img class="img-fluid" src="{{asset("template/img/news-500x280-4.jpg")}}" alt=""></a>
        </div> -->
        <!-- Ads End -->

        <!-- Popular News Start -->
        <div class="pb-3">
          <div class="bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Tranding</h3>
          </div>
          @foreach($trends as $trend)
          <div class="d-flex mb-3">
            @if (substr($trend['image'], 0, 4) === 'http')
            <img class="img-fluid w-100" src="{{ $trend['image'] }}"
              style="width: 100px; height: 100px; object-fit: cover;">
            @else
            <img class="img-fluid w-100" src="{{asset('post-image/' . $trend['image'])}}"
              style="width: 100px; height: 100px; object-fit: cover;">
            @endif
            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
              <div class="mb-1" style="font-size: 13px;">
                <a href="">{{$trend->getCategory['name']}}</a>
                <span class="px-1">/</span>
                <span>
                  @php
                  $date = date_create(substr($trend['updated_at'], 0, (strlen($trend['updated_at']) - 9)));

                  setlocale(LC_TIME, 'id_ID.utf8');
                  $hariIni = $date;
                  echo strftime('%A, %d %B %Y', $hariIni->getTimestamp());
                  @endphp
                </span>
              </div>
              <a class="h6 m-0" href="">
                {!! strip_tags(substr(ucfirst($trend['title']), 0, 40)) !!}...
              </a>
            </div>
          </div>
          @endforeach
        </div>
        <!-- Popular News End -->

        <!-- Tags Start -->
        <div class="pb-3">
          <div class="bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Subkategori</h3>
          </div>
          <div class="d-flex flex-wrap m-n1">
            @foreach (App\Models\SubCategory::orderBy('subname', 'asc')->get() as $SubCategory)
            <a href="" class="btn btn-sm btn-outline-secondary m-1">{{ucwords($SubCategory['subname'])}}</a>
            @endforeach
          </div>
        </div>
        <!-- Tags End -->
      </div>
    </div>
  </div>
</div>
</div>
<!-- News With Sidebar End -->
@endsection