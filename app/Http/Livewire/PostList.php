<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public $word;

    protected $queryString = [
        'word' => ['except' => ''],
    ];

    protected $listeners = [
        'created-post' => '$refresh',
    ];

    public function updatingWord()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::query()
            ->orderByDesc('id')
            ->when($this->word, fn($query, $value) => $query->where('title', 'LIKE', '%'.$value.'%'))
            ->paginate(10);

        return view('livewire.post-list', [
            'posts' => $posts,
        ]);
    }
}
