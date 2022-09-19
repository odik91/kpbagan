@extends('layouts.master')
@section('content')
<!-- Top News Slider Start -->
<div class="container-fluid py-3">
  <div class="container">
    <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
      @foreach($randomPosts as $randomPost)
      <div class="d-flex">
        @if (substr($randomPost['image'], 0, 4) === 'http')
        <img src="{{$randomPost['image']}}" style="width: 80px; height: 80px; object-fit: cover;">
        @else
        <img src="{{asset('post-image/' . $randomPost['image'])}}"
          style="width: 80px; height: 80px; object-fit: cover;">
        @endif
        <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
          <a class="text-secondary font-weight-semi-bold" href="{{route('category.singleArticle', $randomPost->slug)}}">
            {!! strip_tags(substr(ucfirst($randomPost['title']), 0, 150)) !!}...
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- Top News Slider End -->


<!-- Main News Slider Start -->
<div class="container-fluid py-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
          @foreach ($newPosts as $newPost)
          <div class="position-relative overflow-hidden" style="height: 435px;">
            @if (substr($newPost['image'], 0, 4) === 'http')
            <img class="img-fluid h-100" src="{{$newPost['image']}}" style="object-fit: cover;">
            @else
            <img class="img-fluid h-100" src="{{asset('post-image/' . $newPost['image'])}}" style="object-fit: cover;">
            @endif
            <div class="overlay">
              <div class="mb-1">
                <a class="text-white"
                  href="{{route('category.single', $newPost->getCategory->slug)}}">{{$newPost->getCategory['name']}}</a>
                <span class="px-2 text-white">/</span>
                <a class="text-white" href="#">
                  {{ $newPost->getSubcategory['subname'] }}
                </a>
                <span class="px-2 text-white">/</span>
                <a class="text-white" href="{{route('category.singleArticle', $newPost->slug)}}">
                  @php
                  $date = date_create(substr($newPost['updated_at'], 0, (strlen($newPost['updated_at']) - 9)));

                  setlocale(LC_TIME, 'id_ID.utf8');
                  $hariIni = $date;
                  echo strftime('%A, %d %B %Y', $hariIni->getTimestamp());
                  @endphp
                </a>
              </div>
              <a class="h2 m-0 text-white font-weight-bold"
                href="{{route('category.singleArticle', $newPost->slug)}}">{!!
                strip_tags(substr(ucfirst($newPost['title']), 0, 150)) !!}...</a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="col-lg-4">
        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
          <h3 class="m-0">Kategori</h3>
          <a class="text-secondary font-weight-medium text-decoration-none" href="{{route('category.all')}}">Semua</a>
        </div>
        @foreach ($limitCategories as $limitCategory)
        <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
          <img class="img-fluid w-100 h-100" src="{{asset('image/cat-500x80.png')}}" style="object-fit: cover;">
          <a href="{{route('category.single', $limitCategory->slug)}}"
            class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
            {{$limitCategory['name']}}
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
<!-- Main News Slider End -->

<!-- Category News Slider Start -->
<div class="container-fluid">
  <div class="container">
    <div class="row">
      @foreach ($categories as $category)
      <div class="col-lg-6 py-3">
        <div class="bg-light py-2 px-4 mb-3">
          <h3 class="m-0">{{$category['name']}}</h3>
        </div>
        <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
          @foreach(App\Models\Post::where('category_id', $category['id'])->where('sub_category_id', '>',
          0)->orderBy('updated_at', 'desc')->limit(10)->get() as $listPost)
          <div class="position-relative">
            @if (substr($listPost['image'], 0, 4) === 'http')
            <img class="img-fluid w-100" src="{{$listPost['image']}}"
              style="width: 150px; height: 150px; object-fit: cover;">
            @else
            <img class="img-fluid w-100" src="{{asset('post-image/' . $listPost['image'])}}"
              style="width: 150px; height: 150px; object-fit: cover;">
            @endif
            <div class="overlay position-relative bg-light">
              <div class="mb-2" style="font-size: 13px;">
                <a href="{{route('category.single', $category->slug)}}">{{$category['name']}}</a>
                <span class="px-1">/</span>
                <a href="">{{$listPost->getSubcategory['subname']}}</a>
                <span class="px-1">/</span>
                <span>
                  @php
                  $date = date_create(substr($listPost['updated_at'], 0, (strlen($listPost['updated_at']) - 9)));

                  setlocale(LC_TIME, 'id_ID.utf8');
                  $hariIni = $date;
                  echo strftime('%A, %d %B %Y', $hariIni->getTimestamp());
                  @endphp
                </span>
              </div>
              <a class="h4 m-0" href="{{route('category.singleArticle', $listPost->slug)}}">{!!
                strip_tags(substr(ucfirst($listPost['title']), 0, 150)) !!}...</a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- Category News Slider End -->


