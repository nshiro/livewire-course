<div>

    {{-- デバッグ --}}
    {{-- @json($topic) --}}

        <div>
            <a href="{{ route('topic.list') }}">一覧へ戻る</a>
        </div>

        <hr>

        <div class="status">
            @if(session('status'))
                {{ session('status') }}
            @endif
        </div>

        <hr>

        <form wire:submit.prevent="update">
            <div>
                タイトル：<input type="text" wire:model.defer="topic.title">
                <div>@error('topic.title') <span style="color:red">{{ $message }}</span>@enderror</div>
            </div>
            <div wire:ignore>
                本文：
                <textarea wire:model.defer="topic.body" cols="30" rows="10"
                    x-data x-init="mdeInit($el)"></textarea>
                <div>@error('topic.body') <span style="color:red">{{ $message }}</span>@enderror</div>
            </div>

            <input type="submit" value="変更する">
        </form>

{{--
SimpleMDE Markdown Editor
https://simplemde.com/
--}}

@push('js')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplemde@1.11.2/dist/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/npm/simplemde@1.11.2/dist/simplemde.min.js"></script>
<script>
function mdeInit(el) {
    const mde = new SimpleMDE({
        element: el,
        spellChecker: false,
    });
}

// 問題点
// 1. 本文がデータ更新されない。
// 2. タイトルで validation エラーが起こると、エディタが元の姿に戻ってしまう。

</script>
@endpush

    </div>