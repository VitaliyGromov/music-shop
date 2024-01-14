<x-modal.index id="product-edit">
    <x-slot name="title">
        {{__('Edit ')}} {{$product->name}}
    </x-slot>
    <x-slot name="body">
        <form action="{{route('admin.products.update', $product->id)}}" id="edit-product" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name" class="col-form-label">{{__('Product name')}}</label>
                <input type="text" name="name" class="form-control" value="{{$product->name}}" id="name">
            </div>
            <div class="form-group">
                <label for="description" class="col-form-label">{{__('Description')}}</label>
                <textarea id="description" name="description" class="form-control" rows="8">{{$product->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="price" class="col-form-label">{{__('Price')}}</label>
                <input type="number" name="price" class="form-control" value="{{$product->price}}" id="price">
            </div>
            <div class="form-group">
                <label for="images" class="col-form-label">{{__('Images')}}</label>
                <input type="file" class="form-control" name="images[]" id="images" multiple>
            </div>
            <div class="form-check mt-3">
                <label for="in_stock" class="form-check-label">{{__('Is in stock?')}}</label>
                <input type="checkbox" name="in_stock" @if($product->in_stock) checked @endif class="form-check-input" id="in_stock">
            </div>
            <div class="form-group">
                <label for="brand_id" class="col-form-label">{{__('Brand')}}</label>
                <x-common.selects.brands selectedBrandId="{{$product->brand->id}}"/>
            </div>
            <livewire:categories-subcategories
                :selectedCategory="$product->subcategory->category->id"
                :selectedSubcategory="$product->subcategory->id"/>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="submit" form="edit-product" class="btn btn-primary">{{__('Create')}}</button>
    </x-slot>
</x-modal.index>
