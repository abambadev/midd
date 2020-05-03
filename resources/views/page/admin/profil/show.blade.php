@extends('layouts.admin.master')

@section('css')
<link href="{{ asset('/dist/admin/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('entete')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box mb-0 pb-2 pt-3">
                    <h4 class="page-title pt-2">
                        Dashbord {{ config('app.name') }}
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
    <div class="col-md-3">

        <div class="card card-border card-primary">
            <div class="card-heading">
                <h3 class="card-title text-primary">Mon profil</h3>
            </div>
            <div class="card-body">
                <img src="{{ asset('/file/image/users/'.Auth::user()->photo) }}" class="rounded-circle img-thumbnail mx-auto d-block" alt="profile-image" style="height: 120px;">
                <h4 class="m-b-5 text-center">
                    {{ Auth::user()->nom.' '.explode(' ', Auth::user()->prenom)[0] }}
                </h4>
                <br>
                <a href="{{ route('Admin-ProfilGetEdite') }}" class="btn btn-primary w-100">
                    Mettre mon profil à jour
                </a>
            </div>
        </div>

    </div>
    <div class="col-md-6">

        <div class="card card-border card-primary">
            <div class="card-heading">
                <h3 class="card-title text-primary">Mon compte</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-5 col-lg-5 text-center">
                        <h4>Code d'enregistrement : </h4>
                    </div>
                    <div class="col-6 col-sm-6 col-md-7 col-lg-7 text-center profblock">
                        <h3 style="font-weight: bold;color:red">{{ Auth::user()->code }}</h3>
                    </div>
                    <div class="col-md-12">
                        <hr/>
                    </div>
                    <div class="col-md-5">
                        Matricule : <b>{{ Auth::user()->matricule ?? null }}</b><br>
                        Nom : <b>{{ Auth::user()->nom ?? null }}</b><br>
                        Prénom : <b>{{ Auth::user()->prenom ?? null }}</b><br>
                        Numero MTN : <b>{{ Auth::user()->contact_mtn ?? null }}</b><br>
                        Phone : <b>{{ Auth::user()->phone ?? null }}</b><br>
                    </div>
                    <div class="col-md-7">
                        Email : <b>{{ Auth::user()->email ?? null }}</b><br>
                        Pays : <b>{{ Auth::user()->getPays->nom_fr_fr ?? null }}</b><br>
                        Ville : <b>{{ Auth::user()->ville ?? null }}</b><br>
                        Localite : <b>{{ Auth::user()->localite ?? null }}</b><br>
                        Fonction MIDD : <b>{{ Auth::user()->fonction_midd ?? null }}</b><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-border card-primary">
            <div class="card-heading">
                <h3 class="card-title text-primary">Mot de passe</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    @csrf
                    <input type="password" placeholder="Mot de passe actuel" name="password_old" class="form-control" required>
                    <span class="text-danger">
                        {{ $errors->first('password_old') }}
                    </span>
                    <input type="password" placeholder="Nouveau mot de passe" name="password" class="form-control" required>
                    <span class="text-danger">
                        {{ $errors->first('password') }}
                    </span>
                    <input type="password" placeholder="Confirmation" name="password_confirmation" class="form-control" required>
                    <span class="text-danger">
                        {{ $errors->first('password_confirmation') }}
                    </span>
                    <br>
                    <button type="submit" class="btn btn-primary w-100">Changer mon mot de passe</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-3">
        <div class="card overflow-hidden text-center">
            <div class="card-heading" style="background-color: #e1e7ec">
                <h3 class="card-title">FICHE DE PRECOMPTE</h3>
            </div>
            <div class="card-body">
                <h4 class="d-inline">Pas disponible</h4>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card overflow-hidden text-center">
            <div class="card-heading" style="background-color: #e1e7ec">
                <h3 class="card-title">FICHE D’ADHESION</h3>
            </div>
            <div class="card-body">
                <h4 class="d-inline">Pas disponible</h4>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
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
                            @foreach (Auth::user()->getLoginSession->reverse()->take(10) as $key => $value)
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

<!-- Modal Partage -->
<div class="modal fade" id="PartageModal" tabindex="-1" role="dialog" aria-labelledby="PartageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PartageModalLabel">
                    <i class="mdi mdi-share-variant text-primary"></i>
                    Partager votre lien de parrainage
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center pb-0">

				<a href="http://www.facebook.com/sharer.php?u={{ route('Site-RegisterGetShow', ['p' => Auth::user()->code]) }}" target="_blank" class="mdi mdi-facebook-box mdi-48px curs-pointe" title="Parteger sur Facebook"></a>

				<a href="https://twitter.com/share?url={{ route('Site-RegisterGetShow', ['p' => Auth::user()->code]) }}" target="_blank" class="mdi mdi-twitter-box text-info mdi-48px curs-pointe" title="Parteger sur Twitter"></a>

                <a href="https://pinterest.com/pin/create/button/?url={{ route('Site-RegisterGetShow', ['p' => Auth::user()->code]) }}&media=&description=" target="_blank" class="mdi mdi-pinterest-box text-danger mdi-48px curs-pointe" title="Parteger sur Pinterest"></a>

                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('Site-RegisterGetShow', ['p' => Auth::user()->code]) }}" target="_blank" class="mdi mdi-linkedin-box mdi-48px curs-pointe" title="Parteger sur Linkedin"></a>

				<a href="mailto:info@example.com?&subject=&body={{ route('Site-RegisterGetShow', ['p' => Auth::user()->code]) }}" class="mdi mdi-email text-warning mdi-48px curs-pointe" title="Parteger par mail"></a>

				<a href="https://api.whatsapp.com/send?phone=&text={{ route('Site-RegisterGetShow', ['p' => Auth::user()->code]) }}" title="Parteger sur Whatsapp" class="mdi mdi-whatsapp text-success mdi-48px" target="blank"></a>

                <a href="sms:?body={{ route('Site-RegisterGetShow', ['p' => Auth::user()->code]) }}" title="Parteger par SMS" class="mdi mdi-android-messages text-secondary mdi-48px" target="blank"></a>

		    </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')

<script src="{{ asset('/dist/admin/plugins/jquery-knob/jquery.knob.js') }}"></script>
<script src="{{ asset('/dist/admin/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('/dist/admin/plugins/toastr/toastr.init.js') }}"></script>

<script>
    $('.profblock').mouseenter(function () {
        $(this).css('border', 'solid 1px #c9c9c9').css('border-radius', '5px').css('background-color', '#f3f3f3');
    });
    $('.profblock').mouseleave(function () {
        $(this).css('border', '').css('border-radius', '').css('background-color', '');
    });

    $('.mdi-content-copy').click(function (e) {
        navigator.clipboard.writeText("{{ Auth::user()->code }}").then(function() {
            toastr.success("Code copier");
        }, function() {
            toastr.error("Echec du copy");
        });
    });
</script>
@endsection
