@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-8">
        <div class="box box-solid bg-dark">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper">
                        <div class="container-fluid">
                        <form action="" class="row">
                            @csrf
                            <div class="form-group col-md-2">
                                <div class="controls">
                                    <input type="text" name="first_name" placeholder="Nom" class="form-control"> 
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <div class="controls">
                                    <input type="text" name="last_name" placeholder="Prénom" class="form-control"> 
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <div class="controls">
                                    <input type="text" name="user" placeholder="Nom d'Utilisateur" class="form-control" > 
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control select2 w-p100" name="wilaya_id">
                                    <option value="">Wilaya</option>
                                  @foreach ($wilayas as $wilaya)
                                      <option value="{{ $wilaya->code }}">{{ $wilaya->wilaya }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-1">
                                <h5 class="mt-2"><span class="text-danger"></span></h5>
                                <button type="submit" class="btn btn-info">Rechercher</button>
                            </div>
                        </form>
                    </div>
                        <table id="example"
                            class="table table-bordered table-hover display nowrap margin-top-10 w-p100 dataTable"
                            role="grid" aria-describedby="example_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending">#ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending">Nom & Prénom</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Office: activate to sort column ascending">Utilisateur</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"aria-label="Age: activate to sort column ascending">
                                        Agence</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"aria-label="Age: activate to sort column ascending">
                                        Poste</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Start date: activate to sort column ascending">Etat</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Start date: activate to sort column ascending">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr id="id-{{ $user->id }}">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                        <td>{{ $user->user }}</td>
                                        <td>{{ !is_null($user->agence) ? $user->agence->name : '' }}</td>
                                        <td>{{ $user->role->libelle }}</td>
                                        <td>
                                            @if ($user->etat == 1)
                                                <button type="button" class="btn btn-success" onclick='showuserstat({{$user->id}},"{{$user->user }}", {{$user->etat}})' id="userstat" data-toggle="modal" data-status="{{$user->etat}}" data-target="#showuserstat">
                                                    <i class="fa fa-fw fa-expand"></i> Activé
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-warning" onclick='showuserstat({{$user->id}},"{{$user->user }}", {{$user->etat}})' id="userstat" data-toggle="modal" data-status="{{$user->etat}}"data-target="#showuserstat">
                                                    <i class="fa fa-fw fa-expand"></i> Désactivé
                                                </button>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-info">Afficher</a>
                                            @if (Auth::user()->privilage == 1)
                                                <a href="" class="btn btn-light">Editer</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="dataTables_info" id="example_info" role="status" aria-live="polite">
                            Affichage {{$users->currentPage()}} à {{$users->lastPage()}}
                            sur {{$users->total()}}
                        </div>
                        {{ $users->links('pagination::table') }}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-md-4" id="addUser">
        <adduser-component :previlages="{{ $previlages }}" :agences="{{ $agences }}"></adduser-component>
    </div>
</div>

<!-- Modal -->
<div class="modal center-modal fade bs-example-modal-lg" id="showuserstat" tabindex="-1" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Utilisateur</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
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
        
        function showuserstat(id,username,etat)
        {
            
            var enable = `onclick="enable(${id},'${username}')"`;
            var disable = `onclick="disable(${id},'${username}')"`;
            $("#showuserstat .modal-title").text("Utilisateur : " + username);
            axios.get("/api/users/show/" + id + "/" + username, {
                id: id,
                username: username
            })
            .then((response) => {
                var template = "";
                if(etat === 1){
                    template += `<button type="button" class="btn btn-warning" ${disable}> Désactiver</button>`;
                }else{
                    template += `<button type="button" class="btn btn-success" ${enable}> Activer</button> &nbsp; &nbsp; `;
                }
                $("#showuserstat .modal-body").html(template);
            })
            .catch(error => {
                console.log(error.response)
            });

        }

        function enable(id,username)
        {
            axios.post("/api/users/changestat/" + id + "/" + username, {
                _method: 'PUT',
                id: id,
                username: username,
                stat: 1
            })
            .then((response) => {
                //alert(response.data);
                //location.reload();
                $("#id-" + id).addClass('was-changed');
                $("#id-" + id + " button").text("Active").removeClass("btn-warning").addClass('btn-success');
            })
            .catch(error => {
                console.log(error.response)
            });
        }
        function disable(id,username)
        {
            axios.post("/api/users/changestat/" + id + "/" + username, {
                _method: 'PUT',
                id: id,
                username: username,
                stat: 0
            })
            .then((response) => {
                //alert(response.data);
                //location.reload(); 
                $("#id-" + id).addClass('was-changed');
                $("#id-" + id + " button").text("Désactive").removeClass("btn-success").addClass('btn-warning');
            })
            .catch(error => {
                console.log(error.response)
            });
        }

    </script>
@endsection