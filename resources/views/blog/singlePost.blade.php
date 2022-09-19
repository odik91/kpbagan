@extends('layouts.master')
@section('content')
<!-- News With Sidebar Start -->
<div class="container-fluid py-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <!-- News Detail Start -->
        <div class="position-relative mb-3">
          @if (substr($post['image'], 0, 4) === 'http')
          <img class="img-fluid w-100" src="{{$post['image']}}" style="object-fit: cover;">
          @else
          <img class="img-fluid w-100" src="{{asset('post-image/' . $post['image'])}}" style="object-fit: cover;">
          @endif
          <div class="overlay position-relative bg-light">
            <div class="mb-3">
              <a href="">{{$post->getCategory['name'] }}</a>
              <span class="px-1">/</span>
              <a href="">{{$post->getSubcategory['subname'] }}</a>
              <span class="px-1">/</span>
              <span>
                {{isset($post['created_at']) ? $post['created_at'] : date('d F Y')}}
              </span>
            </div>
            <div class="col-md">
              <h3 class="mb-3">{{ $post['title'] }}</h3>
              <div id="post">
                {!!$post['content']!!}
              </div>
            </div>
          </div>
        </div>
        <!-- News Detail End -->

        <!-- Comment List Start -->
        <div class="bg-light mb-3" style="padding: 30px;">
          {{-- start disqus --}}
          {{-- end disqus --}}


          <h3 class="mb-4">3 Comments</h3>
          <div class="media mb-4">
            <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
            <div class="media-body">
              <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
              <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.
                Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor
                consetetur at sit.</p>
              <button class="btn btn-sm btn-outline-secondary">Reply</button>
            </div>
          </div>
          <div class="media">
            <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
            <div class="media-body">
              <h6><a href="">John Doe</a> <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
              <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.
                Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor
                consetetur at sit.</p>
              <button class="btn btn-sm btn-outline-secondary">Reply</button>
              <div class="media mt-4">
                <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                <div class="media-body">
                  <h6><a href="">John Doe</a> <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
                  <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor
                    labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed
                    eirmod ipsum. Gubergren clita aliquyam consetetur sadipscing, at tempor amet
                    ipsum diam tempor consetetur at sit.</p>
                  <button class="btn btn-sm btn-outline-secondary">Reply</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Comment List End -->

        <!-- Comment Form Start -->
        <div class="bg-light mb-3" style="padding: 30px;">
          <h3 class="mb-4">Leave a comment</h3>
          <form>
            <div class="form-group">
              <label for="name">Name *</label>
              <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
              <label for="email">Email *</label>
              <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="website">Website</label>
              <input type="url" class="form-control" id="website">
            </div>

            <div class="form-group">
              <label for="message">Message *</label>
              <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group mb-0">
              <input type="submit" value="Leave a comment" class="btn btn-primary font-weight-semi-bold py-2 px-3">
            </div>
          </form>
        </div>
        <!-- Comment Form End -->
      </div>

      <div class="col-lg-4 pt-3 pt-lg-0">
        <!-- Social Follow Start -->
        {{-- <div class="pb-3">
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
        </div> --}}
        <!-- Social Follow End -->

        <!-- Ads Start -->
        {{-- <div class="mb-3 pb-3">
          <a href=""><img class="img-fluid" src="img/news-500x280-4.jpg" alt=""></a>
        </div> --}}
        <!-- Ads End -->

        <!-- Popular News Start -->
        <div class="pb-3">
          <div class="bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Tranding</h3>
          </div>
          @foreach ($trends as $trend)
          <div class="d-flex mb-3">
            @if (substr($trend['image'], 0, 4) === 'http')
            <img src="{{asset($trend->image)}}" style="width: 100px; height: 100px; object-fit: cover;">
            @else
            <img src="{{asset('post-image/' . $trend->image)}}" style="width: 100px; height: 100px; object-fit: cover;">
            @endif
            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
              <div class="mb-1" style="font-size: 13px;">
                <a href="">{{$trend->getCategory['name'] }}</a>
                <span class="px-1">/</span>
                <span>
                  @php
                  if (isset($trend['updated_at'])) {
                  $date = date_create(substr($trend['updated_at'], 0, (strlen($trend['updated_at']) - 9)));

                  setlocale(LC_TIME, 'id_ID.utf8');
                  $hariIni = $date;
                  echo strftime('%A, %d %B %Y', $hariIni->getTimestamp());
                  } else {
                  echo date('d F Y');
                  }
                  @endphp
                </span>
              </div>
              <a class="h6 m-0" href="">{{ $trend['title'] }}</a>
            </div>
          </div>
          @endforeach
        </div>
        <!-- Popular News End -->

        <!-- Tags Start -->
        <div class="pb-3">
          <div class="bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Tags</h3>
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
@push('addon-script')
<script>
  $("#post > div > p > img").removeAttr('style')
  $("#post > div > p > img").addClass('img-fluid w-100')
</script>
@endpush
