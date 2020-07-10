<div class="card">
    <div class="card-header">Update Item</div>
    <div class="card-body">
        <form wire:submit.prevent="update">
            <input type="hidden" wire:model="id">
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