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
                        	Suppression d'une inspection
                        </h4>
                        <a href="{{ route('Admin-Config-InspectionGetShow') }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5 float-right">
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
        <div class="col-3"></div>
        <div class="col-md-6">

            <div class="card overflow-hidden">
                <div class="card-heading bg-danger">
                    <h3 class="card-title text-white">Suppression d'une inspection</h3>
                </div>
                <div class="card-body p-2 text-center">
                    <h5>Voulez-vous supprimée définitivement cette inspection ?</h5>
                    <h3>{{ $inspection->libelle }}</h3>
                    <form method="post">
                        @csrf
                        <div class="dropdown-divider mb-3"></div>
                        <div class="form-group text-center">
                            <a href="{{ url()->previous() }}" class="btn btn-primary btn-lg">
                                Annuler
                            </a>
                            <button type="submit" class="btn btn-success btn-lg">
                                Supprimer
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
        <div class="col-3"></div>
    </div>

@endsection

@section('javascript')

@endsection
