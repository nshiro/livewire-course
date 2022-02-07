<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public $word;
    // private $updatedPost = false;

    protected $queryString = [
        'word' => ['except' => ''],
    ];

    protected $listeners = [
        'created-post' => '$refresh',
        'updated-post' => 'updatedPost',
    ];

    public function updatedPost()
    {
        // $this->updatedPost = true;

        session()->flash('updatedPost', true);
    }

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
