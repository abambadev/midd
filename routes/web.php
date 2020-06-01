<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//------------------------- Page Site ---------------------------//

Route::group(['prefix' => '/', 'namespace' => 'Site', 'middleware' => []], function () {

    //------------------------- Page de connexion --------------------------------//
    Route::group(['prefix' => 'login', 'namespace' => 'Login'], function () {

        Route::get('/', ['as' => 'Site-LoginGetShow', 'uses' => 'LoginController@getShow']);
        Route::post('/', ['as' => 'Site-LoginPostShow', 'uses' => 'LoginController@postShow']);
    });

    //------------------------- Page de deconnexion ------------------------------//
    Route::group(['prefix' => 'logout', 'namespace' => 'Logout'], function () {

        Route::get('/', ['as' => 'Site-LogoutGetShow', 'uses' => 'LogoutController@getShow']);
    });

    //------------------------- Page d'inscription -------------------------------//
    Route::group(['prefix' => 'register', 'namespace' => 'Register'], function () {

        Route::get('/', ['as' => 'Site-RegisterGetShow', 'uses' => 'RegisterController@getShow']);
        Route::post('/', ['as' => 'Site-RegisterPostShow', 'uses' => 'RegisterController@postShow']);

        Route::post('/ajax', ['as' => 'Site-RegisterPostAjax', 'uses' => 'RegisterController@postAjax']);
    });

    //------------------------- Page d'activation de compte ----------------------//
    Route::group(['prefix' => 'activer', 'namespace' => 'Activer'], function () {

        Route::get('/{uuid}', ['as' => 'Site-ActiverGetShow', 'uses' => 'ActiverController@getShow']);
    });

    //------------------------- Page de reset de mot de passe --------------------//
    Route::group(['prefix' => 'password', 'namespace' => 'Password'], function () {

        Route::get('/', ['as' => 'Site-PasswordGetShow', 'uses' => 'PasswordController@getShow']);
        Route::post('/', ['as' => 'Site-PasswordPostShow', 'uses' => 'PasswordController@postShow']);

        Route::get('/reset/{uuid}', ['as' => 'Site-PasswordGetReset', 'uses' => 'PasswordController@getReset']);
        Route::post('/reset/{uuid}', ['as' => 'Site-PasswordPostReset', 'uses' => 'PasswordController@postReset']);
    });

    //------------------------- Page Home ----------------------------------------//
    Route::group(['prefix' => '/', 'namespace' => 'Home'], function () {

        Route::get('/', ['as' => 'Site-HomeGetShow', 'uses' => 'HomeController@getShow']);
        Route::post('/', ['as' => 'Site-HomePostShow', 'uses' => 'HomeController@postShow']);
    });

    //------------------------- Page Home ----------------------------------------//
    Route::group(['prefix' => '/script', 'namespace' => 'Script'], function () {

        Route::get('/', ['as' => 'Site-ScriptGetShow', 'uses' => 'ScriptController@getShow']);
    });
});

