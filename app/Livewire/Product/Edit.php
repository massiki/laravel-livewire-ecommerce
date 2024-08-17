<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Edit extends Component
{
    use WithFileUploads;

    public $productId;
    public $title;
    public $price;
    public $description;
    public $image;
    public $imageOld;

    protected $listeners = [
        'formEdit' => 'formEditHandler'
    ];

    public function render()
    {
        return view('livewire.product.edit');
    }

    public function closeFormEdit()
    {
        $this->dispatch('closeFormEdit');
    }

    #[On('formEditHandler')]
    public function formEditHandler($product)
    {
        $this->productId = $product['id'];
        $this->title = $product['title'];
        $this->description = $product['description'];
        $this->price = $product['price'];
        $this->imageOld = asset("/storage/" . $product['image']);
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|min:3',
            'price' => 'required|numeric',
            'description' => 'required|max:199'
        ]);

        if($this->productId){
            $product = Product::find($this->productId);
            if($this->image){
                $updateImage = $this->image->store('ProductImage', 'public');
                if($product->image){
                    Storage::disk('public')->delete($product->image);
                }
            } else {
                $updateImage = $product->image;
            }

            Product::where('id', $this->productId)->update([
                'title' => $this->title,
                'price' => $this->price,
                'description' => $this->description,
                'image' => $updateImage
            ]);
        }

        $this->dispatch('productUpdate');
        
    }
}
