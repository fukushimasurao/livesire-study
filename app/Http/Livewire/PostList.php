<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;
    public $word;

    // mountや、updatedXxxを使うと、その都度ハイドレート（無駄なSQL）が走るので、render内で対応する。
    // public $posts;
    // public function mount()
    // {
    //     $this->posts = Post::get();
    // }
    // public function updatedWord($val)
    // {
    //     $this->posts = Post::where('title', 'LIKE', '%' . $val . '%')->get();
    // }

    public function render()
    {
        $posts = Post::query()
        // whenはifと同じ
        ->when($this->word, fn ($q, $val) => $q->where('title', 'LIKE', '%' . $val . '%'))
        ->paginate(10);

        return view(
            'livewire.post-list',
            // ['posts' => Post::get()],
            // ['posts' => $this->posts],
            ['posts' => $posts],
        );
    }
}
