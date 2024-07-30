@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kullanıcıların Toplam {{count($platforms)}} Adet Platform
                                Bulunmaktadır.</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Kategorisi</th>
                                        <th>Kullanıcısı</th>
                                        <th>Toplam Yorumu</th>
                                        <th>Konusu</th>
                                        <th>İçeriği</th>
                                        <th>Durumu</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>Kullanıcı İşleminiz</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($platforms) && $platforms->count() > 0)
                                    @foreach($platforms as $platform)
                                    <tr>
                                        <td>{{$platform->id}}</td>
                                        <td>{{$platform->Category->name}}</td>
                                        <td>{{$platform->user->name}}</td>
                                        <td>{{count($platform->comments)}}</td>
                                        <td>{{$platform->subject}}</td>
                                        <td>{{$platform->description}}</td>
                                        <td>{{$platform->status}}</td>
                                        <td>{{$platform->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.platformsAbout',$platform->id)}}" type="submit" class="btn btn-primary">İncele</a><br><br>
                                            <a href="{{route('delete.platform',$platform->id)}}" type="submit" class="btn btn-danger">Sil</a>
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