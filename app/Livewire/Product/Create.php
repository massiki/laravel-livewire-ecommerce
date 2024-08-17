<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $price;
    public $description;
    public $image;

    public function render()
    {
        return view('livewire.product.create');
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|min:3',
            'price' => 'required|numeric',
            'description' => 'required|max:199',
            'image' => 'image'
        ]);

        $fileImage='';
        if($this->image){
            $fileImage = $this->image->store('ProductImage', 'public');
        }

        Product::create([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'image' => $fileImage
        ]);

        $this->dispatch('productStore');
    }

    public function CloseFormCreate()
    {
        $this->dispatch('closeFormCreate');
    }
}
