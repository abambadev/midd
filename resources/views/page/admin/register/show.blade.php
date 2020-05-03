<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inscription">

    <link rel="shortcut icon" href="{{ asset('/file/image/logo/logo-64x64.png') }}">

    <title>{{ config('app.name') }} :: Incription</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('/dist/admin/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/dist/admin/assets/css/icons.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/dist/admin/assets/css/style.css') }}" />

    @if (session('MsgFlash'))
    <link href="{{ asset('/dist/admin/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    @endif

    <script src="{{ asset('/dist/admin/assets/js/modernizr.min.js') }}"></script>
</head>


<body style="background-image: url({{ asset('/file/image/website/slider/slider1.jpg') }});">

    <section>
        <div class="container-alt" style="overflow: hidden;">
            <div class="row">
                <div class="col-sm-12">

                    <div class="wrapper-page">

                        <div class="m-t-40 account-pages bg-white">
                            <div class="text-center account-logo-box bg-primary">
                                <div class="m-t-10 m-b-10">
                                    <a href="{{ route('Site-HomeGetShow') }}">
                                        <h2 class="text-white">
                                            <img src="{{ asset('/file/image/website/logo/midd.jpeg') }}" style="height:80px;width:80px" class="rounded">
                                            {{-- config('app.name') --}}
                                        </h2>
                                    </a>
                                </div>
                            </div>
                            <div class="account-content">
                                <form method="post" class="form-horizontal">

                                    @csrf
                                    <input type="hidden" name="recaptcha" id="recaptcha">

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input name="nom" class="form-control" type="text" required
                                                placeholder="Nom" value="{{ old('nom') }}">
                                            <span class="text-danger">
                                                {{ $errors->first('nom') }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input name="prenom" class="form-control" type="text" required
                                                placeholder="Prénom" value="{{ old('prenom') }}">
                                            <span class="text-danger">
                                                {{ $errors->first('prenom') }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input name="email" class="form-control" type="email" required
                                                placeholder="Email" value="{{ old('email') }}">
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
                                                        <img src="{{ asset('/file/image/flag/ci.png') }}" class=""
                                                            id="flag_pays_id" style="height: 20px">
                                                    </span>
                                                </div>
                                                <select name="pays_id" class="form-control" id="input_pays_id" required>
                                                    @foreach ( $pays as $value)
                                                    <option @if (old('ville')==$value->id or $value->id == 110) selected
                                                        @endif value="{{ $value->id }}">{{ $value->nom_fr_fr }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <input name="ville" class="form-control" type="text" required
                                                placeholder="Ville" value="{{ old('ville') }}">
                                            <span class="text-danger">
                                                {{ $errors->first('ville') }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input name="contact_mtn" class="form-control" type="number" required
                                                placeholder="Numero MTN (ex : 44650590)" value="{{ old('contact_mtn') }}">
                                            <span class="text-danger">
                                                {{ $errors->first('contact_mtn') }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input name="phone" class="form-control" type="number" required
                                                placeholder="Autre Numero (ex : 47790119)" value="{{ old('phone') }}">
                                            <span class="text-danger">
                                                {{ $errors->first('phone') }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <input name="password" class="form-control" type="password" required
                                                placeholder="Mot de passe" value="{{ old('password') }}">
                                            <span class="text-danger">
                                                {{ $errors->first('password') }}
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <input name="password_confirmation" class="form-control" type="password"
                                                required placeholder="Confirmation password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12 text-center">
                                            <div class="checkbox checkbox-success pt-1 pl-1">
                                                <input name="cgu" id="checkbox-signup" type="checkbox" required>
                                                <label for="checkbox-signup" class="mb-0">
                                                    J'accepte les <a href="#">termes et conditions</a>
                                                </label>
                                            </div>
                                            <span class="text-danger">
                                                {{ $errors->first('cgu') }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group account-btn text-center m-t-10">
                                        <div class="col-12">
                                            <button class="btn w-md btn-danger btn-bordered waves-effect waves-light"
                                                type="submit">
                                                Crée mon compte
                                            </button>
                                        </div>
                                    </div>

                                </form>

                                <div class="clearfix"></div>

                            </div>
                        </div>

                        <div class="row m-t-50">
                            <div class="col-sm-12 text-center">
                                <h4 class="text-muted">
                                    Vous avez déjà un compte ?
                                    <a href="{{ route('Site-LoginGetShow') }}" class="text-primary m-l-5">
                                        <b>Se connecter</b>
                                    </a>
                                </h4>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        var resizefunc = [];
    </script>

    <script src="{{ asset('/dist/admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/dist/admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/dist/admin/assets/js/detect.js') }}"></script>
    <script src="{{ asset('/dist/admin/assets/js/fastclick.js') }}"></script>
    <script src="{{ asset('/dist/admin/assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('/dist/admin/assets/js/waves.js') }}"></script>
    <script src="{{ asset('/dist/admin/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('/dist/admin/assets/js/jquery.scrollTo.min.js') }}"></script>

    @if (session('MsgFlash'))
    <script src="{{ asset('/dist/admin/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('/dist/admin/plugins/toastr/toastr.init.js') }}"></script>
    <script type="text/javascript">
        toastr.{{ session('MsgFlash')['type'] }}("{{ session('MsgFlash')['msg'] }}")
    </script>
    @endif

    <script src="{{ asset('/dist/admin/assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('/dist/admin/assets/js/jquery.app.js') }}"></script>

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

    @include('layouts.partage.recaptcha')

</body>

</html>
