<div wire:ignore.self class="modal fade" id="theModal"tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white">
            <b>
                {{ $componentName }}
            </b>|{{ $selected_id > 0 ? 'EDITAR' : 'CREAR'}}
        </h5>
        <h6 class="text-center text-waring" wire:loading>POR FAVOR ESPERE!</h6>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
