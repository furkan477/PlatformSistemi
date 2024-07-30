@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kullanıcıların Toplam {{count($contacts)}} Adet İletişimi
                                Bulunmaktadır.</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Adı Soyadı</th>
                                        <th>Konusu</th>
                                        <th>Mesajı</th>
                                        <th>Durunu</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>Kullanıcı İşleminiz</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($contacts) && $contacts->count() > 0)
                                    @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{$contact->id}}</td>
                                        <td>{{$contact->user->name}}<br>
                                            <a href="{{route('admin.userabout',$contact->user->id)}}" type="submit" class="btn btn-warning mt-4">Kullanıcı</a><br><br>
                                        </td>
                                        <td>{{$contact->subject}}</td>
                                        <td>{{$contact->message}}</td>
                                        <td>{{$contact->status}}</td>
                                        <td>{{$contact->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.platformsAbout',$contact->id)}}" type="submit" class="btn btn-primary">İncele</a>
                                            <a href="{{route('admin.contactdelete',$contact->id)}}" type="submit" class="btn btn-danger">Sil</a>
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