<div>

    <h1>じゃんけん</h1>

    <br>
    <hr>

    {{-- 親のdiv要素はかならず一個だけ。 --}}
    <input type="button" wire:click='jyanken(0)' value="グー">
    <input type="button" wire:click='jyanken(1)' value="チョキ">
    <input type="button" wire:click="jyanken(2)" value="パー">

    <br>
    <p>あなたの手: {{ $my_hand }} </p>
    <p>コンピューターの手: {{ $computer_hand }} </p>
    <h3>結果:{{ $result }}</h3>


</div>