//------------------------- Page Admin ---------------------------------//
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

    //------------------------- Page Home -------------------------------//
    Route::group(['prefix' => '/', 'namespace' => 'Home'], function () {

        Route::get('/', ['as' => 'Admin-HomeGetShow', 'uses' => 'HomeController@getShow']);
        Route::post('/', ['as' => 'Admin-HomePostShow', 'uses' => 'HomeController@postShow']);
    });

    //------------------------- Page profil -------------------------------//
    Route::group(['prefix' => 'profil', 'namespace' => 'Profil'], function () {

        Route::get('/', ['as' => 'Admin-ProfilGetShow', 'uses' => 'ProfilController@getShow']);
        Route::post('/', ['as' => 'Admin-ProfilPostShow', 'uses' => 'ProfilController@postShow']);

        Route::get('/edite', ['as' => 'Admin-ProfilGetEdite', 'uses' => 'ProfilController@getEdite']);
        Route::post('/edite', ['as' => 'Admin-ProfilPostEdite', 'uses' => 'ProfilController@postEdite']);

        Route::get('/adhesion', ['as' => 'Admin-ProfilGetAdhesion', 'uses' => 'ProfilController@getAdhesion']);
        Route::get('/precompte', ['as' => 'Admin-ProfilGetPrecompte', 'uses' => 'ProfilController@getPrecompte']);
    });

    //------------------------- Page Config -------------------------------//
    Route::group(['prefix' => '/config', 'namespace' => 'Config', 'middleware' => ['permission:config-*']], function () {

        //------------------------- Page Config-Users -------------------------------//
        Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => ['permission:config-user-*']], function () {

            Route::get('/', ['as' => 'Admin-Config-UserGetShow', 'uses' => 'UserController@getShow', 'middleware' => ['permission:config-user-show']]);

            Route::get('/etat/{uuid}', ['as' => 'Admin-Config-UserGetEtat', 'uses' => 'UserController@getEtat', 'middleware' => ['permission:config-user-etat']]);

            Route::get('/profil/{uuid}', ['as' => 'Admin-Config-UserGetProfil', 'uses' => 'UserController@getProfil', 'middleware' => ['permission:config-user-profil']]);

            Route::get('/create', ['as' => 'Admin-Config-UserGetCreate', 'uses' => 'UserController@getCreate', 'middleware' => ['permission:config-user-create']]);
            Route::post('/create', ['as' => 'Admin-Config-UserPostCreate', 'uses' => 'UserController@postCreate', 'middleware' => ['permission:config-user-create']]);

            Route::get('/delete/{uuid}', ['as' => 'Admin-Config-UserGetDelete', 'uses' => 'UserController@getDelete', 'middleware' => ['permission:config-user-delete']]);
            Route::post('/delete/{uuid}', ['as' => 'Admin-Config-UserPostDelete', 'uses' => 'UserController@postDelete', 'middleware' => ['permission:config-user-delete']]);

            Route::get('/role/{uuid}', ['as' => 'Admin-Config-UserGetRole', 'uses' => 'UserController@getRole', 'middleware' => ['permission:config-user-role']]);
            Route::post('/role/{uuid}', ['as' => 'Admin-Config-UserPostRole', 'uses' => 'UserController@postRole', 'middleware' => ['permission:config-user-role']]);
        });

        //------------------------- Page Config-Role -------------------------------//
        Route::group(['prefix' => 'role', 'namespace' => 'Role', 'middleware' => ['permission:config-role-*']], function () {

            Route::get('/', ['as' => 'Admin-Config-RoleGetShow', 'uses' => 'RoleController@getShow', 'middleware' => ['permission:config-role-show']]);

            Route::get('/create', ['as' => 'Admin-Config-RoleGetCreate', 'uses' => 'RoleController@getCreate', 'middleware' => ['permission:config-role-create']]);
            Route::post('/create', ['as' => 'Admin-Config-RolePostCreate', 'uses' => 'RoleController@postCreate', 'middleware' => ['permission:config-role-create']]);

            Route::get('/edite/{id}', ['as' => 'Admin-Config-RoleGetEdite', 'uses' => 'RoleController@getEdite', 'middleware' => ['permission:config-role-edite']]);
            Route::post('/edite/{id}', ['as' => 'Admin-Config-RolePostEdite', 'uses' => 'RoleController@postEdite', 'middleware' => ['permission:config-role-edite']]);

            Route::get('/delete/{id}', ['as' => 'Admin-Config-RoleGetDelete', 'uses' => 'RoleController@getDelete', 'middleware' => ['permission:config-role-delete']]);
            Route::post('/delete/{id}', ['as' => 'Admin-Config-RolePostDelete', 'uses' => 'RoleController@postDelete', 'middleware' => ['permission:config-role-delete']]);
        });

        //------------------------- Page Config-Fonction -------------------------------//
        Route::group(['prefix' => 'fonction', 'namespace' => 'Fonction', 'middleware' => ['permission:config-role-*']], function () {

            Route::get('/', ['as' => 'Admin-Config-FonctionGetShow', 'uses' => 'FonctionController@getShow', 'middleware' => ['permission:config-role-show']]);

            Route::get('/create', ['as' => 'Admin-Config-FonctionGetCreate', 'uses' => 'FonctionController@getCreate', 'middleware' => ['permission:config-role-create']]);
            Route::post('/create', ['as' => 'Admin-Config-FonctionPostCreate', 'uses' => 'FonctionController@postCreate', 'middleware' => ['permission:config-role-create']]);

            Route::get('/edite/{uuid}', ['as' => 'Admin-Config-FonctionGetEdite', 'uses' => 'FonctionController@getEdite', 'middleware' => ['permission:config-role-edite']]);
            Route::post('/edite/{uuid}', ['as' => 'Admin-Config-FonctionPostEdite', 'uses' => 'FonctionController@postEdite', 'middleware' => ['permission:config-role-edite']]);

            Route::get('/delete/{uuid}', ['as' => 'Admin-Config-FonctionGetDelete', 'uses' => 'FonctionController@getDelete', 'middleware' => ['permission:config-role-delete']]);
            Route::post('/delete/{uuid}', ['as' => 'Admin-Config-FonctionPostDelete', 'uses' => 'FonctionController@postDelete', 'middleware' => ['permission:config-role-delete']]);
        });

        //------------------------- Page Config-Ecole -------------------------------//
        Route::group(['prefix' => 'ecole', 'namespace' => 'Ecole', 'middleware' => ['permission:config-role-*']], function () {

            Route::get('/', ['as' => 'Admin-Config-EcoleGetShow', 'uses' => 'EcoleController@getShow', 'middleware' => ['permission:config-role-show']]);

            Route::get('/create', ['as' => 'Admin-Config-EcoleGetCreate', 'uses' => 'EcoleController@getCreate', 'middleware' => ['permission:config-role-create']]);
            Route::post('/create', ['as' => 'Admin-Config-EcolePostCreate', 'uses' => 'EcoleController@postCreate', 'middleware' => ['permission:config-role-create']]);

            Route::get('/edite/{uuid}', ['as' => 'Admin-Config-EcoleGetEdite', 'uses' => 'EcoleController@getEdite', 'middleware' => ['permission:config-role-edite']]);
            Route::post('/edite/{uuid}', ['as' => 'Admin-Config-EcolePostEdite', 'uses' => 'EcoleController@postEdite', 'middleware' => ['permission:config-role-edite']]);

            Route::get('/delete/{uuid}', ['as' => 'Admin-Config-EcoleGetDelete', 'uses' => 'EcoleController@getDelete', 'middleware' => ['permission:config-role-delete']]);
            Route::post('/delete/{uuid}', ['as' => 'Admin-Config-EcolePostDelete', 'uses' => 'EcoleController@postDelete', 'middleware' => ['permission:config-role-delete']]);
        });

        //------------------------- Page Config-Secteur -------------------------------//
        Route::group(['prefix' => 'secteur', 'namespace' => 'Secteur', 'middleware' => ['permission:config-role-*']], function () {

            Route::get('/', ['as' => 'Admin-Config-SecteurGetShow', 'uses' => 'SecteurController@getShow', 'middleware' => ['permission:config-role-show']]);

            Route::get('/create', ['as' => 'Admin-Config-SecteurGetCreate', 'uses' => 'SecteurController@getCreate', 'middleware' => ['permission:config-role-create']]);
            Route::post('/create', ['as' => 'Admin-Config-SecteurPostCreate', 'uses' => 'SecteurController@postCreate', 'middleware' => ['permission:config-role-create']]);

            Route::get('/edite/{uuid}', ['as' => 'Admin-Config-SecteurGetEdite', 'uses' => 'SecteurController@getEdite', 'middleware' => ['permission:config-role-edite']]);
            Route::post('/edite/{uuid}', ['as' => 'Admin-Config-SecteurPostEdite', 'uses' => 'SecteurController@postEdite', 'middleware' => ['permission:config-role-edite']]);

            Route::get('/delete/{uuid}', ['as' => 'Admin-Config-SecteurGetDelete', 'uses' => 'SecteurController@getDelete', 'middleware' => ['permission:config-role-delete']]);
            Route::post('/delete/{uuid}', ['as' => 'Admin-Config-SecteurPostDelete', 'uses' => 'SecteurController@postDelete', 'middleware' => ['permission:config-role-delete']]);
        });

        //------------------------- Page Config-Inspection -------------------------------//
        Route::group(['prefix' => 'inspection', 'namespace' => 'Inspection', 'middleware' => ['permission:config-role-*']], function () {

            Route::get('/', ['as' => 'Admin-Config-InspectionGetShow', 'uses' => 'InspectionController@getShow', 'middleware' => ['permission:config-role-show']]);

            Route::get('/create', ['as' => 'Admin-Config-InspectionGetCreate', 'uses' => 'InspectionController@getCreate', 'middleware' => ['permission:config-role-create']]);
            Route::post('/create', ['as' => 'Admin-Config-InspectionPostCreate', 'uses' => 'InspectionController@postCreate', 'middleware' => ['permission:config-role-create']]);

            Route::get('/edite/{uuid}', ['as' => 'Admin-Config-InspectionGetEdite', 'uses' => 'InspectionController@getEdite', 'middleware' => ['permission:config-role-edite']]);
            Route::post('/edite/{uuid}', ['as' => 'Admin-Config-InspectionPostEdite', 'uses' => 'InspectionController@postEdite', 'middleware' => ['permission:config-role-edite']]);

            Route::get('/delete/{uuid}', ['as' => 'Admin-Config-InspectionGetDelete', 'uses' => 'InspectionController@getDelete', 'middleware' => ['permission:config-role-delete']]);
            Route::post('/delete/{uuid}', ['as' => 'Admin-Config-InspectionPostDelete', 'uses' => 'InspectionController@postDelete', 'middleware' => ['permission:config-role-delete']]);
        });

        //------------------------- Page Config-Direction -------------------------------//
        Route::group(['prefix' => 'direction', 'namespace' => 'Direction', 'middleware' => ['permission:config-role-*']], function () {

            Route::get('/', ['as' => 'Admin-Config-DirectionGetShow', 'uses' => 'DirectionController@getShow', 'middleware' => ['permission:config-role-show']]);

            Route::get('/create', ['as' => 'Admin-Config-DirectionGetCreate', 'uses' => 'DirectionController@getCreate', 'middleware' => ['permission:config-role-create']]);
            Route::post('/create', ['as' => 'Admin-Config-DirectionPostCreate', 'uses' => 'DirectionController@postCreate', 'middleware' => ['permission:config-role-create']]);

            Route::get('/edite/{uuid}', ['as' => 'Admin-Config-DirectionGetEdite', 'uses' => 'DirectionController@getEdite', 'middleware' => ['permission:config-role-edite']]);
            Route::post('/edite/{uuid}', ['as' => 'Admin-Config-DirectionPostEdite', 'uses' => 'DirectionController@postEdite', 'middleware' => ['permission:config-role-edite']]);

            Route::get('/delete/{uuid}', ['as' => 'Admin-Config-DirectionGetDelete', 'uses' => 'DirectionController@getDelete', 'middleware' => ['permission:config-role-delete']]);
            Route::post('/delete/{uuid}', ['as' => 'Admin-Config-DirectionPostDelete', 'uses' => 'DirectionController@postDelete', 'middleware' => ['permission:config-role-delete']]);
        });

        //------------------------- Page Config-Document -------------------------------//
        Route::group(['prefix' => 'document', 'namespace' => 'Document', 'middleware' => ['permission:config-role-*']], function () {

            Route::get('/', ['as' => 'Admin-Config-DocumentGetShow', 'uses' => 'DocumentController@getShow', 'middleware' => ['permission:config-role-show']]);

            Route::get('/adhesion/{uuid}', ['as' => 'Admin-Config-DocumentGetAdhesion', 'uses' => 'DocumentController@getAdhesion']);
            Route::get('/precompte/{uuid}', ['as' => 'Admin-Config-DocumentGetPrecompte', 'uses' => 'DocumentController@getPrecompte']);

        });

    });

    //------------------------- Page WebService -------------------------------//
    Route::group(['prefix' => '/web-service', 'namespace' => 'WebService'], function () {

        Route::get('/', ['as' => 'Admin-WebServiceGetShow', 'uses' => 'WebServiceController@getShow']);
        Route::post('/', ['as' => 'Admin-WebServicePostShow', 'uses' => 'WebServiceController@postShow']);
    });

});
