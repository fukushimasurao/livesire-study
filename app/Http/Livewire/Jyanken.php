<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Jyanken extends Component
{
    // public にしたものは、自動でviewに中身がいく。
    public $result = '';
    public $computer_hand = '???';
    public $my_hand = '???';


    public function jyanken(int $my_hand_num)
    {
        // コンピューターの手
        $computer_hand_num = rand(0, 2);
        if ($computer_hand_num === 0) {
            $this->computer_hand = '✊';
        } elseif ($computer_hand_num === 1) {
            $this->computer_hand = '✌️';
        } else {
            $this->computer_hand = '✋';
        }

        // 自分の手
        if ($my_hand_num === 0) {
            $this->my_hand = '✊';
        } elseif ($my_hand_num === 1) {
            $this->my_hand = '✌️';
        } else {
            $this->my_hand = '✋';
        }

        // 判定
        if ($computer_hand_num === $my_hand_num) {
            $this->result ='アイコ';
        } elseif (($computer_hand_num === 0 && $my_hand_num === 2)
        || ($computer_hand_num === 1 && $my_hand_num === 0)
        || ($computer_hand_num === 2 && $my_hand_num === 1)) {
            $this->result ='勝ち';
        } else {
            $this->result ='負け';
        }
    }
    public function render()
    {
        return view('livewire.jyanken');
    }
}
