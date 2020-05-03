<div class="navbar navbar-default" role="navigation">
    <div class="container-fluid">

        <div class="clearfix">
            {{-- Navbar-left --}}
            <ul class="nav navbar-left">
                <li>
                    <button class="button-menu-mobile open-left waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
            </ul>

            {{-- Right(Notification) --}}
            <ul class="nav navbar-right">

                <li class="dropdown user-box">
                    <a href="#" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown"
                        aria-expanded="true">
                        <img src="{{ asset('/file/image/users/'.Auth::user()->photo) }}" alt="user-img"
                            class="rounded-circle user-img">
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right user-list notify-list">
                        <li>
                            <h5 class="text-center">
                                {{ explode(' ', Auth::user()->prenom)[0] }}
                            </h5>
                        </li>
                        <li>
                            <a href="{{ route('Admin-ProfilGetShow') }}" class="dropdown-item"><i
                                    class="ti-user m-r-5"></i>Voir Profil</a>
                        </li>
                        <li>
                            <a href="{{ route('Site-LogoutGetShow') }}" class="dropdown-item text-danger"><i
                                    class="ti-power-off m-r-5"></i> Déconnexion</a>
                        </li>
                    </ul>
                </li>

            </ul> {{-- end navbar-right --}}
        </div>

    </div>{{-- end container --}}
</div>{{-- end navbar --}}
