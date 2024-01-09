<x-modal.index id="product-create">
    <x-slot name="title">
        {{__('Create new product')}}
    </x-slot>
    <x-slot name="body">
        <form action="{{route('admin.products.store')}}" id="create-product" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="col-form-label">{{__('Product name')}}</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="description" class="col-form-label">{{__('Description')}}</label>
                <textarea id="description" name="description" class="form-control" rows="8"></textarea>
            </div>
            <div class="form-group">
                <label for="price" class="col-form-label">{{__('Price')}}</label>
                <input type="number" name="price" class="form-control" id="price">
            </div>
            <div class="form-group">
                <label for="images" class="col-form-label">{{__('Images')}}</label>
                <input type="file" class="form-control" name="images[]" id="images" multiple>
            </div>
            <div class="form-check mt-3">
                <label for="in_stock" class="form-check-label">{{__('Is in stock?')}}</label>
                <input type="checkbox" name="in_stock" class="form-check-input" id="in_stock">
            </div>
            <div class="form-group">
                <label for="brand_id" class="col-form-label">{{__('Brand')}}</label>
                <x-common.selects.brands/>
            </div>
            <livewire:categories-subcategories />
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="submit" form="create-product" class="btn btn-primary">{{__('Create')}}</button>
    </x-slot>
</x-modal.index>
