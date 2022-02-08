<div>
<x-modal wire:model="showModal">
    <form wire:submit.prevent="update" class="my-5 bg-red-100">
        <div>
            タイトル：<input type="text" wire:model.lazy="post.title">
            <div>@error('post.title')<span style="color:red">{{ $message }}</span>@enderror</div>
        </div>
        <div>
            本文：<textarea wire:model.lazy="post.body" cols="30" rows="5"></textarea>
            <div>@error('post.body')<span style="color:red">{{ $message }}</span>@enderror</div>
        </div>

        {{-- form 要素に enctype="multipart/form-data" を付ける必要は無し --}}
        <div>
            写真：<input type="file" wire:model.lazy="photo">
            <div>@error('photo') <span style="color:red">{{ $message }}</span>@enderror</div>

            {{-- ?-> は、PHP8.0からの新機能の Nullsafe Operator（nullsafe 演算子） --}}
            @if($photo?->isPreviewable())
                <img src="{{ $photo->temporaryUrl() }}" width=50 height=50>
            @elseif ($post?->photo)
                <img src="{{ Storage::url($post->photo) }}" width=50 height=50>
            @endif
        </div>

        <div>
            <input type="submit" value="変更する">
        </div>
    </form>
</x-modal>
</div>
