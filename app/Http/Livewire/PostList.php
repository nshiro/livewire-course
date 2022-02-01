<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostList extends Component
{
    // public $posts;
    public $word;

    // public function mount()
    // {
    //     $this->posts = Post::get();
    // }

    // public function updatedWord($value)
    // {
    //     $this->posts = Post::where('title', 'LIKE', '%'.$value.'%')->get();
    // }

    public function render()
    {
        $posts = Post::query()
            ->when($this->word, fn($query, $value) => $query->where('title', 'LIKE', '%'.$value.'%'))
            ->get();

        return view('livewire.post-list', [
            // 'posts' => Post::get(),
            // 'posts' => $this->posts,
            'posts' => $posts,
        ]);
    }
}
