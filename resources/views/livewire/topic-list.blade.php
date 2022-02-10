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

@push('js')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4@5/bootstrap-4.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
function confirmDeleteTopic(topicId) {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
        Livewire.emit('topic-deleted', topicId)
    }
  })
}
</script>
@endpush

</div>
