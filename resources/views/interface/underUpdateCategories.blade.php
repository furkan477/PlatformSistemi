<option value="{{$category->id}}" {{$categories->id = 'selected'}}>{{$prefix}} {{$category->name}}</option>

@if($category->underCategory->isNotEmpty())
    @foreach ($category->underCategory as $underCat)    

        @include('interface.underUpdateCategories', ['category' => $underCat , 'prefix' => $prefix.'-'])

    @endforeach
@endif