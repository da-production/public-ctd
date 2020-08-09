<div id="example_wrapper" class="dataTables_wrapper">
    <div class="container-fluid">
    <form  action="{{ route('users.list') }}" method="get" class="row">
        <div class="form-group col-md-2">
            <div class="controls">
                <input type="text" name="first_name" placeholder="Nom" class="form-control  my-1 {{ app('request')->input('first_name') !== null ? 'is-valid is-field' : '' }}" value="{{ app('request')->input('first_name') !== null ? app('request')->input('first_name') : '' }}"> 
            </div>
        </div>
        <div class="form-group col-md-2">
            <div class="controls">
                <input type="text" name="last_name" placeholder="Prénom" class="form-control  my-1 {{ app('request')->input('last_name') !== null ? 'is-valid is-field' : '' }}" value="{{ app('request')->input('last_name') !== null ? app('request')->input('last_name') : '' }}"> 
            </div>
        </div>
        <div class="form-group col-md-2">
            <div class="controls">
                <input type="text" name="user" placeholder="Nom d'Utilisateur" class="form-control  my-1 {{ app('request')->input('user') !== null ? 'is-valid is-field' : '' }}" value="{{ app('request')->input('user') !== null ? app('request')->input('user') : '' }}"> 
            </div>
        </div>
        <div class="form-group col-md-2">
            <select class="form-control select2 w-p100  my-1 {{ app('request')->input('privilage') !== null ? 'is-valid is-field' : '' }}" name="privilage">
                @if (app('request')->input('privilage') != null)
                    @foreach ($previlages as $previlage)
                        @if ($previlage->id == app('request')->input('privilage'))
                        <option value="{{ $previlage->id }}">{{ $previlage->libelle }}</option>
                        @endif
                    @endforeach
                @else
                    <option value="">Privilage </option>
                @endif
                @if (app('request')->input('privilage') != null)
                    @foreach ($previlages as $previlage)
                        @if ($previlage->id != app('request')->input('privilage'))
                            <option value="{{ $previlage->id }}">{{ $previlage->libelle }}</option>
                        @endif
                    @endforeach
                @else
                    @foreach ($previlages as $previlage)
                        <option value="{{ $previlage->id }}">{{ $previlage->libelle }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group col-md-2">
            <select class="form-control select2 w-p100  my-1 {{ app('request')->input('agences_id') !== null ? 'is-valid is-field' : '' }}" name="agences_id">
                <option value="">Agence</option>
                @foreach ($agences as $agence)
                    <option value="{{ $agence->id }}">{{ $agence->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-1">
            <h5 class="mt-2"><span class="text-danger"></span></h5>
            <button type="submit" class="btn btn-info">Rechercher</button>
        </div>
        <div class="form-group col-md-1">
            <h5 class="mt-2"><span class="text-danger"></span></h5>
            <a href='{{ route('users.list') }}' type="submit" class="btn btn-light">Annuler</a>
        </div>
    </form>
</div>