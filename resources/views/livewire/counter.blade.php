<div>
    こんにちは。 {{ $name }}さん

    <br>

    <form wire:submit.prevent="$refresh">
        <input type="text" wire:model.defer="name">
        <div>
            現在の文字数 : {{ mb_strlen($name) }}
        </div>
        <input type="submit" value="送信する">
    </form>
    <hr>

    {{-- 親のdiv要素はかならず一個だけ。 --}}
    現在のカウンター : {{ $counter }}
    <br>
    <input type="button" wire:click='increment' value="+1増加させる">
    <input type="button" wire:click='increment(10)' value="+10増加させる">
    <input type="button" wire:click="$set('counter', 0)" value="0にリセットする">
    メソッドをリセットする場合は、,'$set'を使う
</div>
