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
					@permission('config-user-create')
					<a href="{{ route('Admin-Config-UserGetCreate') }}" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5 float-right">
						<i class="mdi mdi-plus"></i>
						Membre
					</a>
					@endpermission
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
	<div class="col-sm-12">
		<div class="card-box table-responsive">
			<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
				<thead class="bg-info text-white">
					<tr>
						<th>Membre</th>
						<th>Phone</th>
                        <th>Email</th>
						<th>Date</th>
						<th>Etat</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $value)
					<tr>
						<td class="font-weight-bold">
							<img src="/file/image/users/{{ $value->photo }}" style="height: 35px; border-radius: 45px;">
							{{ $value->nom . ' ' . $value->prenom }}
						</td>
						<td class="font-weight-bold text-center">
							{{ $value->phone }}
						</td>
						<td class="font-weight-bold text-center">
							{{ $value->email }}
                        </td>
						<td class="text-center">
							{{ date('d/m/Y à H:i:s', strtotime($value->created_at)) }}
						</td>
						<td class="text-center">
							@permission('config-user-etat')
							@if ($value->etat == 1 && $value->uuid <> Auth::user()->uuid )
							<a href="{{ route('Admin-Config-UserGetEtat',['uuid' => $value->uuid]) }}" class="badge badge-success p-2">
                                Actif
                            </a>
							@endif
							@if ( ( $value->etat == 0 or $value->etat == null ) && $value->uuid <> Auth::user()->uuid )
							<a href="{{ route('Admin-Config-UserGetEtat',['uuid' => $value->uuid]) }}" class="badge badge-orange p-2 text-white">
                                Inactif
                            </a>
							@endif
							@endpermission
						</td>
						<td class="text-center">
							@permission('config-user-profil')
							<a href="{{ route('Admin-Config-UserGetProfil',['uuid' => $value->uuid]) }}" class="badge badge-primary p-2">
                                <i class="mdi mdi-account"></i>
                                Détail
                            </a>
							@endpermission
							@if ( $value->id <> Auth::id() )
							@permission('config-user-role')
							<a href="{{ route('Admin-Config-UserGetRole',['uuid' => $value->uuid]) }}" class="badge badge-secondary p-2">
                                <i class="mdi mdi-star"></i>
                                Rôle
                            </a>
							@endpermission
							@permission('config-user-delete')
							<a href="{{ route('Admin-Config-UserGetDelete',['uuid' => $value->uuid]) }}" class="badge badge-danger p-2">
                                <i class="mdi mdi-close"></i>
                                Supprimer
                            </a>
							@endpermission
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection

@section('javascript')

@endsection
