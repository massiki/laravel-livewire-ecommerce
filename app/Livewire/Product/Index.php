<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class Index extends Component
{
    use WithPagination;

    public $page = 10;
    #[Url]
    public $search;
    public $formVisible;
    public $viewFormEdit = false;

    protected $listeners = [
        'productStore' => 'productStoreHandler',
        'closeFormCreate' => 'closeFormCreateHandler',
        'closeFormEdit' => 'closeFormEditHandler',
        'productUpdate' => 'productUpdateHandler',
        'failedUpdate' => 'failedUpdateHandler'
    ];

    public function render()
    {
        return view('livewire.product.index', [
            'products' => $this->search === null ?
            Product::latest()->paginate($this->page) :
            Product::where('title', 'like', '%' . $this->search . '%')->latest()->paginate($this->page)
        ]);
    }

    public function openFormCreateHandler()
    {
        $this->formVisible = true;
        $this->viewFormEdit = false;
    }

    public function productStoreHandler()
    {
        $this->formVisible = false;
        session()->flash('message', 'Your product was create!');
    }

    public function closeFormCreateHandler()
    {
        $this->formVisible = false;
    }

    public function closeFormEditHandler()
    {
        $this->viewFormEdit = false;
    }

    public function editFormProduct($productId)
    {
        $product = Product::find($productId);
        $this->dispatch('formEdit', $product);
        $this->formVisible = false;
        $this->viewFormEdit = true;
    }

    public function productUpdateHandler()
    {
        $this->viewFormEdit = false;
        session()->flash('message', 'Your product was updated!');
    }

    public function deleteProduct($productId)
    {
        $product = Product::find($productId);
        if($product->image){
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        session()->flash('message', 'Your product was deleted!');
    }
}
