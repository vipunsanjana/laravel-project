<?php $dash.='-- '; ?>
@foreach($subcategories as $subcategory)
    @if($category->id != $subcategory->id )
        <option value="{{$subcategory->id}}" @if($productCategories->contains($subcategory->id)) selected @endif >
        	{{$dash}}{{$subcategory->name}}
        </option>
    @endif
    @if(count($subcategory->subcategory))
        @include('products.subCategoryList-option-for-edit',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach