@extends('interface.layout.layout')

@section('content')

<main class="main">
    <section id="about-2" class="about-2 section light-background">

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
                        </div>
                    </div>
                </div>
                <h2 class="text-center mt-5">{{$platform->subject}} Yorumları</h2><br><br>

                @foreach ($comment as $cmd)
                    <div class="row invoice-info mt-2">
                        <div class="row mt">
                            <div class="col-12" style="margin-left: 16.4%;">
                                <label for=""> {{$cmd->user->name}} Yorumu</label>
                                <label for="" style="margin-left: 40.5%;"> {{$cmd->created_at}}</label><br>
                                @if(Auth::id() == $cmd->user->id)
                                    <a style="width: 70px; height: 25px; font-size: 15px; padding: 1px 1px;" class="btn btn-primary mb-1" href="{{route('comment.edit',$cmd->id)}}">Düzenle</a>
                                    <a style="width: 30px; height: 25px; font-size: 15px; padding: 1px 1px;" class="btn btn-danger mb-1" href="{{route('comment.delete',$cmd->id)}}">Sil</a><br>
                                @endif
                                <textarea name="message" disabled cols="100" rows="2.5"> {{$cmd->message}}</textarea>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="row" style="margin-left: 14.0%;">
                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif
                    @if (session()->get('success'))
                        <div class="alert alert-success">
                            {{session()->get('success')}}
                        </div>
                    @endif
                    @if (session()->get('error'))
                        <div class="alert alert-danger">
                            {{session()->get('error')}}
                        </div>
                    @endif

                    <form action="{{route('comment.create',$platform->id)}}" method="post">
                        @csrf
                        <div class="col-10">
                            <div class="invoice p-3 mb-3">
                                <label for="pla">Platforma Yorum Gönderin</label>
                                <div class="row invoice-info">
                                    <div class="row">
                                        <div class="col-12">
                                            <textarea name="message" cols="100" rows="2.5"></textarea>
                                        </div>
                                        <div class="col-10"><br>
                                            <button type="submit" class="btn btn-primary btn-sm col-12"
                                                style="margin-left: 10.0%;">Yorum Gönder</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><br>

    </section>
</main>

@endsection