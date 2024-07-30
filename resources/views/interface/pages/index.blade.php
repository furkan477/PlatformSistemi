@extends('interface.layout.layout')

@section('content')

<main class="main">
  <section id="about-2" class="about-2 section light-background">
    <br>
    <div class="container">
      <div class="content">
        <form action="{{route('category.filter')}}" method="post">
          @csrf
          <select type="submit" class="form-control justify-content-center" name="category_id" style="margin-left: 10.0%; width: 1070px; height: 45px; font-size: 15px; padding: 1px 14px;">
              @foreach ($categories as $category)
                @include('interface.underCategories',['category'=>$category,'prefix'=>''])
              @endforeach
          </select><br>
          <button style="margin-left: 10.0%;" type="submit" class="btn btn-warning">Kategorilere Göre Platformları Getir</button>
        </form>
      </div>
    </div>
    <br>
    @foreach($platforms as $platform)
    <div class="container">
      <div class="content">
        <div class="row justify-content-center">
          <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 order-lg-2 offset-xl-1 mb-4">
          <div class="px-3">
            <h2 class="content-title text-start">
            Platform konusu : <p>{{$platform->subject}}</p>
            </h2>
            <h3 class="content-title text-start">
            Platform Kategori : <p>{{$platform->Category->name}}</P>
            </h3>
            <p class="lead">{{$platform->description}}</p>
          </div>
          </div>

          <div class="offset-md-0 offset-lg-1 col-sm-12 col-md-5 col-lg-5 col-xl-4" data-aos="fade-up">
          <div class="px-3">

            <h2 class="content-title text-start">Kullanıcı : {{$platform->user->name}}</h2>
            <p class="lead">E-Postası : {{$platform->user->email}}</p>
            <p class="lead">Telefonu : {{$platform->user->phone}}</p>
            <p class="lead">Yaşadığı Yer : {{$platform->user->country}} , {{$platform->user->city}}</p>
            <p class="lead">Okulu : {{$platform->user->school}}</p>
            <a class="btn btn-primary mt-5" type="submit" href="{{route('profile',$platform->user->id)}}">Profili incele</a>
            <a class="btn btn-secondary mt-1" type="submit" href="{{route('comment.show',$platform->id)}}">Yorum Gönder Veya Yorumları İncele</a>
          </div>
          </div>
        </div>
      </div>
    </div><br>

  @endforeach
  </section>

  <section id="services" class="services section light-background">

    <div class="container">
      <div class="row gy-4 justify-content-center">

        <div class="col-lg-3">
          <div class="services-item" data-aos="fade-up">
            <div class="services-icon">
              <i class="bi bi-bullseye"></i>
            </div>
            <div>
              <h3>Bilgi</h3>
              <p>Separated they live in Bookmarksgrove right at the coast</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="services-item" data-aos="fade-up" data-aos-delay="100">
            <div class="services-icon">
              <i class="bi bi-command"></i>
            </div>
            <div>
              <h3>Bilgi</h3>
              <p>Separated they live in Bookmarksgrove right at the coast</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="services-item" data-aos="fade-up" data-aos-delay="200">
            <div class="services-icon">
              <i class="bi bi-bar-chart"></i>
            </div>
            <div>
              <h3>Bilgi</h3>
              <p>Separated they live in Bookmarksgrove right at the coast</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section id="stats" class="stats section light-background">

    <div class="container">

      <div class="row gy-4 justify-content-center">
        <div class="col-lg-9 ps-lg-4">
          <span class="content-subtitle">.</span>
          <h2 class="content-title">User Bilgisi</h2>
          <p class="lead">
            Far far away, behind the word mountains, far from the countries
            Vokalia and Consonantia.
          </p>
          <p class="mb-5">
            There live the blind texts. Separated they live in Bookmarksgrove
            right at the coast of the Semantics, a large language ocean.
          </p>
          <div class="row mb-5 count-numbers">

            <div class="col-4 counter" data-aos="fade-up" data-aos-delay="100">
              <span data-purecounter-separator="true" data-purecounter-start="0" data-purecounter-end="3919"
                data-purecounter-duration="1" class="purecounter number"></span>
              <span class="d-block">Coffee</span>
            </div>

            <div class="col-4 counter" data-aos="fade-up" data-aos-delay="200">
              <span data-purecounter-separator="true" data-purecounter-start="0" data-purecounter-end="2831"
                data-purecounter-duration="1" class="purecounter number"></span>
              <span class="d-block">Codes</span>
            </div>

            <div class="col-4 counter" data-aos="fade-up" data-aos-delay="300">
              <span data-purecounter-separator="true" data-purecounter-start="0" data-purecounter-end="1914"
                data-purecounter-duration="1" class="purecounter number"></span>
              <span class="d-block">Projects</span>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>

  <section id="blog-posts" class="blog-posts section">
    <div class="container section-title" data-aos="fade-up">
      <p></p>
      <h2>Son Atılan 3 Platform</h2>
    </div>
    <div class="container">

      <div class="row gy-4">
        @if (!empty($endplatforms))
          @foreach ($endplatforms as $end)

            <div class="col-md-6 col-lg-4">
              <div class="post-entry" data-aos="fade-up" data-aos-delay="100">
                <div class="post-content">
                  <div class="meta">
                    <a href="#" class="cat">{{$end->Category->name}}</a> •
                    <span class="date">{{$end->created_at}}</span>
                  </div>
                  <h3><a href="#">{{$end->subject}}</a></h3>
                  <p>
                    {{$end->description}}
                  </p>

                  <div class="d-flex author align-items-center">
                    <div class="author-name">
                      <strong class="d-block">{{$end->user->name}}</strong>
                      <span class="">{{$end->user->school}}</span>
                    </div>
                  </div>
                  <div class="d-flex author align-items-center">
                    <a class="btn btn-primary mt-3" type="submit" href="{{route('profile',$end->user->id)}}">Profili İncele</a>
                    <a class="btn btn-warning mt-3" style="margin-left: 1.0%;" type="submit" href="{{route('comment.show',$end->id)}}">Platform İncele</a>
                  </div>
                </div>
              </div>
            </div>

          @endforeach
        @endif
      </div>
    </div>
  </section>

</main>

<br>
@endsection