@include('common.modalHead')
<div class="row">
    <div class="col-sm-12 col-md-8">
        <div class="form-group">
            <label>Name</label>
            <input type="text" wire:model.lazy="name" class="form-control" placeholder="Product">
            @error('name')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Código</label>
            <input type="text" wire:model.lazy="barcode" class="form-control" placeholder="Código de barras">
            @error('barcode')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Custo</label>
            <input type="text" data-type='currency' wire:model.lazy="cost" class="form-control" placeholder="0.00">
            @error('cost')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Precio</label>
            <input type="text" data-type='currency' wire:model.lazy="price" class="form-control" placeholder="0.00">
        </div>
        @error('price')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Stock</label>
            <input type="nunber" wire:model.lazy="stok" class="form-control" placeholder="0">
        </div>
        @error('stok')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Alerts</label>
            <input type="text" wire:model.lazy="alerts" class="form-control" placeholder="10">
        </div>
        @error('alerts')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Categorias</label>
            <select class="form-control" wire:model.lazy="category_id">
                <option>Escolha</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-sm-12 col-md-12">
        <div class="form-group custom-file">
            <input type="file" class="custom-file-input form-control" wire:model="image"
                accept="image/png, image/gif, image/jpeg">
            <label class="custom-file-label">Imágen {{ $image }}</label>
        </div>
        @error('image')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

</div>

@include('common.modalFooter')
