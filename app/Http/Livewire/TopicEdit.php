<?php

namespace App\Http\Livewire;

use App\Models\Topic;
use Livewire\Component;

class TopicEdit extends Component
{
    public Topic $topic;

    protected $rules = [
        'topic.title' => ['required', 'max:20'],
        'topic.body' => ['required'],
    ];

    // プロパティ宣言時に型宣言しているので、無くてもOK。
    // public function mount(Topic $topic)
    // {
    //     $this->topic = $topic;
    // }

    public function update()
    {
        $this->validate();

        $this->topic->save();

        // Location ヘッダーによる 302 転送ではなく、一旦 AJAX 通信が返ってから、JS にて location.href = url でリダイレクトされる。
        return redirect(route('topic.edit', $this->topic))
            ->with('status', '更新しました');
    }

    // 名前規則通りなら、無くても大丈夫
    // public function render()
    // {
    //     return view('livewire.topic-edit');
    // }
}
