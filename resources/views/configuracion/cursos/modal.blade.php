<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$curso->cu_idCurso}}">
	{{Form::open(array('action'=>array('CursosController@destroy',$curso->cu_idCurso),'method'=>'delete'))}}	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" area-label="Close">
					<span aria-hidden="true">X</span>
				</button>
				<h4 class="modal-title">Eliminar Curso</h4>
			</div>
			<div class="modal-body">
				<p>¿Esta seguro que desea eliminar este curso?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary">Aceptar</button>
			</div>
		</div>
	</div>
	{{Form::close()}}
</div>