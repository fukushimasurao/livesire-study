<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;
    public $word;

    // 検索されるたびに最初の状態に戻す
    public function updatingWord()
    {
        $this->resetPage();
    }
    public function render()
    {
        $posts = Post::query()
        // whenはifと同じ
        ->when($this->word, fn ($q, $val) => $q->where('title', 'LIKE', '%' . $val . '%'))
        ->paginate(10);

        return view(
            'livewire.post-list',
            ['posts' => $posts],
        );
    }
}
