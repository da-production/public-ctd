@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="box box-solid bg-dark">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper">
                        <div class="container-fluid">
                        <form action="{{ route('demande.list') }}" method="get" >
                            <x-searchdemande />
                        </form>
                    </div>
                        <table id="example"
                            class="table table-bordered table-hover display nowrap margin-top-10 w-p100 dataTable"
                            role="grid" aria-describedby="example_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending">#Identifiant</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending">Nom & Prénom</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Office: activate to sort column ascending">Date de naissance</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Office: activate to sort column ascending">Date de Demande</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Office: activate to sort column ascending">Date du traitement</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Start date: activate to sort column ascending">Etat</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Start date: activate to sort column ascending">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($demandes as $demande)
                                    <tr id='{{ $demande->id }}'>
                                        <td>{{ $demande->identifiant }}</td>
                                        <td>{{ $demande->nom }} {{ $demande->prenom }}</td>
                                        <td>{{ $demande->naissance }}</td>
                                        <td>{{ $demande->date_d }}</td>
                                        <td>{{ $demande->date_t }}</td>
                                        <td>
                                            @if ($demande->etat == 5)
                                                <span class="label label-warning">En attente</span>
                                            @endif
                                            @if ($demande->etat == 1)
                                                <span class="label label-success">Validée</span>
                                            @endif
                                            @if ($demande->etat == 2)
                                                <span class="label label-danger">Réfusée </span>
                                            @endif
                                            @if ($demande->etat == 3)
                                                <span class="label label-info">Clôturée</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-default" onclick='showDemande({{ $demande->id }} , "{{ $demande->nom }}")' data-toggle="modal" data-target="#showDemande">
                                                <i class="fa fa-fw fa-expand"></i> Afficher
                                            </button>
                                                <a href="{{ route('demande.show', ['prenom' =>$demande->prenom, 'nom' => $demande->nom ]) }}" target="_blank" class="btn btn-info">
                                                    <i class="fa fa-external-link"></i> Afficher
                                                </a>
                                            @if (Auth::user()->privilage == 1)
                                                <a href="{{ route('demande.modifier', ['identifiant' => $demande->identifiant, 'nom' => $demande->nom, 'prenom' => $demande->prenom ]) }}" class="btn btn-light">Editer</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="dataTables_info" id="example_info" role="status" aria-live="polite">
                            Affichage {{$demandes->currentPage()}} à {{$demandes->lastPage()}}
                            sur {{$demandes->total()}}
                        </div>
                        {{ $demandes->links('pagination::table') }}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal  fade bs-example-modal-lg" id="showDemande" tabindex="-1" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Demande</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-center">
            <span class="ouro ouro3">
                <span class="left"><span class="anim"></span></span>
                <span class="right"><span class="anim"></span></span>
            </span>
          </p>
        </div>
        <div class="modal-footer modal-footer-uniform">
          <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Ferme</button>
          
        </div>
      </div>
    </div>
  </div>
<!-- /.modal -->
@endsection

