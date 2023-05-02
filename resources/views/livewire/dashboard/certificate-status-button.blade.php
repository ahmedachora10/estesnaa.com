<div class="form-check form-switch mb-2" dir="rtl">
    <input @class(['form-check-input']) type="checkbox" value="{{ $status }}" wire:change="update"
        @checked($status)>
    <label class="form-check-label" for="flexSwitchCheckChecked">{{ $labelName[$status] }}</label>
</div>
