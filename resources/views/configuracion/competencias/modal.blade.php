<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$competencia->co_idCompetencia}}">
	{!!Form::open(array('action'=>array('CompetenciasController@destroy',$competencia->co_idCompetencia),'method'=>'delete'))!!}	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" area-label="Close">
					<span aria-hidden="true">X</span>
				</button>
				<h4 class="modal-title">Eliminar Competencia</h4>
			</div>
			<div class="modal-body">
				<p>¿Esta seguro que desea eliminar esta competencia?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary">Aceptar</button>
			</div>
		</div>
	</div>
	{!!Form::close()!!}
</div>