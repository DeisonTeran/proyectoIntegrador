<div class="modal fade modal-slide-in-right"aria-hidden="true"role="dialog"
tabindex="-1"id="modal-delete-{{$multa->id}}">
{{Form::Open(array('action'=>array('Detalle_facturaController@destroy',$multa->id),'method'=>'delete'))}}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
        <button type="button"class="close"data-dismiss="modal"aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Eliminar multa</h4>
                </div>
                <div class="modal-body">
                     <p>Confirme si desea Eliminar la multa de {{$multa->tipo_cobros->tipo_cobro}} a la persona por nombre {{$multa->facturas->habitantes->nombres}} </p>
                </div>
                <div class="modal-footer">
    <button type="button"class="btn btn-default"data-dismiss="modal">Cerrar
    </button>
    <button type="submit"class="btn btn-primary">Confirmar</button>
                </div>
            </div>
        </div>
    {{Form::Close()}}