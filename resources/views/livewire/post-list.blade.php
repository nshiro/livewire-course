<div>
    <form>
        検索用語：<input type="text" wire:model="word">
    </form>

    <hr>

    <form wire:submit.prevent="register" class="my-5 bg-sky-100">
        <div>
            タイトル：<input type="text" wire:model.lazy="title">
            <div>@error('title')<span style="color:red">{{ $message }}</span>@enderror</div>
        </div>
        <div>
            本文：<textarea wire:model.lazy="body" cols="30" rows="5"></textarea>
            <div>@error('body')<span style="color:red">{{ $message }}</span>@enderror</div>
        </div>
        <div>
            <input type="submit" value="送信する">
        </div>
    </form>

    <hr>

    <ul>
        @foreach($posts as $post)
        <li wire:key="post-{{ $post->id }}">
            {{ $post->title }}
        </li>
        @endforeach
    </ul>

    <div>
        {{ $posts->links() }}
    </div>
</div>
