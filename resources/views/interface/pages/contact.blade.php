@extends('interface.layout.layout')

@section('content')


<main class="main">

    <div class="page-title light-background">
        <div class="container">
            <h1>İletişim Sayfası</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{route('home')}}">Ana Sayfa</a></li>
                    <li class="current">İleitşim</li>
                </ol>
            </nav>
        </div>
    </div>

    <section id="contact" class="contact section">
        <div class="container" data-aos="fade">
            <div class="row gy-5 gx-lg-5">
                <div class="col-lg-4">
                    <div class="info">
                        <h3>Bizimle İletişime Geçin</h3>
                        <p>bize daha iyi tavsiyeler veya sorunlarınızı vererek kendimizi geliştirelim
                            ve gelişelim.</p>
                        <div class="info-item d-flex">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h4>Konumumuz :</h4>
                                <p>Kocaeli Körfez , Körfez Mah. 000</p>
                            </div>
                        </div>
                        <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>E-Posta Adresimiz:</h4>
                                <p>info@example.com</p>
                            </div>
                        </div>
                        <div class="info-item d-flex">
                            <i class="bi bi-phone flex-shrink-0"></i>
                            <div>
                                <h4>İletişim :</h4>
                                <p>+90 589 554 8855</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if (Auth::check())
                    <div class="col-lg-8">
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
                        <form action="{{route('contact.submit')}}" method="post" role="form">
                            @csrf
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Konu"
                                    required="">
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" placeholder="Mesaj" rows="12" cols="100" required=""></textarea>
                            </div><br>
                            <button type="submit" class="btn btn-primary">Mesajı Gönder</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </section>

</main>

@endsection