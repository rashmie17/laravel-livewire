<div class="card">
    <div class="card-header">New Item</div>
    <div class="card-body">
        <form wire:submit.prevent="store">
            <div class="form-group">
                <input type="text" wire:model="name"  class="form-control" placeholder="Enter Name">
                @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <input type="text" wire:model="sale_price"  class="form-control" placeholder="Enter Sale price">
                @error('sale_price') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>