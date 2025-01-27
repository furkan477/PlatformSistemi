@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <section class="content mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{$kategori->name}} Kategorisini Güncelleme</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{route('admin.categoriesupdate',$kategori->id)}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputStatus">Üst Kategorisini Düzenleyin ve Seçin veya Ana kategori Olarak Seçin</label>
                                <select id="inputStatus" name="cat_ust" class="form-control custom-select">
                                    <option selected value="0">Ana Kategori</option>
                                    @foreach ($categories as $category)
                                        @include('interface.underUpdateCategories',['category'=>$category , 'prefix' => ' '])
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Kategori Adı</label>
                                <input type="text" id="inputName" name="name" class="form-control" value="{{$kategori->name}}">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Kategori Durumu Aktif ise 0</label>
                                <select id="inputStatus" name="status" class="form-control custom-select">
                                    <option {{$kategori->status == 0 ? 'selected' : '' }} value="0">0</option>
                                    <option {{$kategori->status == 1 ? 'selected' : '' }} value="1">1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Kategoriyi Düzenleyin</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection