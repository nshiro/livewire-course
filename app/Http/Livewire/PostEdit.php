<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostEdit extends Component
{
    use WithFileUploads;

    public $post;
    public $photo;
    public $showModal = false;

    protected $rules = [
        'post.title' => ['required', 'max:20'],
        'post.body' => ['required'],
        'photo' => ['nullable', 'image'],
    ];

    protected $listeners = [
        'showModal',
    ];

    public function showModal(Post $post)
    {
        $this->post = $post;
        $this->photo = null;

        $this->showModal = true;
    }

    public function updated($key)
    {
        $this->validateOnly($key);
    }

    public function update()
    {
        $this->validate();

        if ($this->photo) {
            $this->post->photo = $this->photo->store('photo', 'public');
        }

        $this->post->save();

        $this->emit('updated-post');

        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.post-edit');
    }
}
