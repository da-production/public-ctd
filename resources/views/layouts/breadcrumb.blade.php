<section class="content-header">
<h1>
    {{ isset($pagetitle) ? $pagetitle : 'Accueil'  }}
    <small></small>
</h1>
<ol class="breadcrumb">
    @yield('right-breadcrumb')
</ol>
</section>