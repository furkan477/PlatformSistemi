@extends('interface.layout.layout')
@section('content')

@section('style')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">
@endsection

<main class="main">
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <h3 class="profile-username text-center">{{$user->name}}</h3>
                  <p class="text-muted text-center">{{$user->school}}</p>
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Yayınladığı Platform Sayısı</b> <a href="{{route('users.platform.comment',$user->id)}}" class="float-right">{{$user->name}} {{$user->platforms->count()}} adet platfromu bulunmaktadır</a>
                    </li>
                    <li class="list-group-item">
                      <b>Yaptığı Yorum Sayısı</b> <a href="{{route('users.platform.comment',$user->id)}}" class="float-right">{{$user->name}} {{$user->comments->count()}} adet yorumu bulunmaktadır</a>
                    </li>
                    <li class="list-group-item">
                      <b>İletişime Geçme Sayısı</b> <a href="{{route('users.platform.comment',$user->id)}}" class="float-right">{{$user->name}} {{$user->contacts->count()}} adet iletişimi bulunmaktadır</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card card-primary">
                @if (Auth::id() == $user->id)
                  <form action="{{route('profile.update',Auth::id())}}" method="post">
                    @csrf
                    <div class="card-header card-primary">
                      <h3 class="card-title">{{$user->name}} Hakkında</h3>
                    </div>
                    <div class="card-body">
                      <strong><i class="far fa-file-alt  mr-1">Ad Soyad</i></strong><br>
                      <input class="mt-2" style="width: 270px; height: 25px; font-size: 15px; padding: 5px 5px;" name="name" type="text" value="{{$user->name}}">
                      <hr>
                      <strong><i class="fas fa-book mr-1"> Okulum veya Mezuniyetim</i></strong><br>
                      <input class="mt-2" style="width: 270px; height: 25px; font-size: 15px; padding: 5px 5px;" name="school" type="text" value="{{$user->school}}">
                      <hr>
                      <strong><i class="fas fa-map-marker-alt mr-1"></i>Yaşadığım Ülke</strong><br>
                      <input class="mt-2" style="width: 270px; height: 25px; font-size: 15px; padding: 5px 5px;" type="text" name="country" value="{{$user->country}}">
                      <hr>
                      <strong><i class="fas fa-map-marker-alt mr-1">Yaşadığım Şehir</i></strong><br>
                      <input class="mt-2" style="width: 270px; height: 25px; font-size: 15px; padding: 5px 5px;" name="city" type="text" value="{{$user->city}}">
                      <hr>
                      <strong><i class="fas fa-pencil-alt mr-1"></i>Telefon Numaram</strong><br>
                      <input class="mt-2" style="width: 270px; height: 25px; font-size: 15px; padding: 5px 5px;" name="phone" type="text" value="{{$user->phone}}">
                      <hr>
                      <strong><i class="far fa-file-alt mr-1"></i> E-Posta Adresim</strong>
                      <p class="text-muted">{{$user->email}} (! E-posta adresinizde değişiklik yapamazsınız.)</p>
                      <hr>
                      <button class="btn btn-primary" type="submit" style="height: 100%;">Profili Düzenle</button>
                    </div>
                  </form>
                @else
                  <div class="card-header">
                    <h3 class="card-title">{{$user->name}} Hakkında</h3>
                  </div>
                  <div class="card-body">
                    <strong><i class="fas fa-book mr-1"> Okulu veya Mezuniyeti</i></strong>
                    <p class="text-muted">{{$user->school}}</p>
                    <hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Yaşadığı Yer</strong>
                    <p class="text-muted">{{$user->country}} | {{$user->city}}</p>
                    <hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i> Telefon</strong>
                    <p class="text-muted">{{$user->phone}}</p>
                    <hr>
                    <strong><i class="far fa-file-alt mr-1"></i>E-Posta</strong><p>{{$user->email}}</p>
                  </div>
                @endif

              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</main>

@section('script')
<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js?v=3.2.0"></script>
<script src="https://adminlte.io/themes/v3/dist/js/demo.js"></script>
@endsection
@endsection