@extends('layouts.app')

@section('content')
	@if($categories->count() > 0)
		<h3 class="text-muted">Catégories <span><a href="{{ route('categories.create') }}" class="btn btn-info">Ajouter</a></span></h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($categories as $category)
				<tr>
					<td>{{ $category->name }}</td>
					<td>
						<a href="#" class="btn btn-info"><i class="fa fa-edit"></i></a>
						<a class="btn btn-danger" data-toggle="modal" href='#modal-{{ $category->id }}'>
							<i class="fa fa-trash"></i>
						</a>
						<div class="modal fade" id="modal-{{ $category->id }}">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Confirmation de suppression</h4>
									</div>
									<div class="modal-body">
										Voulez-vous supprimer la catégorie "<strong><em>{{ $category->name }}</em></strong>""
									</div>
									<div class="modal-footer">
										<form action="{{ route('categories.destroy', $category->id) }}" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
											<button type="submit" class="btn btn-danger">Ok</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	@else
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h3>Aucune catégorie enregistrée</h3>
				<a href="{{ route('categories.create') }}" class="btn btn-info">
					Ajouter une catégorie
				</a>
			</div>
		</div>
	</div>
	@endif
@endsection