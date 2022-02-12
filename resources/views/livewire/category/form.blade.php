@include('common.modalHear')

<div class="row">
    <div class="col-sm-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <span class="fas fa-edit">

                    </span>
                </span>
            </div>
            <input type="text" wire:modal.lazy="name" class="form-control" placeholder="ej: Cursos">
        </div>
        @error('name')
            <span class="text-danger er">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="col-smp12 mt-3">
        <div class="form-group custom-file">
            <input type="file" class="custon-file-input form-control" wire:model="image" accept="image/xpng, image/gif, image/jpeg">
            <label class="custom-file-label">
                Imagem {{ $image }}
            </label>
            @error('image')
                <span class="text-danger er">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>
@include('common.modalFooter')
