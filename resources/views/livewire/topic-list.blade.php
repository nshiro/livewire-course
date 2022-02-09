<div>
    <h1>トピックス一覧</h1>
    <table>
        <tr>
            <td>連番</td>
            <td>タイトル</td>
            <td>本文</td>
            <td>変更</td>
        </tr>

        @foreach($topics as $topic)
        <tr wire:key="topic-{{ $topic->id }}">
            <td>{{ $topic->id }}</td>
            <td>
                {{ $topic->title }}
            </td>
            <td>
                {{ Str::limit($topic->body, 30) }}
            </td>
            <td>変更する</td>
        </tr>
        @endforeach

    </table>
</div>
