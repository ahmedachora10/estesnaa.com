<div>

    @if (count($chat->messages) > 0)
        <div class="bg-white shadow-sm p-3 rounded-2 mb-3">
            <div id="chat-messages" data-chat="{{ $chat->id }}">
                @forelse ($chat->messages as $message)
                    <div
                        class="mb-4 d-flex @if (auth()->id() == $message->user_id) justify-content-start @else justify-content-end @endif"">
                        <div>
                            <p style="width: fit-content"
                                class="fs-14 fw-600 d-block rounded-1 py-2 px-3 mb-0 @if (auth()->id() == $message->user_id) bg-dark text-right text-white @else text-left bg-light @endif">
                                @if (str($message->content)->endsWith(['.jpg', '.jpeg', '.png', '.webp']))
                                    <a href="{{ asset($message->content) }}" target="_blank">
                                        <img src="{{ asset($message->content) }}" alt="image" width="150px"
                                            class="img-thumbnail">
                                    </a>
                                @elseif (str($message->content)->endsWith(['.docx', '.pdf', '.xlsx']))
                                    <a href="{{ asset($message->content) }}" target="_blank">
                                        {{-- @if (str($message->content)->endsWith('.docx'))
                                            <i class="fa-sharp fa-light fa-file-word"></i>
                                        @elseif(str($message->content)->endsWith('.pdf'))
                                            <i class="fa-solid fa-file-pdf"></i>
                                        @elseif(str($message->content)->endsWith('.xlsx'))
                                            <i class="fa-duotone fa-file-excel"></i>
                                        @else --}}
                                        <i class="fa-solid fa-file fa-2xl text-white"></i>
                                        {{-- @endif --}}
                                        {{-- <img src="{{ asset($message->content) }}" alt="image" width="150px"
                                            class="img-thumbnail"> --}}
                                    </a>
                                @else
                                    {{ $message->content }}
                                @endif
                            </p>
                            <span class="d-block mt-2"
                                style="font-size: 14px">{{ $message->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @empty
                    <p class="text-muted fs-13 fw-600 m-0">لا توجد رسائل لعرضها</p>
                @endforelse
            </div>
        </div>
    @endif

    <div class="bg-white shadow-sm p-3 rounded-2">

        <div class="form-group">
            <label for="" class=" form-label">محتوى الرسالة</label>
            <textarea name="" id="" cols="30" rows="4" class=" form-control" wire:model.defer="message"></textarea>
            @error('message')
                <span class="d-block text-danger my-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mt-3">
            <input type="file" wire:model="file" class="form-control">
            @error('file')
                <span class="d-block text-danger my-2">{{ $message }}</span>
            @enderror
            <span class="d-block mt-2 text-small text-secondary">اسأل مقدم الخدمة ما تريد معرفته عن هذه الخدمة. يمنع
                وضع وسائل تواصل خارجية.</span>
        </div>

        <div class="my-2">
            <div wire:loading wire:target="file" class="text-info">جاري تحميل الملف...</div>
            <div class="text-success" wire:loading.remove>تم اضافة الملف بنجاح</div>
        </div>

        <div class="d-flex justify-content-start mt-4">
            <button class="btn btn-primary px-4 py-1 rounded-1 fw-bold" wire:click="save">حفظ </button>
        </div>
    </div>
</div>
