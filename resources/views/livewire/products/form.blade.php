@include('common.modalHead')
<div class="row">
    <div class="col-sm-8">
        <div class="input-group">
            <label>Name</label>
            <input type="text" wire:model.lazy="name" class="form-control" placeholder="Product">
            @error('name')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="input-group">
            <label>Código</label>
            <input type="text" wire:model.lazy="barcode" class="form-control" placeholder="Código de barras">
            @error('barcode')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="input-group">
            <label>Custo</label>
            <input type="text" data-type='currency' wire:model.lazy="precio" class="form-control" placeholder="0.00">
            @error('precio')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="input-group">
            <label>Name</label>
            <input type="text" wire:model.lazy="name" class="form-control" placeholder="Product">
            @error('name')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="input-group">
            <label>Precio</label>
            <input type="text" data-type='currency' wire:model.lazy="name" class="form-control" placeholder="0.00">
            @error('price')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="input-group">
            <label>Stock</label>
            <input type="nunber" wire:model.lazy="stok" class="form-control" placeholder="0">
            @error('stok')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="input-group">
            <label>Alerts</label>
            <input type="text" wire:model.lazy="alerts" class="form-control" placeholder="10">
            @error('alerts')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="input-group">
            <label>Categorias</label>
            <select class="form-control" wire:model.lazy="category_id">
                <option value="Escolha" disabled>Escolha</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-sm-12 mt-8">
        <div class="form-group custom-file">
            <input type="file" class="custom-file-input form-control" wire:model="image" accept="image/png, image/gif, image/jpeg">
            <label class="custom-file-label">Imágen {{ $image }}</label>
            @error('image')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>

@include('common.modalFooter')
