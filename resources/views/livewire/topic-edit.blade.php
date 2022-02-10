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
            <div>
                本文：
                <textarea wire:model.defer="topic.body" cols="30" rows="10"></textarea>
                <div>@error('topic.body') <span style="color:red">{{ $message }}</span>@enderror</div>
            </div>

            <input type="submit" value="変更する">
        </form>

    </div>