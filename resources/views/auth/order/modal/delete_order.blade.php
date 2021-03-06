<form action="{{ route('auth.order.destroy', $order) }}" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="ModalModal{{$order->id}}" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Elimina questo ordine</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body text-center">
                    <h6 class="my-4">Sei sicuro? L'ordine verrà eliminato definitivamente.</h6>
                    <form action="{{ route('auth.order.destroy', $order) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger mx-2">Elimina</button>
                    </form>

                    <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                        Annulla
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
