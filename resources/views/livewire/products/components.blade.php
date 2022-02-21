<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }} | {{ $pageTitle }}</b>
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
            @include('common.searchbox')
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table striped mt-1">
                        <thead class="text white" style="background:#3b3f5c">
                            <tr>
                                <th class="table-th text-white text-center">DESCRIPCION</th>
                                <th class="table-th text-white text-center">BARCODE</th>
                                <th class="table-th text-white text-center">CATEGORIA</th>
                                <th class="table-th text-white text-center">PRECIO</th>
                                <th class="table-th text-white text-center">STOCK</th>
                                <th class="table-th text-white text-center">INV.MIN.</th>
                                <th class="table-th text-white text-center">IMAGEM</th>
                                <th class="table-th text-white text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $product)
                            <tr>
                                <td><h6>{{ $product->name }}</h6></td>
                                <td><h6>{{ $product->barcode}}</h6></td>
                                <td><h6>{{ $product->category }}</h6></td>
                                <td><h6>{{ $product->price }}</h6></td>
                                <td><h6>{{ $product->stok }}</h6></td>
                                <td><h6>{{ $product->alerts }}</h6></td>

                                <td class="text-center">
                                    <span>
                                        <img src="{{ asset('storage/products/'. $product->imagen) }}" alt="Imagem de exemplo" height="70" width="80" class="rounded">
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)"
                                    wire:click="Edit({{ $product->id }})"
                                    class="btn btn-dark mtmobilie" title="Edit" data-toggle="modal" data-target="#theModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feproductather feather-edit-3">
                                                <path d="M12 20h9"></path>
                                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                        </svg>
                                    </a>
                                    <a href="javascript:void(0)"
                                    onclick="Confirm('{{ $product->id }}')"
                                    class="btn btn-dark mtmobilie" title="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-trash-2">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.products.form')
</div>
<script>
document.addEventListener('DOMContetLoaded', function() {

        window.livewire.on('product-added',msg =>{
            $('#theModal').modal('hide');
        })

        window.livewire.on('product-updated',msg =>{
            $('#theModal').modal('hide');
        })

        window.livewire.on('product-deleted',msg =>{
           //noty
        })

        window.livewire.on('product-show',msg =>{
            $('#theModal').modal('show');
        })

        window.livewire.on('product-hide',msg =>{
            $('#theModal').modal('hide');
        })

        window.livewire.on('hidden.bs.modal',msg =>{
            $('er').css('display','none')
        })

});
</script>
