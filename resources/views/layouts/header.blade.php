<header class="main-header">
    <!-- Logo -->
    <a href="index.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <b class="logo-mini">
            <span class="light-logo"><img src="" alt="logo"></span>
            <span class="dark-logo"><img src="" alt="logo"></span>
        </b>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            <img src="" alt="logo" class="light-logo">
            <img src="" alt="logo" class="dark-logo">
        </span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                    <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <i class="mdi mdi-bell{{ auth()->user()->unreadNotifications->isEmpty() ? '' : '-ring' }}"></i>
                    </a>
                    <ul class="dropdown-menu scale-up">
                      <li class="header">Vous avez {{ auth()->user()->unreadNotifications->count() }} notifications</li>
                      @foreach (auth()->user()->unreadNotifications as $notification)
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px; ">
                                <ul class="menu inner-content-div" style="overflow: hidden; width: auto; height: 200px;max-height: calc(73px * 3);">
                                    <li>
                                        <a href="{{ route('demande.notification',['identifiant' => $notification->data['identifiant'],'id' => $notification->data['demande_id'], 'notification' => $notification->id]) }}">
                                            <p><i class="mdi mdi-tag-plus text-info"></i> Nouvelle demande <b>#{{ $notification->data['identifiant'] }}</b></p>
                                            <small class="sidetitle">Envoyer par: <b>{{ $notification->data['user_name'] }}</b></small>
                                        </a>
                                    </li>
                                </ul>
                                <div class="slimScrollBar" style="background: rgb(0, 0, 0) none repeat scroll 0% 0%; width: 7px; position: absolute; top: 58px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 140.845px;"></div>
                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div>
                            </div>
                        </li>
                      @endforeach
                      <li class="footer"><a href="{{ route('demande.notifications') }}">Voir Tous</a></li>
                    </ul>
                  </li>
                {{-- <li class="dropdown user user-menu">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('images/user5-128x128.jpg') }}" class="user-image rounded-circle" alt="User Image">
                    </a>
                    <ul class="dropdown-menu scale-up">
                        <li class="user-header">
                            <img src="{{ asset('images/user5-128x128.jpg') }}" class="float-left rounded-circle" alt="User Image">

                            <p>
                                {{ Auth::user()->user }}
                                <small class="mb-5">{{ Auth::user()->email }}</small>
                                <a href="{{ route('users.profile') }}" class="btn btn-danger btn-sm btn-rounded">Profile</a>
                            </p>
                        </li>
                        <li class="user-body">
                            <div class="row no-gutters">
                                <div class="col-12 text-left">
                                    <a href="javascirpt:void(0)"><i class="ion ion-settings"></i>Paramètres</a>
                                </div>
                                <div role="separator" class="divider col-12"></div>
                                <div class="col-12 text-left">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" ><i class="fa fa-power-off"></i> Déconnecter</a>
                                </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </nav>
</header>
