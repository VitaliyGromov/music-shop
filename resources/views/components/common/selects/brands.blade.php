@php
use App\Models\Brand;
$brands = Brand::all();
@endphp

<select id="brand_id" name="brand_id" class="form-control">
    @foreach($brands as $brand)
        <option value="{{$brand->id}}">{{$brand->name}}</option>
    @endforeach
</select>
