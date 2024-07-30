@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{count($users)}} Kullanıcı Bulunmaktadır.</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Ad Soyad</th>
                                        <th>E-Posta</th>
                                        <th>Durumu</th>
                                        <th>Admin</th>
                                        <th>Telefon</th>
                                        <th>Konumu</th>
                                        <th>Okulu</th>
                                        <th>Katılış Tarihi</th>
                                        <th>Kullanıcı İşleminiz</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($users) && $users->count() > 0)
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->status}}</td>
                                                <td>{{$user->is_admin}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td>{{$user->country}} , {{$user->city}}</td>
                                                <td>{{$user->school}}</td>
                                                <td>{{$user->created_at}}</td>
                                                <td>
                                                    <a type="submit" href="{{route('admin.userabout',$user->id)}}" class="btn btn-info">Kullanıcının Tüm Bilgileri</a>
                                                <td>
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