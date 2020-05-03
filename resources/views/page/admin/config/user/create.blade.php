@extends('layouts.admin.master')

@section('css')

@endsection

@section('entete')
<div class="content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<div class="page-title-box mb-0 pb-2 pt-3">
					<h4 class="page-title pt-2">
						Utilisateur
					</h4>
					<a href="{{ route('Admin-Config-UserGetShow') }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5 float-right">
						<i class="mdi mdi-chevron-left"></i>
						Retour
					</a>
					<ol class="breadcrumb p-0 m-0">
						<li class="breadcrumb-item active">
						</li>
					</ol>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

	</div>
</div> 
@endsection

@section('content')

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header bg-primary">
				<h4 class="text-center text-white">Création de compte</h4>
			</div>
			<div class="card-body">

				<form method="post" class="form-horizontal">

					@csrf

					<div class="form-group row">
						<div class="col-12">
							<input name="nom" class="form-control" type="text" required placeholder="Nom" value="{{ old('nom') }}">
							<span class="text-danger">
								{{ $errors->first('nom') }}
							</span>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-12">
							<input name="prenom" class="form-control" type="text" required placeholder="Prénom"  value="{{ old('prenom') }}">
							<span class="text-danger">
								{{ $errors->first('prenom') }}
							</span>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-12">
							<input name="email" class="form-control" type="email" required placeholder="Email"  value="{{ old('email') }}">
							<span class="text-danger">
								{{ $errors->first('email') }}
							</span>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-7">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text pl-0 pt-0 pb-0">
										<img src="{{ asset('/file/image/flag/ci.png') }}" class="" id="flag_pays_id" style="height: 20px">
									</span>
								</div>
								<select name="pays_id" class="form-control" id="input_pays_id" required>
									@foreach ( $pays as $value)
									<option @if (old('ville') == $value->id or $value->id == 110) selected @endif value="{{ $value->id }}">{{ $value->nom_fr_fr }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-5">
							<input name="ville" class="form-control" type="text" required placeholder="Ville"  value="{{ old('ville') }}">
							<span class="text-danger">
								{{ $errors->first('ville') }}
							</span>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-12">
							<input name="phone" class="form-control" type="number" required placeholder="Phone (ex : 22507070707)"  value="{{ old('phone') }}">
							<span class="text-danger">
								{{ $errors->first('phone') }}
							</span>
						</div>
					</div>

					<div class="form-group account-btn text-center m-t-10">
						<div class="col-12">
							<button class="btn w-md btn-danger btn-bordered waves-effect waves-light" type="submit">
								Crée mon compte
							</button>
						</div>
					</div>

				</form>

				
			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>

@endsection

@section('javascript')
<script type="text/javascript">
	$('#input_pays_id').change(function(event) {
		var id = $(this).val();
		$.ajax({
			url: '{{ route('Site-RegisterPostAjax') }}',
			type: 'POST',
			data: {_token: '{{ csrf_token() }}', req: 1001, id: id},
		})
		.done(function(data) {
			$('#flag_pays_id').attr('src', data);
		});
	});
</script>
@endsection
