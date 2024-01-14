<div>
    <div class="form-group">
        <label for="category_id" class="col-form-label">{{__('Category')}}</label>
        <select wire:model.live="selectedCategory" id="category_id" name="category_id" class="form-control">
            <option value="" selected>{{__('Choose category')}}</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    @if (!is_null($selectedCategory))
        <div class="mb-3">
            <label for="subcategory_id" class="col-md-4 col-form-label text-md-right">{{ __('Subcategory') }}</label>
            <select wire:model.live="selectedSubcategory" name="subcategory_id" class="form-control" id="subcategory_id">
                <option value="" selected>{{__('- Choose subcategory -')}}</option>
                @foreach($subcategories as $subcategory)
                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                @endforeach
            </select>
        </div>
    @endif
</div>
