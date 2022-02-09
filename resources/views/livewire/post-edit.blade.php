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
            写真：<input type="file" wire:model.lazy="photo"
            x-data x-on:show-modal.window="$el.value=''">

            {{-- Alpine.js では、livewire が発行したブラウザ標準のイベント（カスタムイベント）を下記の形で listen する事ができる。
            x-on:イベント名.window=""  （今回の場合は、x-on:show-modal.window=""）

            （注意事項1）
            Alpine.js では、HTML属性に埋め込む関係上、イベント名は大文字小文字が区別されない為、以下のようになる。
            【NG】 <input x-on:showModal.window="" ...>  イベント名は 'showModal' と想定
            【OK】 <input x-on:show-modal.window="" ...>  イベント名は 'show-modal' と想定
            【OK】 <input x-on:show-modal.camel.window="" ...>  イベント名は 'showModal' と想定

            （注意事項2）
            Alpine.js では、イベントの省略記法を使い @イベント名.window="" のように書く事もできる。
            ただ、今回のように @show から始まる場合は、Laravel の @show ディレクティブと被ってしまい、認識されずうまくいかない。
            【NG】 <input @show-modal.window="" ...>

            参考URL
            https://readouble.com/livewire/2.x/ja/events.html （最下部）
            https://ja.javascript.info/dispatch-events
            https://alpinejs.dev/essentials/events#listening-for-events-on-window
            https://alpinejs.dev/directives/on#custom-events
            --}}


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
