<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$materia->ma_idMateria}}">
	{{Form::open(array('action'=>array('MateriasController@destroy',$materia->ma_idMateria),'method'=>'delete'))}}	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" area-label="Close">
					<span aria-hidden="true">X</span>
				</button>
				<h4 class="modal-title">Eliminar Materia</h4>
			</div>
			<div class="modal-body">
				<p>¿Esta seguro que desea eliminar esta materia?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary">Aceptar</button>
			</div>
		</div>
	</div>
	{{Form::close()}}
</div>