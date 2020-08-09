<div>
    <!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="ulogo">
                <a href="index.html">
                <!-- logo for regular state and mobile devices -->
                <span><b>CTD</b></span>
            </a>
        </div>
        <div class="image">
            <img src="{{ asset('images/avatar/user.svg') }}" class="rounded-circle" alt="User Image">
        </div>
        <div class="info">
            <p>{{ Auth::user()->user }}</p>
            <a class="link" data-toggle="tooltip" title="" data-original-title="Paramètres"><i class="ion ion-gear-b"></i></a>
            <a class="link" data-toggle="tooltip" title="" data-original-title="{{ Auth::user()->email }}"><i class="ion ion-android-mail"></i></a>
            <a class="link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" 
                data-toggle="tooltip" title="" 
                data-original-title="Déconnecter">
                <i class="ion ion-power"></i>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </a>
    
        </div>
        </div>
        <!-- sidebar menu -->
        <ul class="sidebar-menu" data-widget="tree">
        <li class="active">
            <a href="{{ url('/') }}"><i class="icon-home"></i> <span>Tablea de bord</span></a>
        </li>
        <li class="header nav-small-cap">Gestion des Demandes</li>
        <li class="treeview {{ (request()->segment(1) == 'demande') ? 'menu-open' : '' }}">
            <a href="javascript:void(0)">
            <i class="icon-wallet"></i>
            <span>Demandes</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu " style="{{ (request()->segment(1) == 'demande') ? 'display:block' : '' }}">
            @if (in_array(Auth::user()->privilage,App\Role::action('r')['demande']))
                <li><a href="{{ route('demande.list') }}">Boite de réception</a></li>
            @endif

            @if (in_array(Auth::user()->privilage,App\Role::action('c')['demande']))
                <li><a href="{{ route('demande.ajouter') }}">Ajouter une demande</a></li>
            @endif
            </ul>
        </li>
        @if (Auth::user()->privilage == 1 || Auth::user()->privilage == 2)
        <li class="header nav-small-cap">Gestion de l'application</li>
        <li class="treeview">
            <a href="#">
            <i class="icon-equalizer"></i>
            <span>Administration</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('users.list') }}">Gestion des Utilisateurs</a></li>
                <li><a href="{{ route('wilaya.list') }}">Gestion des Wilayas</a></li>
                <li><a href="javascript:void(0)">Gestion des Communes</a></li>
                <li><a href="javascript:void(0)">Gestion des Agences</a></li>
                <li><a href="{{ route('previlage.list') }}">Gestion des Previlages</a></li>
            </ul>
        </li>      
        @endif
        </ul>
    </section>
    </aside>
    
</div>