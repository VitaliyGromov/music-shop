<div class="mt-3">

    <div class="mb-3">
        <label for="category_id" class="form-check-label">{{__('Category')}}</label>
        <select wire:model="selectedCategory" id="category_id" name="category_id" class="form-control">
            <option value="" selected>{{__('- Choose category -')}}</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <x-error name="region"/>
    </div>

    @if (!is_null($selectedRussianRegion))
        <div class="mb-3">
            <label for="subcategory_id" class="col-md-4 col-form-label text-md-right">{{ __('Subcategory') }}</label>
            <select wire:model="$selectedSubcategory" name="subcategory_id" class="form-control">
                <option value="">{{__('- Choose subcategory -')}}</option>
                @foreach($subcategories as $subcategory)
                    <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                @endforeach
            </select>
            <x-error name="city"/>
        </div>
    @endif
</div>
