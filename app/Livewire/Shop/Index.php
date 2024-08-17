<?php

namespace App\Livewire\Shop;

use App\Facades\Cart;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class Index extends Component
{
    use WithPagination;

    #[Url]
    public $search;

    public function render()
    {
        return view('livewire.shop.index', [
            'products' => $this->search === null ?
            Product::latest()->paginate(8) : 
            Product::where('title', 'like', '%' . $this->search . '%')->latest()->paginate(8)
        ]);
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);
        Cart::add($product);
        $this->dispatch('updateToCart');
    }
}
