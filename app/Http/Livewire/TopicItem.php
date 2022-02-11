<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TopicItem extends Component
{
    public $topic;

    public function showTopic()
    {
        $this->topic->body = \Str::of($this->topic->body)->markdown();

        $this->emit('show-topic', $this->topic);
    }

    // 書かなくても自動で大丈夫（変数名と同じ場合）
    // public function mount($topic)
    // {
    //     $this->topic = $topic;
    // }

    // public function deleteTopic()
    // {
    //     $this->topic->delete();
    //
    //     $this->emitUp('topic-deleted');
    // }

    public function render()
    {
        return view('livewire.topic-item');
    }
}
