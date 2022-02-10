    <tr>
        <td>{{ $topic->id }}</td>
        <td>
            {{ $topic->title }}
        </td>
        <td>
            {{ Str::limit($topic->body, 30) }}
        </td>
        <td><a href="{{ route('topic.edit', $topic) }}">変更する</a></td>
        <td><input type="button" value="削除する" wire:click="deleteTopic"></td>
    </tr>

