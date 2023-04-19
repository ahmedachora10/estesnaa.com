<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel5">سحب الاموال عن طريق بايبال</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-4 mb-3">
                    <label for="amount" class="form-label">المبلغ</label>
                    <input type="number" wire:model="amount" id="amount" class="form-control" placeholder="$10"
                        required>

                    <x-error field="amount" />
                </div>
                <div class="col-8 mb-0">
                    <label for="email" class="form-label">البريد الالكتروني</label>
                    <input type="email" wire:model="email" id="email" class="form-control"
                        placeholder="xxxx@xxx.xx" required>
                    <x-error field="email" />
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">الغاء</button>
            <button wire:click="save" type="button" class="btn btn-primary">ارسال الطلب</button>
        </div>
    </div>
</div>
