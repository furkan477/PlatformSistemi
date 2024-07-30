@extends('interface.layout.layout')

@section('content')

<main class="main">
    <section id="about-2" class="about-2 section light-background">
        <h2 class="text-center mb-5 mt-3">{{$user->name}} Platformları</h2>
        @if(!empty($user->platforms))
            @foreach($user->platforms as $pltform)
                <div class="container">
                    <div class="content">
                        <div class="row justify-content-center">
                            <div class="offset-md-0 offset-lg-1 col-sm-12 col-md-12 col-lg-12 col-xl-12" data-aos="fade-up">

                                <div class="px-3">
                                    <h2 class="content-title text-start">
                                        Platform Konusu : {{$pltform->subject}}
                                    </h2>
                                    <h3 class="content-title text-start">
                                        Platform Kategorisi : {{$pltform->Category->name}}
                                    </h3>
                                    <p class="lead">
                                        {{$pltform->description}}
                                    </p>
                                    <br>

                                    @if(Auth::id() == $user->id)
                                        <a class="btn btn-info" href="{{route('edit.platform', $pltform->id)}}">Düzenle</a>
                                        <a class="btn btn-success" href="{{route('comment.show', $pltform->id)}}">İncele</a>
                                        <a class="btn btn-danger" href="{{route('delete.platform', $pltform->id)}}">Silmek</a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
            @endforeach
        @endif

        <h2 class="text-center mb-4 mt-5">{{$user->name}} Yorumları</h2>
        <?php 
            $platformID = [];
        ?>
        @if(!empty($user->comments))
            @foreach($user->comments as $comnt)
                @if (!in_array($comnt->platforms->id, $platformID))
                    <?php
                        $platformID[] = $comnt->platforms->id; 
                    ?>
                    <div class="container">
                        <div class="content">
                            <div class="row justify-content-center">
                                <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 order-lg-2 offset-xl-1 mb-4">
                                    <div class="px-3">
                                        <h2 class="content-title text-start">
                                            Platform konusu : <p> {{$comnt->platforms->subject}}</p>
                                        </h2>
                                        <h3 class="content-title text-start">
                                            Platform Kategori : <p> {{$comnt->platforms->Category->name}}</P>
                                        </h3>
                                        <p class="lead">{{$comnt->platforms->description}}</p>
                                    </div>
                                </div>

                                <div class="offset-md-0 offset-lg-1 col-sm-12 col-md-5 col-lg-5 col-xl-4" data-aos="fade-up">
                                    <div class="px-3">

                                        <h2 class="content-title text-start">Kullanıcı : {{$comnt->platforms->user->name}}</h2>
                                        <p class="lead">E-Postası : {{$comnt->platforms->user->email}}</p>
                                        <p class="lead">Telefonu : {{$comnt->platforms->user->phone}}</p>
                                        <p class="lead">Yaşadığı Yer : {{$comnt->platforms->user->country}} ,
                                            {{$comnt->platforms->user->city}}
                                        </p>
                                        <p class="lead">Okulu : {{$comnt->platforms->user->school}}</p>
                                        <a class="btn btn-primary mt-5" type="submit" href="">Profili incele</a>
                                    </div>
                                </div>
                            </div>
                            <h2 class="text-center mt-5">{{$comnt->platforms->subject}} Yorumları</h2><br><br>

                            @foreach ($comnt->platforms->comments as $pltcomnt)
                                <div class="row invoice-info mt-2">
                                    <div class="row mt">
                                        <div class="col-12" style="margin-left: 16.4%;">
                                            <label for=""> {{$pltcomnt->user->name}} Yorumu</label>
                                            <label for="" style="margin-left: 40.5%;"> {{$pltcomnt->created_at}}</label><br>
                                            @if(Auth::id() == $pltcomnt->user->id)
                                                <a style="width: 70px; height: 25px; font-size: 15px; padding: 1px 1px;"
                                                    class="btn btn-primary mb-1" href="{{route('comment.edit',$pltcomnt->id)}}">Düzenle</a>
                                                <a style="width: 30px; height: 25px; font-size: 15px; padding: 1px 1px;"
                                                    class="btn btn-danger mb-1" href{{route('comment.delete',$pltcomnt->id)}}>Sil</a><br>
                                            @endif
                                            <textarea name="message" disabled cols="100" rows="2.5">{{$pltcomnt->message}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div><br>
                @endif
            @endforeach
        @endif

        <h2 class="text-center mb-5 mt-3">{{$user->name}} İletişimleri</h2>
        @if(!empty($user->contacts))
            @foreach($user->contacts as $contact)
                <div class="container">
                    <div class="content">
                        <div class="row justify-content-center">
                            <div class="offset-md-0 offset-lg-1 col-sm-12 col-md-12 col-lg-12 col-xl-12" data-aos="fade-up">

                                <div class="px-3">
                                    <h2 class="content-title text-start">
                                        Platform Konusu : {{$contact->subject}}
                                    </h2>
                                    <p class="lead">
                                        {{$contact->message}}
                                    </p>
                                    <br>

                                    @if(Auth::id() == $user->id)
                                        <a class="btn btn-info" href="{{route('users.contacts.edit', $contact->id)}}">Düzenle</a>
                                        <a class="btn btn-danger" href="{{route('admin.contactdelete', $contact->id)}}">Silmek</a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
            @endforeach
        @endif
    </section>
</main>

@endsection