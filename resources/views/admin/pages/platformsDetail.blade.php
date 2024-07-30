@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <section class="content">
        <div class="card mt-5">
            <div class="card-header">
                <h3 class="card-title">{{$platforms->subject}} Detayı ve {{count($platforms->comments)}} adet yorumu
                    vardır</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-10 col-md-10 col-lg-10">
                        <h3 class="text-primary"><i class="fas fa-paint-brush"></i>{{$platforms->subject}}</h3><br>
                        <p class="text-muted">{{$platforms->description}}</p>
                        <br>
                        <div class="text-muted">
                            <p class="text-sm">Oluşturan kullanıcı
                                <b class="d-block">{{$platforms->user->name}}</b>
                            </p>
                            <p class="text-sm">Kullanıcı iletişim
                                <b class="d-block">{{$platforms->user->phone}}</b>
                            </p><br>
                            <a href="{{route('admin.userabout', $platforms->user->id)}}"
                                class="btn btn-primary">Kullancıyı İncele</a>
                        </div>
                    </div>
                    <hr><br>
                    @if(!empty($platforms->comments) && $platforms->comments->count() > 0)
                        @foreach($platforms->comments as $comment)
                            <div class="col-12 col-md-10 col-lg-8 mt-5">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="post">
                                            <div class="user-block">
                                                <a><b>{{$comment->user->name}}</b></a><br>
                                                <a><b>{{$comment->user->country}}</b></a>
                                            </div>
                                            <p rows="2" cols="155">
                                                {{$comment->message}}
                                            </p>

                                            <p>
                                                <a><i class="fas fa-link mr-1"></i>{{$comment->created_at}}</a><br>
                                                <a class="btn btn-info mt-2" href="{{route('admin.userabout',$comment->user->id)}}">Kullancıyı incele</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section>
</div>

@endsection