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
                        Profil
                        (<a href="{{ route('Site-ScriptGetShow', ['action' => 'autologin', 'user' => $user->id, 'token' => config('perso.ScriptToken')]) }}" class="mdi mdi-login"></a>)
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
    <div class="col-md-3">

        <div class="card card-border card-primary">
            <div class="card-heading">
                <h3 class="card-title text-primary">Profil</h3>
            </div>
            <div class="card-body">
                <img src="{{ asset('/file/image/users/'.$user->photo) }}" class="rounded-circle img-thumbnail mx-auto d-block" alt="profile-image" style="height: 120px;">
                <h4 class="m-b-5 text-center">
                    {{ $user->nom.' '.explode(' ', $user->prenom)[0] }}
                </h4>
                <br>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="card card-border card-primary">
            <div class="card-heading">
                <h3 class="card-title text-primary">Compte</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 text-center">
                        <h1>{{ $user->getHebergement ? $user->getHebergement->count() : 0 }}</h1>
                        Hébergement
                    </div>
                    <div class="col-md-3 text-center">
                        <h1>{{ $user->getDomaine ? $user->getDomaine->count() : 0 }}</h1>
                        Domaine
                    </div>
                    <div class="col-md-3 text-center">
                        <h1>{{ $user->getSousDomaine ? $user->getSousDomaine->count() : 0 }}</h1>
                        Sous-domaine
                    </div>
                    <div class="col-md-3 text-center">
                        <h1>{{ $user->getTicket ? $user->getTicket->count() : 0 }}</h1>
                        Ticket
                    </div>
                    <div class="col-md-12">
                        <hr/>
                    </div>
                    <div class="col-md-6">
                        Nom : <b>{{ $user->nom }}</b><br>
                        Prénom : <b>{{ $user->prenom }}</b><br>
                        Phone : <b>{{ $user->phone }}</b><br>
                    </div>
                    <div class="col-md-6">
                        Email : <b>{{ $user->email }}</b><br>
                        Pays : <b>{{ $user->getPays ? $user->getPays->nom_fr_fr : null }}</b><br>
                        Ville : <b>{{ $user->ville }}</b><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-border card-primary">
            <div class="card-heading">
                <h3 class="card-title text-primary">MIDD</h3>
            </div>
            <div class="card-body text-center">
                <img class="img-fluid" src="/file/image/website/logo/midd.jpeg" style="max-height: 180px">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-heading bg-info">
                <h4 class="card-title text-white">Connexion récente</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-centered m-0">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Adresse IP</th>
                                <th>Pays</th>
                                <th>Ville</th>
                                <th>Appareil</th>
                                <th>OS</th>
                                <th>Navigateur</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->getLoginSession->reverse()->take(10) as $key => $value)
                            <tr>
                                <td class="font-weight-bold">
                                    @if ($value->action == 'Connexion')
                                    <span class="text-success">{{ $value->action }}</span>
                                    @else
                                    <span class="text-danger">{{ $value->action }}</span>
                                    @endif

                                </td>
                                <td>{{ $value->ip }}</td>
                                <th>
                                    <img src="{{ asset('/file/image/flag/'.strtolower($value->pays_code).'.png') }}" class="rounded" style="height: 20px">
                                    {{ $value->pays_name }}
                                </th>
                                <td>{{ $value->ville }}</td>
                                <td>{{ $value->appareil }}</td>
                                <td>{{ $value->os }}</td>
                                <td>{{ $value->navigateur }}</td>
                                <td>
                                    {{  date('d/m/Y à H:i:s', strtotime($value->created_at)) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script src="{{ asset('/dist/admin/plugins/jquery-knob/jquery.knob.js') }}"></script>
@endsection
