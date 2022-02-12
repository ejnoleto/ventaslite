<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b> {{ $componentName }}| {{ $pageTitle }}</b>
                </h4>
                <ul class="tabs tab-pills">
                    <li>
                        <a href="javascript:void(0)" class="tabmenu bg-dark" data-toggle="modal"
                            data-target="#theModal">
                            Agregar
                        </a>
                    </li>
                </ul>
            </div>
            Search
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table striped mt-1">
                        <thead class="text white" style="background:#3b3f5c">
                            <tr>
                                <th class="table-th text-white">DESCRIPCION</th>
                                <th class="table-th text-white">IMAGEN</th>
                                <th class="table-th text-white">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>
                                    <h6>{{ $category ?? ''->name }}</h6>
                                </td>
                                <td class="text-center">
                                    <span>
                                        <img src="{{ asset('storage/categories/'.$category->image) }}" alt="Imagem de exemplo" height="70" width="80" class="rounded">
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)"
                                    wire:click="Edit({{ $category->id }})"
                                    class="btn btn-dark mtmobilie" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)"
                                    onclick="Confirm({{ $category->id }})"
                                    class="btn btn-dark mtmobilie" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    Paginition
                </div>
            </div>
        </div>
    </div>
    @include('livewire.category.form')
</div>
<script>
document.addEventListener('DOMContetLoaded', function() {
    window.livewire.on('category-added',msg ->{
        $('#theModal').modal('hide');
        noty(msg)
    })
    window.livewire.on('category-updated',msg ->{
        $('#theModal').modal('hide');
        noty(msg)
    })
    window.livewire.on('category-deleted',msg ->{
        $('#theModal').modal('hide');
        noty(msg)
    })
    window.livewire.on('hide-modal',msg ->{
        $('#theModal').modal('hide');
    })
    window.livewire.on('show-modal',msg ->{
        $('#theModal').modal('show');
    })
    window.livewire.on('hidden.bs.modal',msg ->{
        $('.er').modal('display','none');
    })
});

    function Confirm(id){
        swal({
            title:'CONFIRMAR',
            text: 'CONFIRMA ELEIMINAR REGISTRO?',
            type: 'warning',
            showCancelButton: 'Cerrar',
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#3b3f5c'
        }).then(function(result){
            if (result.value) {
                window.livewire.emit('delete.Row',id)
                swal.close()
            }
        })
    }
</script>
