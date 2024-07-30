@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <section class="content mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{$contact->user->name}} Platformunu Güncelleme</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{route('admin.contactupdate',$contact->id)}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Konu</label>
                                <textarea type="text" id="inputName" name="subject" class="form-control">{{$contact->subject}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Mesaj</label>
                                <textarea type="text" id="inputName" name="message" class="form-control">{{$contact->message}}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Platformu Düzenleyin</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection