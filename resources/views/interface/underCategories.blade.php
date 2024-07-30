<option value="{{$category->id}}">{{$prefix}} {{$category->name}}</option>

@if($category->underCategory->isNotEmpty())
    @foreach ($category->underCategory as $underCat)    

        @include('interface.underCategories', ['category' => $underCat , 'prefix' => $prefix.'-'])

    @endforeach
@endif