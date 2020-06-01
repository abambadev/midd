<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <div class="user-details">
                <div class="overlay"></div>
                <div class="text-center">
                    <img src="{{ asset('/file/image/users/'.Auth::user()->photo) }}" alt=""
                        class="thumb-md rounded-circle">
                </div>
                <div class="user-info">
                    <div class="text-center">
                        <a href="#setting-dropdown" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            {{ Auth::user()->prenom }}
                            <span class="mdi mdi-menu-down"></span></a>
                    </div>
                </div>
            </div>

            <div class="dropdown" id="setting-dropdown">
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('Admin-ProfilGetShow') }}" class="dropdown-item">
                            <i class="ti-user m-r-5"></i>
                            Profil
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Site-LogoutGetShow') }}" class="dropdown-item text-danger">
                            <i class="mdi mdi-logout m-r-5"></i>
                            Déconnexion
                        </a>
                    </li>
                </ul>
            </div>

            <ul>
                <li class="menu-title">Navigation</li>

                <li class="has_sub">
                    <a href="{{ route('Admin-HomeGetShow') }}" class="waves-effect">
                        <i class="mdi mdi-monitor-dashboard"></i>
                        <span> Tableau de bord </span>
                    </a>
                </li>

                @permission('config-*')
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="mdi mdi-settings-outline"></i>
                        <span> Administration </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled" style="display: none;">
                        @permission('config-user-show')
                        <li>
                            <a href="{{ route('Admin-Config-UserGetShow') }}" class="font-weight-bold">
                                <i class="mdi mdi-chevron-right"></i>
                                Utilisateur
                            </a>
                        </li>
                        @endpermission
                        @permission('config-role-show')
                        <li>
                            <a href="{{ route('Admin-Config-RoleGetShow') }}" class="font-weight-bold">
                                <i class="mdi mdi-chevron-right"></i>
                                Roles
                            </a>
                        </li>
                        @endpermission
                        @permission('config-role-show')
                        <li>
                            <a href="{{ route('Admin-Config-FonctionGetShow') }}" class="font-weight-bold">
                                <i class="mdi mdi-chevron-right"></i>
                                Fonction
                            </a>
                        </li>
                        @endpermission
                        @permission('config-role-show')
                        <li>
                            <a href="{{ route('Admin-Config-DirectionGetShow') }}" class="font-weight-bold">
                                <i class="mdi mdi-chevron-right"></i>
                                Direction
                            </a>
                        </li>
                        @endpermission
                        @permission('config-role-show')
                        <li>
                            <a href="{{ route('Admin-Config-InspectionGetShow') }}" class="font-weight-bold">
                                <i class="mdi mdi-chevron-right"></i>
                                Inspection
                            </a>
                        </li>
                        @endpermission
                        @permission('config-role-show')
                        <li>
                            <a href="{{ route('Admin-Config-SecteurGetShow') }}" class="font-weight-bold">
                                <i class="mdi mdi-chevron-right"></i>
                                Secteur Pedagogique
                            </a>
                        </li>
                        @endpermission
                        @permission('config-role-show')
                        <li>
                            <a href="{{ route('Admin-Config-EcoleGetShow') }}" class="font-weight-bold">
                                <i class="mdi mdi-chevron-right"></i>
                                Ecole
                            </a>
                        </li>
                        @endpermission
                        @permission('config-role-show')
                        <li>
                            <a href="{{ route('Admin-Config-DocumentGetShow') }}" class="font-weight-bold">
                                <i class="mdi mdi-chevron-right"></i>
                                Document
                            </a>
                        </li>
                        @endpermission
                    </ul>
                </li>
                @endpermission

                <li class="has_sub">
                    <a href="{{ route('Admin-WebServiceGetShow') }}" class="waves-effect">
                        <i class="mdi mdi-code-braces"></i>
                        <span> Web Service - API </span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="clearfix"></div>

    </div>

</div>
