<div>
    <select wire:model="age">
        <option value="">選択して下さい</option>
        <option value="20">20</option>
        <option value="30">30</option>
        <option value="40">40</option>
    </select>

    <hr>

    <label><input type="radio" name="fruit" wire:model.defer="fruit" value="リンゴ">リンゴ</label>
    <label><input type="radio" name="fruit" wire:model.defer="fruit" value="オレンジ">オレンジ</label>
    <label><input type="radio" name="fruit" wire:model.defer="fruit" value="バナナ">バナナ</label>

    <hr>

    <label><input type="checkbox" wire:model="accepted">同意する</label>

    <hr>

    <label><input type="checkbox" wire:model="tags" value="apple">apple</label>
    <label><input type="checkbox" wire:model="tags" value="orange">orange</label>
    <label><input type="checkbox" wire:model="tags" value="banana">banana</label>


</div>
