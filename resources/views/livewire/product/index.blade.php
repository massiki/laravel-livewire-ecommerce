<div class="container">

  @if ($formVisible)
    @livewire('product.create')
  @elseif ($viewFormEdit)
    @livewire('product.edit')      
  @endif

  <div class="row justify-content-center">
    <div class="col">
      <div class="card">
        <div class="card-header">
          {{ __('Products') }}
          <button type="button" wire:click="openFormCreateHandler()" class="btn btn-primary btn-sm">
            {{ __('Create') }}
          </button>
        </div>
        <div class="card-body">
          @if (session('message'))
            <div class="alert alert-success">
              {{ session('message') }}
            </div>
          @endif
          <div class="row">
            <div class="col">
              <select wire:model.live="page" class="form-control form-control-sm w-auto">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
              </select>
            </div>
            <div class="col">
              <input type="text" wire:model.live="search"
                class="form-control form-control-sm" placeholder="Search Title">
            </div>
          </div>
          <hr>
          <table class="table">
              <thead class="table-dark">
                <tr>
                  <th scope="col">{{ __('#') }}</th>
                  <th scope="col">{{ __('Title') }}</th>
                  <th scope="col">{{ __('Description') }}</th>
                  <th scope="col">{{ __('Price') }}</th>
                  <th scope="col">{{ __('Image') }}</th>
                  <th scope="col">{{ __('Option') }}</th>
                </tr>
              </thead>
              @foreach ($products as $product)
              <tbody>
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $product->title }}</td>
                  <td>{{ $product->description }}</td>
                  <td>{{ "Rp " . number_format("$product->price", 2, ",", ".")}}</td>
                  <td><img src="{{ asset("/storage/" . $product->image) }}" width="50"></td>
                  <td>
                    <button wire:click="editFormProduct({{ $product->id }})" class="btn btn-info btn-sm">Edit</button>  
                    <button wire:click="deleteProduct({{ $product->id }})" class="btn btn-danger btn-sm">Delete</button>  
                  </td>
                </tr>
              </tbody>
              @endforeach
            </table>
          {{ $products->links('livewire::bootstrap') }}
        </div>
      </div>
    </div>
  </div>
</div>