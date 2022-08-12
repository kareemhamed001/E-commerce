{{--add brand modal--}}
<div wire:ignore.self class="modal fade" id="deleteSliderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Slider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <form wire:submit.prevent="destroy_slider"  method="post">
                <div class="modal-body">
                    Delete This Slider?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                    <button type="submit" class="btn btn-primary" >Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
