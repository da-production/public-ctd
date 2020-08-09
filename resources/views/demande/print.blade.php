@extends('layouts.print')

@section('content')

<!-- Main content -->
<section class="content" style="height:100vh;">
    
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h2 class="page-header">
                Demande #{{ $demande->id }}
                <span class="pull-right">
                    <?php
                        echo DNS1D::getBarcodeHTML($demande->prenom . " " . $demande->nom, "PHARMA2T");
                    ?>
                </span>
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
        <div class="col-md-12">
            <h1>
                @if (!is_null($demande->etat_document))
                    <small class="text-{{ $demande->etat_document == 1 ? 'success' : 'danger text-bold' }} pull-center"> <i class="mdi mdi-{{ $demande->etat_document == 1 ? 'check' : 'window-close' }} "></i> Act de {{ $demande->document }}</small>
                @endif
            </h1>
        </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
@endsection
