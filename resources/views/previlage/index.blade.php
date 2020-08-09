@extends('layouts.master')

@section('right-breadcrumb')
    <button class="btn btn-sm" data-toggle="modal" data-target="#addPrevilage">Add</button>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="box box-solid bg-dark">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
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
                                        aria-label="Office: activate to sort column ascending">Permissions</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Start date: activate to sort column ascending">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{ dd($previlage->hasPermissions) }}
                                </tr>
                                {{-- @foreach ($previlages as $previlage)
                                    <tr id='{{ $previlage->id }}'>
                                        <td>{{ $previlage->id }}</td>
                                        <td>{{ $previlage->libelle }}</td>
                                        <td>
                                            <ul>
                                                <li>Creer un utilsateur(*)</li>
                                                <li>Modifier tous les utilsateurs</li>
                                                <li>Creer un utilsateur dans sans agence</li>
                                                <li>Modifier un utilsateur dans sans agence</li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade " id="addPrevilage" tabindex="-1" >
    <form action="">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Nouveau Previlage</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-center">
            {{-- <span class="ouro ouro3">
                <span class="left"><span class="anim"></span></span>
                <span class="right"><span class="anim"></span></span>
            </span> --}}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Previlage</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="previlage" type="text" value="{{ old('previlage') }}">
                        @error('previlage')
                        <div class="alert alert-danger my-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Attribuer des Permissions</label>
                    <div class="demo-radio-button col-sm-10">
                        <input name="permissions" type="radio" class="with-gap" id="per_1" value="1" checked />
                        <label for="per_1">Tous les Permissions</label>
                        <input name="permissions" type="radio" class="with-gap" id="per_2" value="2" />
                        <label for="per_2">selectioner des Permissions</label>
                    </div>
                </div>
                <div class="permissions">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Les Demandes</label>
                        <div class="demo-radio-button col-sm-10">
                            <input name="id_document" type="checkbox" class="with-gap" id="radio_1" value="1" checked />
                            <label for="radio_1">Traiter tous </label>
                            <input name="id_document" type="checkbox" class="with-gap" id="radio_2" value="2" />
                            <label for="radio_2">Traiter les affecter </label>
                            <input name="id_document" type="checkbox" class="with-gap" id="radio_3" value="3" />
                            <label for="radio_3">Voir tous</label>
                            <input name="id_document" type="checkbox" class="with-gap" id="radio_3" value="3" />
                            <label for="radio_3">Voir les affecter</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Les Utilisateur</label>
                        <div class="demo-radio-button col-sm-10">
                            <input name="id_document" type="checkbox" class="with-gap" id="radio_1" value="1" checked />
                            <label for="radio_1">Ajouter</label>
                            <input name="id_document" type="checkbox" class="with-gap" id="radio_2" value="2" />
                            <label for="radio_2">Ajouter par agence </label>
                            <input name="id_document" type="checkbox" class="with-gap" id="radio_3" value="3" />
                            <label for="radio_3">Modifer par agence</label>
                            <input name="id_document" type="checkbox" class="with-gap" id="radio_3" value="3" />
                            <label for="radio_3">Modifier tous</label>
                            <input name="id_document" type="checkbox" class="with-gap" id="radio_3" value="3" />
                            <label for="radio_3">Desactiver</label>
                        </div>
                    </div>
                </div>
          </p>
        </div>
        <div class="modal-footer modal-footer-uniform">
          <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Ferme</button>
          <button type="submit" class="btn btn-bold btn-pure btn-info float-right">Ajouter</button>
        </div>
      </div>
    </div>
    </form>
  </div>
<!-- /.modal -->
@endsection

@section('scripts')
    {{-- <script>
        var permissions = $('input[name="permissions"]');
        var permissionsContainer = $('.permissions');
        if(permissions.val() == 1){
            permissionsContainer.hide();
        }
        $('#pre_1').on('change', function(){
            console.log($(this));
            if($(this).attr('checked')){
                permissionsContainer.show();
            }
        });
    </script> --}}
@endsection