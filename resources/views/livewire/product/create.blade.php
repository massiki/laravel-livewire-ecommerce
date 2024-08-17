<div class="row justify-content-center mb-3">
  <div class="col">
    <div class="card">
      <div class="card-header">{{ __('Create Product') }}</div>
      <div class="card-body">
        <form wire:submit="save" method="post" enctype="multipart/form-data">
          <div class="row g-3 mb-3">
            <div class="col">
              <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
              @error('title')
                <span class="invalid-feedback">
                  {{ $message }}
                </span>
              @enderror
            </div>
            <div class="col">
              <input type="number" wire:model="price" class="form-control @error('price') is-invalid @enderror" placeholder="Price">
              @error('price')
                <span class="invalid-feedback">
                  {{ $message }}
                </span>
              @enderror
            </div>
          </div>
          <div class="row g-3 mb-3">
            <div class="col">
              <input type="text" wire:model="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description">
              @error('description')
                <span class="invalid-feedback">
                  {{ $message }}
                </span>
              @enderror
            </div>
          </div>
          <div class="row g-3 mb-3">
            <div class="col">
              <input type="file" wire:model="image" class="form-control @error('image') is-invalid @enderror">
              @error('image')
                <span class="invalid-feedback">
                  {{ $message }}
                </span>
              @enderror
              @if ($image)
                <div class="mt-3">
                  <img src="{{ $image->temporaryUrl() }}" width="250">
                </div>
              @endif
            </div>
          </div>
          <div class="row g-3">
            <div class="col">
              <button type="submit" class="btn btn-primary btn-sm">Save</button>
              <button type="button" wire:click="CloseFormCreate()" class="btn btn-secondary btn-sm">Close</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>