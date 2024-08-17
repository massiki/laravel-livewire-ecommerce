<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Checkout') }}</div>
        <div class="card-body">
          @if ($formCheckout === true)
          <form wire:submit="checkout" method="post">
            <div class="row g-3 mb-3">
              <div class="col">
                <input type="text" wire:model="firstName" class="form-control @error('firstName') is-invalid @enderror" placeholder="First name">
                @error('firstName')
                  <span class="invalid-feedback">
                    {{ $message }}
                  </span>
                @enderror
              </div>
              <div class="col">
                <input type="text" wire:model="lastName" class="form-control @error('lastName') is-invalid @enderror" placeholder="Last name">
                @error('lastName')
                  <span class="invalid-feedback">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            <div class="row g-3 mb-3">
              <div class="col">
                <input type="text" wire:model="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone">
                @error('phone')
                  <span class="invalid-feedback">
                    {{ $message }}
                  </span>
                @enderror
              </div>
              <div class="col">
                <input type="text" wire:model="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address">
                @error('address')
                  <span class="invalid-feedback">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            <div class="mb-3">
              <textarea type="text" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="email" rows="3" placeholder="Email"></textarea>
              @error('email')
                  <span class="invalid-feedback">
                    {{ $message }}
                  </span>
                @enderror
            </div>
            
            <div class="row g-3 mb-3">
              <div class="col">
                <input type="text" wire:model="city" class="form-control @error('city') is-invalid @enderror" placeholder="city">
                @error('city')
                  <span class="invalid-feedback">
                    {{ $message }}
                  </span>
                @enderror
              </div>
              <div class="col">
                <input type="text" wire:model="postalCode" class="form-control @error('postalCode') is-invalid @enderror" placeholder="postalCode">
                @error('postalCode')
                  <span class="invalid-feedback">
                    {{ $message }}
                  </span>
                @enderror
                </div>
            </div>

            <div class="row g-3 mb-3">
              <div class="col">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
              </div>
            </div>
          </form>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
