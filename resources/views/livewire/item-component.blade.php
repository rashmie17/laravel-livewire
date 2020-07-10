<div class="justify-content-between">
    <div>
        @if (session()->has('status'))
            <div class="alert alert-success alert-dismissible">
                <a class="close" data-dismiss="alert">&times;</a>
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="d-flex justify-content-between">
        <div class="col-md-5">
            @if($updateForm)
                @include('livewire.edit')
            @else
                @include('livewire.create')
            @endif
        </div>
        <div class="col-md-7">
            @if(count($data) > 0)
                <table class="table">
                    <thead  class="thead-light">
                        <tr>
                            <th>Name</th>
                            <th>Sale Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->sale_price}}</td>
                                <td>
                                    <button wire:click="edit({{$row->id}})" class="btn btn-info">Edit</button>
                                    <button wire:click="destroy({{$row->id}})" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>