@section('script')
    <script>

    if($("#showDemande").length)
    {
        function showDemande(id,nom)
        {
            $("#showDemande .modal-title").text("Demande #" + id);
            axios.get("{{ url('api/demande/show/') }}/" + id + "/" + nom, {
                setid: id,
                nom: nom
            })
            .then((response) => {
                if(response.data.etat == 5)
                {
                    updateDemande(response.data);
                }else{
                    staticDemande(response.data);
                }
            })
            .catch(error => {
                console.log(error.response)
            });
        }
        function updateEtat()
        {
            console.log("Try to update");
        }
        function staticDemande(xdata)
        {
            if(xdata.etat === 1)
            {
                $('#showDemande .modal-header').removeClass().addClass('modal-header bg-success');
            }
            if(xdata.etat === 2)
            {
                $('#showDemande .modal-header').removeClass().addClass('modal-header bg-danger');
            }
            $demande = xdata.id;
                $container = "";
                $container += "<div class='row'>";
                    $container += "<div class='col-md-6'>";
                        $container +=  `<p><b>Numéro d'acte de naissance :</b> ${xdata.identifiant}</p>`;
                        $container +=  `<p><b>Nom : </b>${xdata.nom}</p>`;
                        $container +=  `<p><b>Prénom : </b>${xdata.prenom}</p>`;
                        $container +=  `<p><b>Date de naissance : </b>${xdata.naissance}</p>`;
                        $container +=  `<p><b>Prénom de père : </b>${xdata.father}</p>`;
                        $container +=  `<p><b>Nom et Prénom de la mêre : </b>${xdata.mother}</p>`;
                        $container +=  `<p><b>Commune : </b>${xdata.lib_commune}</p>`;
                        $container +=  `<p><b>wilaya : </b>${xdata.wilaya}</p>`;
                        $container +=  `<p><b>Act de naissance : </b>${xdata.etat_document == 2 ? 'No' : 'Oui'}</p>`;
                    $container += "</div>";
                    $container += "<div class='col-md-6'>";
                        $container +=  "<p><b>Agence : </b>"+xdata.agence+"</p>";
                        $container +=  "<p><b>Date d'envoi : </b>"+xdata.date_d+"</p>";
                        $container +=  "<p><b>Affaicter à : </b>"+xdata.affecter_to+"</p>";
                        $container +=  "<p><b>date de traitement : </b>"+xdata.date_t+"</p>";
                        $container +=  "<p><b>Motif : </b>"+ (xdata.remarque == null ? 'Aucune remarque' : xdata.remarque) +"</p>";
                    $container += "</div>";
                    
                $container += "</div>";
                $("#showDemande .modal-body").html($container);
                
        }

        function updateDemande(xdata)
        {
            var demande = xdata.demande_id;
                $container = "";
                $container += `<div class='row'>`;
                    $container += `<div class='col-md-6'>`;
                        $container +=  `<p><b>Numéro d'acte de naissance :</b> ${xdata.identifiant}</p>`;
                        $container +=  `<p><b>Nom : </b>${xdata.nom}</p>`;
                        $container +=  `<p><b>Prénom : </b>${xdata.prenom}</p>`;
                        $container +=  `<p><b>Date de naissance : </b>${xdata.naissance}</p>`;
                        $container +=  `<p><b>Prénom de père : </b>${xdata.father}</p>`;
                        $container +=  `<p><b>Nom et Prénom de la mêre : </b>${xdata.mother}</p>`;
                        $container +=  `<p><b>Commune : </b>${xdata.lib_commune}</p>`;
                        $container +=  `<p><b>wilaya : </b>${xdata.wilaya}</p>`;
                    $container += "</div>";
                    $container += "<div class='col-md-6'>";
                        $container +=  `<p><b>Envoyer par : </b>${xdata.sendby}</p>`;
                        $container +=  `<p><b>Agence : </b>${xdata.agence}</p>`;
                        $container +=  `<p><b>Date d'envoi : </b>${xdata.date_d}</p>`;
                        $container +=  `<p><b>Affaicter à : </b>${xdata.affecter_to}</p>`;
                        $container +=  `<p><b>date de traitement : </b>${xdata.date_t}</p>`;
                        $container +=  `<p><b>Motif : </b>${xdata.remarque == null ? 'Aucune remarque' : xdata.remarque}</p>`;
                    $container += "</div>";
                    
                $container += "</div>";
                $("#showDemande .modal-body").html($container);
                $('#showDemande .modal-header').removeClass().addClass('modal-header bg-warning');
                var action = `onclick='avis(${xdata.identifiant}, ${demande})'`;
                $form = '<div class="row">';
                    $form += `<div class="form-group col-md-12">`;
                        $form += `<label>Motif:</label>`;
                        $form += `<div class="input-group">`;
                        $form += `<textarea class="form-control" id="motif"></textarea>`;
                        $form += `</div>`;
                    $form += '</div>';
                    $form += '<div class="form-group col-md-12">';
                        $form += '<label>Acte de naissance:</label>';
                        $form += '<div class="input-group">';
                        $form += '<select class="form-control" id="etat" >';
                            $form += '<option value="">---</option>';
                            $form += '<option value="1">Oui</option>';
                            $form += '<option value="2">Non</option>';
                        $form += '</select>';
                        $form += '</div>';
                    $form += '</div>';
                    $form += '<div class="form-group col-md-12">';
                        $form += '<div class="input-group text-right">';
                        $form += `<a href='javascript:void(0)' class="btn btn-info" ${action} >Enregistrer</a>`;
                        $form += '</div>';
                    $form += '</div>';
                $form += '</div>';
                $("#showDemande .modal-body").append($form);
        }
        function avis(identifiant,id)
        {
            axios.post("/api/demande/avis/" + identifiant , {
                _method: 'PUT',
                id: id,
                identifiant: identifiant,
                motif: $('#motif').val(),
                etat: $('#etat').val()
            })
            .then((response) => {
                //alert(response.data);
                $('.modal').hide();
                $('.modal-backdrop.show').hide();
                $('body').css('overflow', 'auto');
                $("tr#" + id).addClass('was-changed');
                $("tr#" + id).delay('2000').fadeOut('slow');
                console.log($("tr#" + id));
            })
            .catch(error => {
                console.log(error.errors)
            });
        }
    }

    </script>
@endsection