@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/switcher.css') }}">
    <style>
        .p-r{
            position: relative;
        }
        .p-a{
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 11;
        }
        .display-none{
            display: none;
            background-color: rgba(255,255,25,.3);
        }
        .display-none > div{
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .ouro {
            position: relative;
            display:inline-block;
            height: 46px;
            width: 46px;
            margin: 1em;
            border-radius: 50%;  
            background: none repeat scroll 0 0 #DDDDDD;
            overflow:hidden;
            box-shadow: 0 0 10px rgba(0,0,0,.1) inset, 0 0 25px rgba(0,0,255,0.075);
        }

.ouro:after {
    content: "";
    position: absolute;
    top: 9px; left: 9px;
    display: block;
    height: 28px; width: 28px;
    background: none repeat scroll 0 0 #F2F2F2;
    border-radius: 50%;
    box-shadow: 0 0 10px rgba(0,0,0,.1);
}
.ouro > span {
    position: absolute;
    height: 100%; width: 50%;
    overflow: hidden;
}
.left  { left:0   }
.right { left:50% }

.anim {
    position: absolute;
    left: 100%; top: 0;
    height: 100%; width: 100%;
    border-radius: 999px;
    background: none repeat scroll 0 0 #508EC3;
    opacity: 0.8;
    -webkit-animation: ui-spinner-rotate-left 3s infinite;
    animation: ui-spinner-rotate-left 3s infinite;
    -webkit-transform-origin: 0 50% 0;
    transform-origin: 0 50% 0;
}
.left .anim {
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
}
.right .anim {
    border-bottom-right-radius: 0;
    border-top-right-radius: 0;
    left: -100%;
    -webkit-transform-origin: 100% 50% 0;
    transform-origin: 100% 50% 0;
}

/* v2 */
.ouro2 .anim {
   -webkit-animation-delay:0;
   animation-delay:0;
}
.ouro2 .right .anim{
   -webkit-animation-delay: 1.5s;
   animation-delay: 1.5s;
}

/* v3 */
.ouro3 .anim {
   -webkit-animation-delay: 0s;
   -webkit-animation-duration:3s;
   -webkit-animation-timing-function: linear;
   animation-delay: 0s;
   animation-duration:3s;
   animation-timing-function: linear;
}
.ouro3 .right .anim{
   -webkit-animation-name: ui-spinner-rotate-right;
   -webkit-animation-delay:0;
   -webkit-animation-delay: 1.5s;
   animation-name: ui-spinner-rotate-right;
   animation-delay:0;
   animation-delay: 1.5s;
}

/* round variation */
.round .ouro:after {display:none }

/* double variation */
.double .ouro:after {
  height: 13px; width: 13px;
  left: 7px; top: 7px;
  border: 10px solid #ddd;
  background: transparent;
  box-shadow: none;
}

@keyframes ui-spinner-rotate-right{
  0%{transform:rotate(0deg)}
  25%{transform:rotate(180deg)}
  50%{transform:rotate(180deg)}
  75%{transform:rotate(360deg)}
  100%{transform:rotate(360deg)}
}
@keyframes ui-spinner-rotate-left{
  0%{transform:rotate(0deg)}
  25%{transform:rotate(0deg)}
  50%{transform:rotate(180deg)}
  75%{transform:rotate(180deg)}
  100%{transform:rotate(360deg)}
}

@-webkit-keyframes ui-spinner-rotate-right{
  0%{-webkit-transform:rotate(0deg)}
  25%{-webkit-transform:rotate(180deg)}
  50%{-webkit-transform:rotate(180deg)}
  75%{-webkit-transform:rotate(360deg)}
  100%{-webkit-transform:rotate(360deg)}
}
@-webkit-keyframes ui-spinner-rotate-left{
  0%{-webkit-transform:rotate(0deg)}
  25%{-webkit-transform:rotate(0deg)}
  50%{-webkit-transform:rotate(180deg)}
  75%{-webkit-transform:rotate(180deg)}
  100%{-webkit-transform:rotate(360deg)}
}
    </style>
@endsection


@section('content')
<div class="row">
    <div class="col-12">
        <div class="box box-solid bg-dark">
            <!-- /.box-header -->
            <div class="box-body p-r">
                
                <div class="table-responsive">
                    
                    <x-search-user-component />
                    
                        <table id="example"
                            class="table table-bordered table-hover display nowrap margin-top-10 w-p100 dataTable"
                            role="grid" aria-describedby="example_info">
                            <div class="p-a display-none">
                                <div>
                                    <p class="circle">
                                        <span class="ouro">
                                            <span class="left"><span class="anim"></span></span>
                                            <span class="right"><span class="anim"></span></span>
                                        </span>
                                    </p>
                                </div>
                            </div>
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
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input user-{{ $user->id }}" type="checkbox" id="userstat" value="{{$user->etat}}" {{ $user->etat == 1 ? 'checked="checked"' : '' }} onclick='showuserstat({{$user->id}},"{{$user->user }}")' >
                                            </div>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-info">Afficher</a>
                                            @if (Auth::user()->privilage == 1)
                                                <a href="{{ route('users.edit',['user' => $user->user , 'id'=> $user->id ]) }}" class="btn btn-light">Editer</a>
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
    {{-- <div class="col-md-4" id="addUser">
        <adduser-component :previlages="{{ $previlages }}" :agences="{{ $agences }}"></adduser-component>
    </div> --}}
</div>

<x-add-user-component />
@endsection

@section('script')
<script src="{{ asset('js/jquery.switcher.js') }}"></script>
    <script>

        $(function(){
            $.switcher('input#userstat');
        });
        
        function showuserstat(id,username)
        {
            var etat = $(`.user-${id}`).val();
            if(etat == 1){
                Swal.fire({
                    title: `Voulez vous desactiver ${username}`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui '
                    }).then((result) => {
                    if (result.value) {
                        $('.display-none').fadeIn();
                        etat = 0;
                        axios.post("/api/users/changestat/" + id + "/" + username, {
                            _method: 'PUT',
                            id: id,
                            username: username,
                            stat: etat,
                            
                        })
                        .then((response) => {
                            $(`.user-${id}`).attr('value', etat);
                            Swal.fire(
                            'Désactiver !',
                            `l'Utilisateur ${username} a ete désactiver `,
                            'success'
                            );
                            $('.display-none').fadeOut();
                        })
                        .catch(error => {
                            console.log(error.response)
                        });
                        $(`.user-${id}`).parent().find('.ui-switcher').attr('aria-checked', false);
                    }else{
                        $(`.user-${id}`).parent().find('.ui-switcher').attr('aria-checked', true);
                    }
                });
            }else{
                Swal.fire({
                    title: `Voulez vous Activer ${username}`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui '
                    }).then((result) => {
                    if (result.value) {
                        $('.display-none').show();
                        etat = 1;
                        Swal.fire(
                        'Activer!',
                        `l'Utilisateur ${username} a ete activer`,
                        'success'
                        );
                        axios.post("/api/users/changestat/" + id + "/" + username, {
                            _method: 'PUT',
                            id: id,
                            username: username,
                            stat: etat
                        })
                        .then((response) => {
                            $(`.user-${id}`).attr('value', etat);
                            $('.display-none').fadeOut();
                        })
                        .catch(error => {
                            console.log(error.response)
                        });
                        $(`.user-${id}`).parent().find('.ui-switcher').attr('aria-checked', true);
                    }else{
                        $(`.user-${id}`).parent().find('.ui-switcher').attr('aria-checked', false);
                    }
                });
            }

        }

    </script>
@endsection
