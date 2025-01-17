<?php

namespace App\Helpers;

use App\Models\Product;

class Cart 
{
  public function __construct()
  {
    if ($this->get() === null) {
      $this->set($this->empty());
    }
  }

  public function set($cart)
  {
    request()->session()->put('cart', $cart);
  }

  public function get()
  {
    return request()->session()->get('cart');
  }

  public function add(Product $product)
  {
    $cart = $this->get();
    array_push($cart['product'], $product);
    $this->set($cart);
  }
  
  public function remove($productId)
  {
    $cart = $this->get();
    array_splice(
      $cart['product'], 
      array_search($productId, 
        array_column(
          $cart['product'], 'id'
        ),
      ), 
      1
    );
    $this->set($cart);
  }

  public function empty()
  {
    return [
      'product' => []
    ];
  }

  public function clear()
  {
    $this->set($this->empty());
  }
}