<div class="row">
    <div class="form-group col-md-1">
        <div class="controls">
            <input type="text" name="identifiant" placeholder="Identifiant" value="{{ app('request')->input('identifiant') !== null ? app('request')->input('identifiant') : ''  }}" class="form-control {{ app('request')->input('identifiant') !== null ? 'is-valid is-field' : '' }}"> 
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="controls">
            <input type="text" name="nom" placeholder="Nom" value="{{ app('request')->input('nom') !== null ? app('request')->input('nom') : ''  }}" class="form-control {{ app('request')->input('nom') !== null ? 'is-valid is-field' : '' }}"> 
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="controls">
            <input type="text" name="prenom" placeholder="Prénom" value="{{ app('request')->input('prenom') !== null ? app('request')->input('prenom') : ''  }}" class="form-control {{ app('request')->input('prenom') !== null ? 'is-valid is-field' : '' }}"> 
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="controls">
            <input type="text" name="lib_commune" placeholder="Commune" value="{{ app('request')->input('lib_commune') !== null ? app('request')->input('lib_commune') : ''  }}" class="form-control {{ app('request')->input('lib_commune') !== null ? 'is-valid is-field' : '' }}" > 
        </div>
    </div>
    <div class="form-group col-md-2">
        <select class="form-control select2 w-p100 {{ app('request')->input('etat') !== null ? 'is-valid is-field' : '' }}" name="etat">
            @if (app('request')->input('etat') == null)
                <option value="">Etat de document</option>
            @else
                <option value="{{ app('request')->input('etat') }}">{{ $etats[app('request')->input('etat')] }}</option>
            @endif
            @foreach ($etats as $key => $val)
                @if (app('request')->input('etat') !== null)
                    @if (app('request')->input('etat') !== $key)
                        <option value="{{ $key }}">{{ $val }}</option>
                    @endif
                @else
                    <option value="{{ $key }}">{{ $val }}</option>
                @endif
            @endforeach
            
        </select>
    </div>
    @if ($isAllow)
        <div class="form-group col-md-2">
            <select class="form-control select2 w-p100" {{ app('request')->input('wilaya_code') !== null ? 'is-valid is-field' : '' }} name="wilaya_code">
                <option value="">Wilaya</option>
                
                @foreach ($wilayas as $wilaya)
                    @if (app('request')->input('wilaya_code') !== null && app('request')->input('wilaya_code') === $wilaya->code )
                        <option selected value="{{  app('request')->input('wilaya_code') }}">{{ $wilaya->wilaya }}</option>
                    @endif
                    <option value="{{ $wilaya->code }}">{{ $wilaya->wilaya }}</option>
                @endforeach
            </select>
        </div>
    @endif
    
    <div class="form-group col-md-1">
        <select class="form-control select2 w-p100 {{ app('request')->input('limit') !== null ? 'is-valid is-field' : '' }}" name="limit">
            <option value="">Nombre de lignes</option>
            @if (app('request')->input('limit') !== null)
                <option selected value="{{  app('request')->input('limit') }}">{{  app('request')->input('limit') }}</option>
            @endif
            @foreach ($limits as $limit)
                <option value="{{ $limit }}">{{ $limit }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-1">
        <h5 class="mt-2"><span class="text-danger"></span></h5>
        <button type="submit" class="btn btn-info">Rechercher</button>
    </div>
    <div class="form-group col-md-1">
        <h5 class="mt-2"><span class="text-danger"></span></h5>
        <a href="{{ route('demande.list') }}" type="submit" class="btn btn-default">Annuler</a>
    </div>
</div>