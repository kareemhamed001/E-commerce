<div>
<div class="mb-3">
    <label>Category</label>
    <select class="form-control" name="category"  wire:change="getBrands(event.target.value)">
        <option>--Select Category--</option>
        @forelse($categories as $category)
            <option value="{{$category->id}}" >{{$category->name}}</option>
        @empty
            <option>-- No categories --</option>
        @endforelse
    </select>
</div>

<div class="mb-3">
    <label>Brand</label>
    <select class="form-control" name="brand">
        @forelse($brands as $brand)
            <option value="{{$brand->id}}">{{$brand->name}}</option>
        @empty
            <option>No brands for this category</option>
        @endforelse
    </select>
</div>
</div>
