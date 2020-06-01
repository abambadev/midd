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
						Gestion des documents
                    </h4>

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
                        <th>Date de creation</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($documents as $value)
					<tr>
						<td class="font-weight-bold">
							<img src="/file/image/users/{{ $value->photo }}" style="height: 35px; border-radius: 45px;">
							{{ $value->nom . ' ' . $value->prenom }}
						</td>
						<td class="font-weight-bold text-center">
							{{ $value->phone }}
						</td>
						<td class="font-weight-bold text-left">
							{{ $value->email }}
                        </td>
						<td class="text-center">
							{{ date('d/m/Y à H:i:s', strtotime($value->created_at)) }}
						</td>
						<td class="text-center">

							@if ( $value->id <> Auth::id() )
                                @permission('config-user-profil')
                                <a target="blank" href="{{ route('Admin-Config-DocumentGetPrecompte',['uuid' => $value->uuid]) }}">
                                    Precompte
                                </a>
                                @endpermission
                                &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                                @permission('config-user-profil')
                                <a target="blank" href="{{ route('Admin-Config-DocumentGetAdhesion',['uuid' => $value->uuid]) }}">
                                    Adhesion
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
