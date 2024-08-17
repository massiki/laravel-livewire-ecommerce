<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="form-group">
        <input type="text" wire:model.live="search" class="form-control" placeholder="Search Product">
      </div>
    </div>
  </div>

  <div class="row mt-4">
    @foreach ($products as $product)
      <div class="col-sm-12 col-xs-12 col-md-4 col-lg-3 mb-4">
        <div class="card h-80">
          <img src="{{ $product->image ? asset('/storage/' . $product->image) : 'http://placehold.it/150x150' }}" class="card-img-top img-fluid">
          <div class="card-img-overlay" style="background-color: rgba(0, 0, 0, 0.5);">
            <h5 class="text-white">
              <strong>{{ $product->title }}</strong>
            </h5>
            <h6 class="text-white">{{ "Rp " . number_format("$product->price", 2, ",", ".")}}</h6>
            <div class="text-white">{{ $product->description }}</div>
            <div class="d-grid">
              <button type="button" wire:click="addToCart({{ $product->id }})" class="btn btn-sm btn-outline-secondary text-white">Add to carts</button>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  {{ $products->links('livewire::bootstrap') }}
</div>