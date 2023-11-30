<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Comment;
use WithPagination;

class Commentt extends Component
{
    
    public $comments;

    public $newComment;

    public $idProduct;

    public function mount($idProduct){
        $this->idProduct = $idProduct;
        $initialComment = Comment::where('product_id', $idProduct)->latest()->get();
        $this->comments = $initialComment;
    }
    public function updated($field){
        $this->validateOnly($field, ['newComment' => 'required|max:255']);
    }
    public function addComment(){
        $this->validate(['newComment' => 'required|max:255']);
        $user = Auth()->user()->id;
        $createComment = new Comment();
        $data = [
            'product_id' => $this->idProduct,
            'user_id' => $user,
            'content' => $this->newComment,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $createComment->addComment($data);
        $this->comments = collect($this->comments);
        $this->comments->prepend($createComment);
        $initialComment = Comment::where('product_id', $this->idProduct)->latest()->get();
        $this->comments = $initialComment;
        $this->newComment = "";
    }
    public function render()
    {
        return view('livewire.commentt');
    }
}
