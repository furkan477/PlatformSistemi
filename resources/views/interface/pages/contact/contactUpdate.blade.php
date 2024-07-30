@extends('interface.layout.layout')

@section('content')

<div>
    <main class="main">
        <section id="about-2" class="about-2 section light-background">

            <div class="container">
                <div class="content">
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

                        <form action="{{route('users.contacts.update', $contacts->id)}}" method="post">
                            @csrf
                            <div class="col-10">
                                <div class="invoice p-3 mb-3">
                                    <label for="pla">İletişim Mesajı Düzenleme</label><br>
                                    <div class="row invoice-info">
                                        <div class="row">
                                            <div class="col-12">
                                                <textarea name="subject" cols="100"
                                                    rows="2.5">{{$contacts->subject}}</textarea>
                                            </div>
                                            <div class="col-12">
                                                <textarea name="message" cols="100"
                                                    rows="2.5">{{$contacts->message}}</textarea>
                                            </div>
                                            <div class="col-10"><br>
                                                <button type="submit" class="btn btn-primary btn-sm col-12"
                                                    style="margin-left: 10.0%;">İletişimi Düzenle</button>
                                            </div>
                                        </div>
                                    </div>x
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><br>

        </section>
    </main>
</div>

@endsection