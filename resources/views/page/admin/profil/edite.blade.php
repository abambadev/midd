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
                        Mise à jour du profil
                    </h4>
                    <a href="{{ route('Admin-ProfilGetShow') }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5 float-right">
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
    <div class="col-1"></div>
    <div class="col-md-10">

        <div class="card overflow-hidden">
            <div class="card-heading bg-primary">
                <h3 class="card-title text-white">Modifier le profil</h3>
            </div>
            <div class="card-body p-2 text-center">

                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-3 text-center">
                            <div class="form-group row">
                                <div class="col-12">
                                    <img src="{{ asset('/file/image/users/'.Auth::user()->photo) }}" class="img-fluid img-thumbnail" id="photo_vue">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="file" name="photo" class="form-control form-control-file" placeholder="Image"  accept="image/*" id="photo_input">
                                        <span class="text-danger">{{ $errors->first('photo') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">

                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" name="sexe" class="form-control" placeholder="Sexe" value="{{ old('sexe') ? old('sexe') : Auth::user()->sexe }}" required>
                                        <span class="text-danger">{{ $errors->first('sexe') }}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" name="matricule" class="form-control" placeholder="Matricule" value="{{ old('matricule') ? old('matricule') : Auth::user()->matricule }}" required>
                                        <span class="text-danger">{{ $errors->first('matricule') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" name="nom" class="form-control" placeholder="Nom" value="{{ old('nom') ? old('nom') : Auth::user()->nom }}" required>
                                        <span class="text-danger">{{ $errors->first('nom') }}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" name="prenom" class="form-control" placeholder="Prénom" value="{{ old('prenom') ? old('prenom') : Auth::user()->prenom }}" required>
                                        <span class="text-danger">{{ $errors->first('prenom') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text pl-0 pt-0 pb-0">
                                                <img src="{{ asset('/file/image/flag/'.Auth::user()->getPays->alpha2.'.png') }}" class="" style="height: 20px" id="flag_pays_id">
                                            </span>
                                        </div>
                                        <select name="pays_id" class="form-control" required id="input_pays_id">
                                            @foreach ( $pays as $value)
                                            <option @if (old('ville') == $value->id or Auth::user()->pays_id == $value->id) selected @endif value="{{ $value->id }}">{{ $value->nom_fr_fr }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <input name="ville" class="form-control" type="text" required placeholder="Ville"  value="{{ old('ville') ? old('ville') : Auth::user()->ville }}">
                                    <span class="text-danger">
                                        {{ $errors->first('ville') }}
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" name="numero_cni" class="form-control" placeholder="Numero CNI" value="{{ old('numero_cni') ? old('numero_cni') : Auth::user()->numero_cni }}" required>
                                        <span class="text-danger">{{ $errors->first('numero_cni') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" name="contact_mtn" class="form-control" placeholder="Numero MTN" value="{{ old('contact_mtn') ? old('contact_mtn') : Auth::user()->contact_mtn }}" required>
                                        <span class="text-danger">{{ $errors->first('contact_mtn') }}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="Autre Numero" value="{{ old('phone') ? old('phone') : Auth::user()->phone }}" required>
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="form-group">

                                        <select name="service" class="form-control" id="input_service" required>
                                            @foreach ( $ecoles as $value)
                                                <option @if (old('service') == $value->id ) selected @endif value="{{ $value->id }}">{{ $value->libelle }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('service') }}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">

                                        <select name="fonction_midd" class="form-control" id="input_fonction_midd" required>
                                            @foreach ( $fonctions as $value)
                                                <option @if (old('fonction_midd') == $value->id ) selected @endif value="{{ $value->id }}">{{ $value->libelle }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('fonction_midd') }}</span>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-4">
                                    <div class="form-label">
                                        <label>Date de prise de service</label>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="date_prise_service" value="{{ old('date_prise_service') ? old('date_prise_service') : Auth::user()->date_prise_service }}">
                                        <span class="text-danger">{{ $errors->first('date_prise_service') }}</span>
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-teal btn-rounded w-md waves-effect waves-light w-50 m-3">
                                <i class="mdi mdi-plus"></i>
                                Mettre à jour
                            </button>

                        </div>

                    </div>

                </form>

            </div>
        </div>

    </div>
    <div class="col-1"></div>
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


{{--

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" name="localite" class="form-control" placeholder="Localite" value="{{ old('localite') ? old('localite') : Auth::user()->localite }}" required>
                                        <span class="text-danger">{{ $errors->first('localite') }}</span>
                                    </div>
                                </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" name="ministere_epn" class="form-control" placeholder="Ministère / EPN" value="{{ old('ministere_epn') ? old('ministere_epn') : Auth::user()->ministere_epn }}" required>
                                        <span class="text-danger">{{ $errors->first('ministere_epn') }}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" name="dren" class="form-control" placeholder="DREN" value="{{ old('dren') ? old('dren') : Auth::user()->dren }}" required>
                                        <span class="text-danger">{{ $errors->first('dren') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" name="section_syndicale" class="form-control" placeholder="Section Syndicale" value="{{ old('section_syndicale') ? old('section_syndicale') : Auth::user()->section_syndicale }}" required>
                                        <span class="text-danger">{{ $errors->first('section_syndicale') }}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" name="secteur_pedagogique" class="form-control" placeholder="Secteur Pedagogique" value="{{ old('secteur_pedagogique') ? old('secteur_pedagogique') : Auth::user()->secteur_pedagogique }}" required>
                                        <span class="text-danger">{{ $errors->first('secteur_pedagogique') }}</span>
                                    </div>
                                </div>
                            </div> --}}
