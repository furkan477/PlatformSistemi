@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{$users->name}} PLatformları Hakkında {{count($users->platforms)}}
                                adet platformu bulunmaktadır.</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Kategorisi</th>
                                        <th>Konusu</th>
                                        <th>İçeriği</th>
                                        <th>Durumu</th>
                                        <th>Yorum Sayısı</th>
                                        <th>Oluşturma Tarihi</th>
                                        <th>İşlem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($users->platforms) && $users->platforms->count() > 0)
                                        @foreach ($users->platforms as $user)
                                        <tr>
                                            <th>{{$user->id}}</th>
                                            <th>{{$user->Category->name}}</th>
                                            <th>{{$user->subject}}</th>
                                            <th>{{$user->description}}</th>
                                            <th>{{$user->status}}</th>
                                            <th>{{count($user->comments)}}</th>
                                            <th>{{$user->created_at}}</th>
                                            <th>
                                                <a href="{{route('admin.platformsAbout',$user->id)}}" type="submit" class="btn btn-primary">İncele</a><br>
                                                <a href="{{route('admin.platformsedit',$user->id)}}" type="submit" class="btn btn-info">Düzenle</a><br>
                                                <a href="{{route('delete.platform',$user->id)}}" type="submit" class="btn btn-danger">Sil</a>
                                            </th>
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

        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{$users->name}} yorumları Hakkında {{count($users->comments)}}
                                adet platformu bulunmaktadır.</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Platformu</th>
                                        <th>Yorum</th>
                                        <th>Durumu</th>
                                        <th>Oluşturma Tarihi</th>
                                        <th>İşlem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($users->comments) && $users->comments->count() > 0)
                                        @foreach ($users->comments as $user)
                                        <tr>
                                            <th>{{$user->id}}</th>
                                            <th>
                                                {{$user->platforms->subject}}<br>
                                                <a href="{{route('admin.platformsAbout',$user->platform_id)}}" type="submit" class="btn btn-primary">İncele</a>
                                            </th>
                                            <th>{{$user->message}}</th>
                                            <th>{{$user->status}}</th>
                                            <th>{{$user->created_at}}</th>
                                            <th>
                                                <a href="{{route('comment.delete',$user->id)}}" type="submit" class="btn btn-danger">Silmek</a><br>
                                                <a href="{{route('admin.commentsedit',$user->id)}}" type="submit" class="btn btn-primary">Düzenle</a>
                                            </th>
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


        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{$users->name}} İletişimleri Hakkında {{count($users->contacts)}}
                                adet platformu bulunmaktadır.</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Konusu</th>
                                        <th>İçeriği</th>
                                        <th>Durumu</th>
                                        <th>Oluşturma Tarihi</th>
                                        <th>İşlem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($users->contacts) && $users->contacts->count() > 0)
                                        @foreach ($users->contacts as $user)
                                        <tr>
                                            <th>{{$user->id}}</th>
                                            <th>{{$user->subject}}</th>
                                            <th>{{$user->message}}</th>
                                            <th>{{$user->status}}</th>
                                            <th>{{$user->created_at}}</th>
                                            <th>
                                                <a href="{{route('admin.contactedit',$user->id)}}" type="submit" class="btn btn-info">Düzenle</a><br>
                                                <a href="{{route('admin.contactdelete',$user->id)}}" type="submit" class="btn btn-danger">Sil</a>
                                            </th>
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