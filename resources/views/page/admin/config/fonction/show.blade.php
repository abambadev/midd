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
                       Liste des fonctions
                   </h4>
                   <a href="{{ route('Admin-Config-FonctionGetCreate') }}" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5 float-right">
                    <i class="mdi mdi-plus"></i>
                    Ajouter une fonction
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
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead class="bg-info text-white">
                    <tr>
                        <th>#</th>
                        <th>Libelle</th>
                        <th>Ajouté le</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($fonctions as $value)
                    <tr>
                        <td class="font-weight-bold">
                            {{ $i++ }}
                        </td>
                        <td class="font-weight-bold">
                            {{ $value->libelle }}
                        </td>
                        <td class="text-center">
                            {{ date('d-m-Y à h-i', strtotime($value->created_at)) }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('Admin-Config-FonctionGetEdite',['id' => $value->uuid]) }}" class="badge badge-teal p-2 text-white">
                                <i class="mdi mdi-circle-edit-outline"></i>
                                Modifier
                            </a>
                            <a href="{{ route('Admin-Config-FonctionGetDelete',['id' => $value->uuid]) }}" class="badge badge-danger p-2">
                                <i class="mdi mdi-close"></i>
                                Supprimer
                            </a>
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
