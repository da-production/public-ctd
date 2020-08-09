@extends('layouts.master')

@section('content')

<!-- Main content -->
<section class="content">
    
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h2 class="page-header">
                Demande #{{ $demande->identifiant }}
                @if (!is_null($demande->etat_document))
                    <small class="text-{{ $demande->etat_document == 1 ? 'success' : 'danger text-bold' }} pull-right"> <i class="mdi mdi-{{ $demande->etat_document == 1 ? 'check' : 'window-close' }} "></i> Act de {{ $demande->document }}</small>
                @endif
            </h2>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row ">
        <div class="col-md-6">
            <p><b>Numéro d'acte de naissance : </b>{{ $demande->identifiant }}</p>
            <p><b>Nom : </b>{{ $demande->nom }}</p>
            <p><b>Prénom : </b>{{ $demande->prenom }}</p>
            <p><b>Date de naissance : </b>{{ $demande->naissance }}</p>
            <p><b>Prénom de père : </b>{{ $demande->father }}</p>
            <p><b>Nom et Prénom de la mêre : </b>{{ $demande->mother }}</p>
            <p><b>Commune : </b> {{ $demande->lib_commune }}</p>
            <p><b>wilaya : </b>{{ $demande->wilaya }}</p>
        </div>
        <div class="col-md-6">
            <p><b>Envoyer par : </b>{{ App\User::where('id',$demande->send_by)->first()->user }}</p>
            <p><b>Agence : </b>{{ $demande->agence }}</p>
            <p><b>Date d'envoi : </b>{{ $demande->date_d }}</p>
            <p><b>Affaicter à : </b>{{ $demande->user }}</p>
            <p><b>date de traitement : </b>{{ $demande->date_t }}</p>
            <p><b>Motif : </b>{{ $demande->remarque }}</p>
        </div>
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="no-print">
        <form action="{{ route('demande.update', ['nom'=> $demande->nom]) }}" class="row" method="post">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <div class="form-group col-md-12">
                    <div class="row">
                        <input type="text" name="etat" placeholder="Motif" class="form-control col-md-7 mr-1">
                    <select class="form-control select2 w-p100 col-md-4 " name="etat">
                        <option value="">Etat de document</option>
                        <option value="1">Oui</option>
                        <option value="2">Non</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button id="print" class="btn btn-warning" type="button"> <span><i class="fa fa-print"></i> Imprimer</span>
                </button>
                <button type="submit" class="btn btn-success pull-right"><i class="mdi mdi-tooltip-edit"></i> Modifier
                </button>
                <button type="burron" class="btn btn-danger pull-right" style="margin-right: 5px;">
                    <i class="fa fa-download"></i> Generate PDF
                </button>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection
