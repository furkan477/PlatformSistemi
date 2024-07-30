@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <section class="content mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{$comments->user->name}} Yorumunu Güncelleme</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{route('admin.commentsupdate',$comments->id)}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Yorum</label>
                                <textarea type="text" id="inputName" name="message" class="form-control">{{$comments->message}}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Yorumu Düzenleyin</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection