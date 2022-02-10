<div>
    <h1>トピックス一覧</h1>

    <input type="button" wire:click="$refresh" value="リフレッシュする">
    {{ time() }}

    <table>
        <tr>
            <td>連番</td>
            <td>タイトル</td>
            <td>本文</td>
            <td>変更</td>
            <td>削除</td>
        </tr>

        @foreach($topics as $topic)
            <livewire:topic-item wire:key="topic-{{ $topic->id }}" :topic="$topic">
        @endforeach

    </table>
</div>
