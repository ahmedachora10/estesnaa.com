<div>
    <div class="input-group mb-3" dir="rtl">
        <button class="btn btn-outline-secondary" wire:click="addFeature" type="button" id="button-addon">
            <div class="fas fa-plus"></div>
        </button>
        <input type="text" class="form-control text-start" wire:model.defer="feature" placeholder="خاصية جديدة"
            aria-label="خاصية جديدة" aria-describedby="button-addon2">
    </div>

    <div class="row justify-content-start align-items-center">
        @foreach ($features as $index => $item)
            <div class="col-md-4" dir="rtl">
                <div class="input-group mb-3">
                    <button class="btn btn-outline-danger px-2" wire:click="removeFeature({{ $index }})"
                        type="button" id="button-addon{{ $index }}">
                        <div class="bx bx-trash"></div>
                    </button>
                    <input type="text" value="{{ $item }}" name="features[]" class="form-control text-start"
                        placeholder="خاصية جديدة" aria-label="خاصية جديدة"
                        aria-describedby="button-addon{{ $index }}">
                </div>
            </div>
        @endforeach
    </div>

</div>
