<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;
    public $word;
    public $title;
    public $body;

//    livewireのバリデーション
    protected $rules = [
        'title' => ['required'],
        'body' => ['required'],
    ];
    // 検索されるたびに最初の状態に戻す
    public function updatingWord()
    {
        $this->resetPage();
    }

    public function register()
    {
//        validation処理を行う。
        $this->validate();

//        validation終わったら、以下処理
        $data = $this->validate();
        Post::create($data);

//        全てのpublicプロパティをリセットする。
        $this->reset();

    }
    public function render()
    {
        $posts = Post::query()
            ->orderByDesc('id')
        // whenはifと同じ
            ->when($this->word, fn ($q, $val) => $q->where('title', 'LIKE', '%' . $val . '%'))
            ->paginate(10);

        return view(
            'livewire.post-list',
            ['posts' => $posts],
        );
    }
}
