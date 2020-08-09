@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-xl-4 col-lg-5">

        <!-- Profile Image -->
        <div class="box bg-info bg-deathstar-dark">
            <div class="box-body box-profile">
                <img class="profile-user-img rounded img-fluid mx-auto d-block" src="{{asset('images/avatar/user.svg')}}"
                    alt="User profile picture">

                <h2 class="profile-username text-center mb-0">{{ Auth::user()->first_name }}
                    {{ Auth::user()->last_name }}</h2>

                <h4 class="text-center mt-0"><i class="fa fa-envelope-o mr-10"></i>{{ Auth::user()->email }}</h4>

                <div class="row">
                    <h2 class="title w-p100 mt-10 mb-0 p-20">Les Demandes</h2>
                    <div class="col-12">
                        <div class="media-list media-list-hover w-p100 mt-0">
                            <h5 class="media media-single py-10 px-0 w-p100 justify-content-between">
                                <p>
                                    <i class="fa fa-circle text-info pr-10 font-size-12"></i>En attente
                                </p>
                                <p class="text-right pull-right">
                                    {{ count(App\Demande::where([['affecter',Auth::user()->id], ['etat' , 5]])->get()) }}
                                </p>
                            </h5>
                            <h5 class="media media-single py-10 px-0 w-p100 justify-content-between">
                                <p>
                                    <i class="fa fa-circle text-success pr-10 font-size-12"></i>Validée
                                </p>
                                <p class="text-right pull-right">
                                    {{ count(App\Demande::where([['affecter',Auth::user()->id], ['etat' , 1]])->get()) }}
                                </p>
                            </h5>
                            <h5 class="media media-single py-10 px-0 w-p100 justify-content-between">
                                <p>
                                    <i class="fa fa-circle text-red pr-10 font-size-12"></i>Réfusée
                                </p>
                                <p class="text-right pull-right">
                                    {{ count(App\Demande::where([['affecter',Auth::user()->id], ['etat' , 2]])->get()) }}
                                </p>
                            </h5>
                            <h5 class="media media-single py-10 px-0 w-p100 justify-content-between">
                                <p>
                                    <i class="fa fa-circle text-red pr-10 font-size-12"></i>Clôturée
                                </p>
                                <p class="text-right pull-right">
                                    {{ count(App\Demande::where([['affecter',Auth::user()->id], ['etat' , 3]])->get()) }}
                                </p>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-xl-8 col-lg-7">

        <div class="box box-solid bg-black">
            <div class="box-header with-border">
                <h3 class="box-title">Détails personnels</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('users.update') }}" method="post">
                    <div class="row">
                        @csrf
                        @method('PUT')
                        <input class="form-control" name="id" type="hidden" value="{{ Auth::user()->id }}">
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nom</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="first_name" type="text"
                                        placeholder="{{ Auth::user()->first_name }}"
                                        value="{{ !is_null(old('first_name')) ? old('first_name') : Auth::user()->first_name  }}">
                                    @error('first_name')
                                    <div class="alert alert-danger my-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Prenom</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="last_name" type="text"
                                        placeholder="{{ Auth::user()->last_name }}"
                                        value='{{ !is_null(old('last_name')) ? old('last_name') : Auth::user()->last_name }}'>
                                    @error('last_name')
                                    <div class="alert alert-danger my-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" name="email"
                                        placeholder="{{ Auth::user()->email }}"
                                        value="{{ !is_null(old('email')) ? old('email') : Auth::user()->email }}">
                                    @error('email')
                                    <div class="alert alert-danger my-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-yellow">Modifier</button>
                                </div>
                            </div>
                        </div>

                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>

        <div class="box box-solid bg-black">
            <div class="box-header with-border">
                <h3 class="box-title">Changer le mot de passe</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('users.password') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nouveau mot de passe</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="password" type="password">
                                    @error('password')
                                    <div class="alert alert-danger my-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Confirmer le mot de passe</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="password_confirmation" type="password">
                                    @error('password_confirmation')
                                    <div class="alert alert-danger my-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-yellow">Changer</button>
                                </div>
                            </div>
                        </div>

                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

@endsection
@section('scripts')
    @if (session('success'))
    <script>
        Swal.fire(
            'Compte modifier',
            ``,
            'success'
        );
    </script>
    @endif
@endsection