@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sitenin Toplam Kategorisi : {{count($categories)}}</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Kategori Adı</th>
                                        <th>Kategori Durumu</th>
                                        <th>CAT_UST</th>
                                        <th>Platform Sayısı</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>İşlemi</th>
                                        <th>Alt Kategorisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($categories) && $categories->count() > 0)
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->status}}</td>
                                        
                                        <td>{{$category->cat_ust}}</td>
                                        <td>{{count($category->platforms)}}</td>
                                        <td>{{$category->created_at}}</td>
                                        <td>
                                            <a type="submit" href="{{route('admin.categoriesdelete',$category->id)}}" class="btn btn-danger">Sil</a>
                                            <a type="submit" href="{{route('admin.categoriesedit',$category->id)}}" class="btn btn-primary">Düzenle</a>
                                        </td>
                                        <td>
                                        @foreach ($category->underCategory as $alt_cat)
                                            {{$alt_cat->name}},<br>
                                        @endforeach
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