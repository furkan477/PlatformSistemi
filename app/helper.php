<?php
use App\Models\Category;

if(!function_exists("Categories")){
    function Categories($cat_id = null)
    {
        $categories = Category::where('cat_ust',$cat_id)->get();

        foreach($categories as $category){
            if($category->underCategory->count() > 0){
                Categories($category->id);
            }
        }
    }
}

?>