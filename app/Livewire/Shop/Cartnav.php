<?php

namespace App\Livewire\Shop;

use App\Facades\Cart;
use Livewire\Component;

class Cartnav extends Component
{
    public $totalCart = 0;

    protected $listeners = [
        'updateToCart' => 'updateToCartHandler',
        'removeCart' => 'updateToCartHandler'
    ];

    public function mount()
    {
        $this->updateToCartHandler();
    }

    public function render()
    {
        return view('livewire.shop.cartnav');
    }

    public function updateToCartHandler()
    {
        $this->totalCart = count(Cart::get()['product']);
    }
}
