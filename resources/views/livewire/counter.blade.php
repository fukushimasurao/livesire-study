<div>
    {{-- 親のdiv要素はかならず一個だけ。 --}}
    現在のカウンター : {{ $counter }}
    <br>
    <input type="button" wire:click='incriment' value="+1増加させる">
</div>
