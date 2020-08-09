@extends('layouts.master')

@section('content')
<div class="row">

    <!-- /.col -->
    <div class="col-xl-12 col-lg-12">
        @if (session()->get('success'))
        <div class="alert alert-success my-1">
            {{ session()->get('success') }}
        </div>
        @endif

        <div class="box box-solid bg-black">
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('demande.store') }}" method="post">
                    <div class="row">
                        @csrf
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Numéro d'acte de naissance</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="identifiant" type="text" value="{{ old('identifiant') ? old('identifiant') : $demande->identifiant   }}">
                                    @error('identifiant')
                                    <div class="alert alert-danger my-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nom</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="nom" type="text" value="{{ old('nom') ? old('nom') : $demande->nom  }}">
                                    @error('nom')
                                    <div class="alert alert-danger my-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Prenom</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="prenom" type="text" value="{{ old('prenom') ? old('prenom') : $demande->prenom }}">
                                    @error('Prenom')
                                    <div class="alert alert-danger my-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Date de naissance</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="naissance" type="text" value="{{ old('naissance') ? old('naissance') : $demande->naissance }}">
                                    @error('naissance')
                                    <div class="alert alert-danger my-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="basic_checkbox_1" class="col-sm-2 col-form-label">Présumé </label>
                                <div class="col-sm-10">
                                    <select name="presume" id="" class="form-control select2 w-p100">
                                        <option value="0" {{ $demande->presume == 0 ? 'selected' : ''}}>Non</option>
                                        <option value="1" {{ $demande->presume == 1 ? 'selected' : ''}}>Oui</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Prénom de père</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="father" type="text" value="{{ old('father') ? old('father') : $demande->father  }}">
                                    @error('father')
                                    <div class="alert alert-danger my-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nom et prènom de mêre</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="mother" type="text" value="{{ old('mother') ? old('mother') : $demande->mother }}">
                                    @error('mother')
                                    <div class="alert alert-danger my-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="demo-radio-button col-sm-10">
                                    <input name="id_document" type="radio" id="radio_1" value="1" {{ $demande->id_document == 1 ? 'checked' : ''}} />
                                    <label for="radio_1">Acte de naissance </label>
                                    <input name="id_document" type="radio" id="radio_2" value="2" {{ $demande->id_document == 2 ? 'checked' : ''}} />
                                    <label for="radio_2">Acte de décès </label>
                                    <input name="id_document" type="radio" class="with-gap" id="radio_3" value="3" {{ $demande->id_document == 3 ? 'checked' : ''}} />
                                    <label for="radio_3">Acte de mariage </label>
                                </div>
                            </div>
                            <div id="getcommunes">
                                <getcommunes-component :wilayas="{{ $wilayas }}"></getcommunes-component>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    @error('code_commune')
                                    <div class="alert alert-danger my-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-info">Ajouter</button>
                                    <button type="reset" class="btn btn-warning">Vider les champs</button>
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
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2500
        });
    </script>
    @endif
@endsection