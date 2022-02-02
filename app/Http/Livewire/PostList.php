<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public $word;
    public $title;
    public $body;

    protected $queryString = [
        'word' => ['except' => ''],
    ];

    protected $rules = [
        'title' => ['required'],
        'body' => ['required'],
    ];

    public function updatingWord()
    {
        $this->resetPage();
    }

    public function register()
    {
        $data = $this->validate();

        Post::create($data);

        $this->title = '';
        $this->body = '';

        // $this->reset(['title', 'body']);
        // $this->reset(); // 全ての public プロパティをリセットする
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
