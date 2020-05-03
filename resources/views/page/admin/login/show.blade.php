<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Dashboard">

    <link rel="shortcut icon" href="{{ asset('/file/image/logo/logo-64x64.png') }}">

    <title>{{ config('app.name') }} :: Connexion</title>

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
        <div class="container-alt">
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

                                <form class="form-horizontal" method="post">

                                    @csrf
                                    <input type="hidden" name="recaptcha" id="recaptcha">

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input name="email" class="form-control" type="email" required
                                                placeholder="Email" value="{{old('email')}}">
                                            <div class="text-danger">
                                                {{$errors->first('email')}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input name="password" class="form-control" type="password" required
                                                placeholder="Mot de passe" value="{{old('password')}}">
                                            <div class="text-danger">
                                                {{$errors->first('password')}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="checkbox checkbox-success pl-1">
                                                <input name="remember" id="checkbox-signup" type="checkbox" checked>
                                                <label for="checkbox-signup">
                                                    Se souvenir de moi
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group text-center m-t-30">
                                        <div class="col-sm-12">
                                            <a href="{{ route('Site-PasswordGetShow') }}" class="text-muted"><i
                                                    class="fa fa-lock m-r-5"></i> Mot de passe oublié ?</a>
                                        </div>
                                    </div>

                                    <div class="form-group account-btn text-center m-t-10">
                                        <div class="col-12">
                                            <button class="btn w-md btn-bordered btn-danger waves-effect waves-light"
                                                type="submit">Connexion</button>
                                        </div>
                                    </div>

                                </form>

                                <div class="clearfix"></div>

                            </div>
                        </div>


                        <div class="row m-t-50">
                            <div class="col-sm-12 text-center">
                                <h4 class="text-muted">
                                    Vous n'avez pas de compte ?
                                    <a href="{{ route('Site-RegisterGetShow') }}"
                                        class="text-primary m-l-5"><b>S'inscrire</b></a>
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

    @include('layouts.partage.recaptcha')

</body>

</html>
