@extends('layouts.app')

@section('content')
	@if($posts->count() > 0)
		<h3 class="text-muted">Articles <span><a href="{{ route('posts.create') }}" class="btn btn-info">Ajouter</a></span></h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($posts as $post)
				<tr>
					<td>{{ $post->name }}</td>
					<td>
						<a href="#" class="btn btn-info"><i class="fa fa-edit"></i></a>
						<a class="btn btn-danger" data-toggle="modal" href='#modal-{{ $post->id }}'>
							<i class="fa fa-trash"></i>
						</a>
						<div class="modal fade" id="modal-{{ $post->id }}">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Confirmation de suppression</h4>
									</div>
									<div class="modal-body">
										Voulez-vous supprimer la catégorie "<strong><em>{{ $post->name }}</em></strong>""
									</div>
									<div class="modal-footer">
										<form action="{{ route('posts.destroy', $post->id) }}" method="POST">
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
				<h3>Aucune page enregistrée</h3>
				<a href="{{ route('posts.create') }}" class="btn btn-info">
					Ajouter une page
				</a>
			</div>
		</div>
	</div>
	@endif
@endsection