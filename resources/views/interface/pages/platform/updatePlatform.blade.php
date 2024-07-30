@extends('interface.layout.layout')

@section('content')


<main class="main">

    <div class="page-title light-background">
        <div class="container">
            <h1>Yeni Platform Oluştur</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{route('home')}}">Ana Sayfa</a></li>
                    <li class="current">Yeni Platform</li>
                </ol>
            </nav>
        </div>
    </div>

    <section id="contact" class="contact section">
        <div class="container" data-aos="fade">
            <div class="row gy-5 gx-lg-5 justify-content-center">
                <div class="col-lg-10">
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
                    <form action="{{route('update.platform',$platforms->id)}}" method="post" role="form">
                        @csrf
                        <div class="form-group">
                            <select class="form-control" name="category_id">
                                <option Selected value="">Lütfen Kategori Seçiniz : ></option>
                                @foreach ($categories as $category)
                                    @include('interface.underUpdateCategories', ['category' => $category, 'prefix' => ''])
                                @endforeach

                            </select>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 form-group">
                                <input type="text" disabled value="{{$user->name}}" name="name" class="form-control" style="height: 48px; padding: 10px 15px;" d="name" placeholder="Your Name">
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" disabled class="form-control" value="{{$user->email}}" name="email" style=" height: 48px; padding: 10px 15px;" id="email" placeholder="Your Email">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" style=" height: 48px; padding: 10px 15px;" value="{{$platforms->subject}}" name="subject" id="subject" placeholder="Subject">
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="description" placeholder="description"
                                style="padding: 10px 12px; height: 290px;">{{$platforms->description}}</textarea>
                        </div><br>
                        <div class="text-center"><button type="submit" class="btn btn-success">Yeni Platform
                                Oluştur</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection