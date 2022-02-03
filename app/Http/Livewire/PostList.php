<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public $word;
    // public $title;
    // public $body;
    public $post = [];

    protected $queryString = [
        'word' => ['except' => ''],
    ];

    protected $rules = [
        'post.title' => ['required', 'max:8'],
        'post.body' => ['required'],
    ];

    public function updatingWord()
    {
        $this->resetPage();
    }

    public function updated($key)
    {
        $this->validateOnly($key);
    }

    public function register()
    {
        $data = $this->validate();

        Post::create($data['post']);

        $this->reset('post');

        // $this->title = '';
        // $this->body = '';

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
