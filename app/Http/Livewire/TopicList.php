<?php

namespace App\Http\Livewire;

use App\Models\Topic;
use Livewire\Component;

class TopicList extends Component
{
    protected $listeners = [
        // 'topic-deleted' => '$refresh',
        'topic-deleted' => 'topicDeleted',
    ];

    public function topicDeleted(Topic $topic)
    {
        $topic->delete();
    }

    public function render()
    {
        return view('livewire.topic-list', [
            'topics' => Topic::orderByDesc('id')->get()
        ]);
    }
}
