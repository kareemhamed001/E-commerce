<div>

{{--    <div  class="spinner-border" role="status">--}}
{{--        <span class="sr-only"></span>--}}
{{--    </div>--}}

    <table class="table-responsive">
{{--        {{$quantity}}--}}
        <table   class="table table-bordered table-stripped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product->productColors as $color)
                <tr class="prod-color-tr">
                    <td>{{$color->color->name }}</td>
                    <td>

                        <form wire:submit="" id="colorForm" >

                            <div class="input-group ">
                                <span class="form-control">{{$color->quantity}}</span>
                                <input type="number" name="quantity" value="" class=" form-control form-control-sm"  wire:change="changeQuantity(event.target.value)" >
                                <button type="button" class="btn btn-sm btn-primary text-white" wire:click="updateProductColorQuantity({{$color->id}})">Update</button>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form wire:submit="destroy({{$color->id}})" id="deleteColorForm" >
                                <button type="submit" form="deleteColorForm" class=" btn btn-sm btn-danger text-white">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </table>
</div>




