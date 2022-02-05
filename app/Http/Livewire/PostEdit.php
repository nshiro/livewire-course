<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostEdit extends Component
{
    public $post;

    protected $rules = [
        'post.title' => ['required', 'max:8'],
        'post.body' => ['required'],
    ];

    protected $listeners = [
        'showModal',
    ];

    public function showModal(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.post-edit');
    }
}
