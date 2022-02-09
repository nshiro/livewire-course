<?php

namespace App\Http\Livewire;

use App\Models\Topic;
use Livewire\Component;

class TopicList extends Component
{
    public function render()
    {
        return view('livewire.topic-list', [
            'topics' => Topic::orderByDesc('id')->get()
        ]);
    }
}
