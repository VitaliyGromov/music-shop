@php
use App\Models\Brand;
$brands = Brand::all();
@endphp

@props(['selectedBrandId' => ''])

<select id="brand_id" name="brand_id" class="form-control">
    @foreach($brands as $brand)
        <option value="{{$brand->id}}" @if($brand->id === $selectedBrandId) selected @endif>{{$brand->name}}</option>
    @endforeach
</select>
