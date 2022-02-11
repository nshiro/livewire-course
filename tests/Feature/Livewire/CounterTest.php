<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Counter;
use App\Http\Livewire\PostCreate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CounterTest extends TestCase
{
    /** @test */
    function counterにアクセスできるか()
    {
        $this->get('counter')
            ->assertOk()
            ->assertSeeLivewire('counter');
    }

    /** @test */
    function counterでインクリメントされるか()
    {
        Livewire::test(Counter::class)
            ->set('counter', 1)
            ->call('increment')
            ->assertSet('counter', 2);
    }

    /** @test */
    function ブログでタイトルは必須になっているか()
    {
        Livewire::test(PostCreate::class)
            ->set('post.title', '')
            ->call('register')
            ->assertHasErrors(['post.title' => 'required']);
    }
}
