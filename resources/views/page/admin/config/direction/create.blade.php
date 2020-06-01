@extends('layouts.admin.master')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('entete')
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box mb-0 pb-2 pt-3">
                    <h4 class="page-title pt-2">
                        Ajouter une Direction
                    </h4>
                    <a href="{{ route('Admin-Config-DirectionGetShow') }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5 float-right">
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
    <div class="col-2"></div>
    <div class="col-md-8">

        <div class="card overflow-hidden">
            <div class="card-heading bg-primary">
                <h3 class="card-title text-white">Ajouter une direction</h3>
            </div>
            <div class="card-body p-2 text-center">
                <br/><br/>
                <form method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="libelle" class="form-control" placeholder="Libelle de la direction" value="{{ old('libelle') }}" required>
                                <span class="text-danger">{{ $errors->first('libelle') }}</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <br>
                            <button type="submit" class="btn btn-teal btn-rounded w-md waves-effect waves-light w-50">
                                <i class="mdi mdi-plus"></i>
                                Ajouter
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>
    <div class="col-2"></div>
</div>


@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    $('.select2').select2();
</script>
@endsection


