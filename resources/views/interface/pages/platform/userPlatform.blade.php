@extends('interface.layout.layout')

@section('content')

<main class="main">
    <section id="about-2" class="about-2 section light-background">
        @if($platform->isNotEmpty())
            @foreach ($platform as $pltform)
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
                                    <a class="btn btn-info" href="{{route('edit.platform',$pltform->id)}}">Düzenle</a>
                                    <a class="btn btn-success" href="{{route('comment.show',$pltform->id)}}">İncele</a>
                                    <a class="btn btn-danger" href="{{route('delete.platform',$pltform->id)}}">Sil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
            @endforeach
        @endif
    </section>

    @endsection