@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kullanıcılar Toplam {{count($comments)}} Adet Yorum
                                Yapmıştır.</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Kullanıcı</th>
                                        <th>Platformu</th>
                                        <th>Yorum</th>
                                        <th>Durumu</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($comments) && $comments->count() > 0)
                                    @foreach($comments as $comment)
                                    <tr>
                                        <td>{{$comment->id}}</td>
                                        <td>{{$comment->user->name}}<br>
                                            <a href="{{route('admin.userabout',$comment->user->id)}}" type="submit" class="btn btn-warning mt-4">Kullanıcı</a><br><br>
                                        </td>
                                        <td>{{$comment->platforms->subject}}<br>
                                            <a href="{{route('admin.platformsAbout',$comment->platforms->id)}}" type="submit" class="btn btn-success mt-4">İncele</a><br><br>
                                        </td>
                                        <td>{{$comment->message}}</td>
                                        <td>{{$comment->status}}</td>
                                        <td>{{$comment->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.commentsedit',$comment->id)}}" type="submit" class="btn btn-primary">Düzenle</a>
                                            <a href="{{route('comment.delete',$comment->id)}}" type="submit" class="btn btn-danger mt-3">Sil</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection