<?php
namespace Illuminate\Nisimpo\Blog\Livewire;
use Livewire\Component;
use Nisimpo\Blog\Models\Category;

class PostCreate extends Component
{
    public function render(){
        $categories = Category::all();
        return view('blog::posts.fields',[
            'categories' => $categories
        ]);
    }
}