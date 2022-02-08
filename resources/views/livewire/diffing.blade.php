<div class="p-4">

    <button type="button" wire:click="$refresh">画面を更新する</button>
    <hr>

    {{ now() }}

    <div wire:key="div-a">a</div>
    <div wire:key="div-b">b <input type="text"></div>
    <div wire:key="div-c">c</div>


</div>