<!-- News With Sidebar Start -->
<div class="container-fluid py-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="row mb-3">
          <div class="col-12">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
              <h3 class="m-0">Populer</h3>
              <a class="text-secondary font-weight-medium text-decoration-none" href="">Lihat Semua</a>
            </div>
          </div>
          @foreach($hits as $hit)
          <div class="col-lg-6">
            <div class="position-relative mb-3">
              @if (substr($hit['image'], 0, 4) === 'http')
              <img class="img-fluid w-100" src="{{ $hit['image'] }}"
                style="width: 350px; height: 350px; object-fit: cover;">
              @else
              <img class="img-fluid w-100" src="{{asset('post-image/' . $hit['image'])}}"
                style="width: 350px; height: 350px; object-fit: cover;">
              @endif

              <div class="overlay position-relative bg-light">
                <div class="mb-2" style="font-size: 14px;">
                  <a href="{{route('category.single', $hit->getCategory->slug)}}">{{ $hit->getCategory['name'] }}</a>
                  <span class="px-1">/</span>
                  <span>
                    @php
                    $date = date_create(substr($hit['updated_at'], 0, (strlen($hit['updated_at']) - 9)));

                    setlocale(LC_TIME, 'id_ID.utf8');
                    $hariIni = $date;
                    echo strftime('%A, %d %B %Y', $hariIni->getTimestamp());
                    @endphp
                  </span>
                </div>
                <a class="h4" href="{{route('category.singleArticle', $hit->slug)}}">{{ucwords($hit['title'])}}</a>
                <p class="m-0">
                  {!! strip_tags(substr(ucfirst($hit['content']), 0, 150)) !!}...
                </p>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <!-- <div class="mb-3 pb-3">
          <a href=""><img class="img-fluid w-100" src="{{asset("template/img/ads-700x70.jpg")}}" alt=""></a>
        </div> -->

        <div class="row">
          <div class="col-12">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
              <h3 class="m-0">Terbaru</h3>
              <a class="text-secondary font-weight-medium text-decoration-none" href="{{route('category.all')}}">Lihat
                Semua</a>
            </div>
          </div>
          @foreach ($newBottomPosts as $newBottomPost)
          <div class="col-lg-6">
            <div class="position-relative mb-3">
              @if (substr($newBottomPost['image'], 0, 4) === 'http')
              <img class="img-fluid w-100" src="{{ $newBottomPost['image'] }}"
                style="width: 350px; height: 350px; object-fit: cover;">
              @else
              <img class="img-fluid w-100" src="{{asset('post-image/' . $newBottomPost['image'])}}"
                style="width: 350px; height: 350px; object-fit: cover;">
              @endif
              <div class="overlay position-relative bg-light">
                <div class="mb-2" style="font-size: 14px;">
                  <a href="">{{ $newBottomPost->getCategory['name'] }}</a>
                  <span class="px-1">/</span>
                  <span>
                    @php
                    $date = date_create(substr($newBottomPost['updated_at'], 0, (strlen($newBottomPost['updated_at']) -
                    9)));

                    setlocale(LC_TIME, 'id_ID.utf8');
                    $hariIni = $date;
                    echo strftime('%A, %d %B %Y', $hariIni->getTimestamp());
                    @endphp
                  </span>
                </div>
                <a class="h4" href="">{{ ucwords($newBottomPost['title']) }}</a>
                <p class="m-0">
                  {!! strip_tags(substr(ucfirst($newBottomPost['content']), 0, 150)) !!}...
                </p>
              </div>
            </div>

            <!-- batas terbaru -->
          </div>
          @endforeach
        </div>
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
            <h3 class="m-0">Trending</h3>
          </div>
          @foreach($sideHits as $sideHit)
          <div class="d-flex mb-3">
            @if (substr($sideHit['image'], 0, 4) === 'http')
            <img class="img-fluid w-100" src="{{ $sideHit['image'] }}"
              style="width: 100px; height: 100px; object-fit: cover;">
            @else
            <img class="img-fluid w-100" src="{{asset('post-image/' . $sideHit['image'])}}"
              style="width: 100px; height: 100px; object-fit: cover;">
            @endif
            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
              <div class="mb-1" style="font-size: 13px;">
                <a href="">{{ $sideHit->getCategory['name'] }}</a>
                <span class="px-1">/</span>
                <span>
                  @php
                  $date = date_create(substr($sideHit['updated_at'], 0, (strlen($sideHit['updated_at']) - 9)));

                  setlocale(LC_TIME, 'id_ID.utf8');
                  $hariIni = $date;
                  echo strftime('%A, %d %B %Y', $hariIni->getTimestamp());
                  @endphp
                </span>
              </div>
              <a class="h6 m-0" href="">{!! strip_tags(substr(ucfirst($sideHit['title']), 0, 40)) !!}...</a>
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