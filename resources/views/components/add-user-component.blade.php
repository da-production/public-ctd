@section('right-breadcrumb')
<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#newuser">
    Ajouter <i class="fa fa-plus"></i>
</button>
@endsection
<!-- Modal -->
<div class="modal center-modal fade bs-example-modal-lg" id="newuser" tabindex="-1" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Utilisateur</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
            <form method="post" id="form">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom d'Utilisateur</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="user" id="user" type="text" >

                                <div class="alert alert-danger my-1"></div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="first_name" id="first_name" type="text" v-model="first_name">

                                <div class="alert alert-danger my-1"></div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Prénom</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="last_name" id="last_name" type="text" v-model="last_name">

                                <div class="alert alert-danger my-1"></div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Mot de passe</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="password" id="password" type="text">

                                <div class="alert alert-danger my-1"></div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="email" id="email" type="text"">

                                <div class="alert alert-danger my-1"></div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Previlages</label>
                            <div class="col-sm-10">
                                <select class="form-control select2 w-p100" name="previlage" id="previlage" >
                                    <option value="">previlages</option>
                                    @foreach ($previlages as $previlage)
                                        <option value="{{ $previlage->id }}">{{ $previlage->libelle }}</option>
                                    @endforeach
                                </select>
                                <div class="alert alert-danger my-1"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Agence</label>
                            <div class="col-sm-10">
                                <select class="form-control select2 w-p100" name="agence_id" id="agence_id">
                                    <option value="">Agence</option>
                                    @foreach ($agences as $agence)
                                        <option value="{{ $agence->id }}">{{ $agence->name }}</option>
                                    @endforeach
                                </select>
                                <div class="alert alert-danger my-1"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-info">Ajouter</button>
                                <input type="reset" class="btn btn-warning" value="Vider les champs">
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer modal-footer-uniform">
          <button type="button" class="btn btn-bold btn-pure btn-danger" data-dismiss="modal">Ferme</button>
          
        </div>
      </div>
    </div>
  </div>
<!-- /.modal -->

@section('scripts')
    <script>
        $(function(){
            $('.alert-danger').hide();
            $('input').on('keyup', function(){
                if($(this).val() != ""){
                    $(this).siblings().hide();
                }
            });
            $('select').on('change', function(){
                if($(this).val() != ""){
                    $(this).siblings().hide();
                }
            });
            $('#form').submit(function(e){
                e.preventDefault();
                var inputs = (e.target.length - 2);
                var datas = {};
                for( var i = 0; i <= inputs; i++){
                    var name = e.target[i].name;
                    datas[name] = e.target[i].value;
                }
                axios.post("/api/users/ajouter/", {
                    //datas
                    previlage: $('#previlage').val(),
                    agence_id: $('#agence_id').val(),
                    user: $('#user').val(),
                    first_name: $('#first_name').val(),
                    last_name: $('#last_name').val(),
                    email: $('#email').val(),
                    password: $('#password').val(),
                })
                .then((response) => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error.response.data.errors)
                    var errors = error.response.data.errors;
                    $.each(errors,function(k,v){
                        $(`#${k}`).siblings().fadeIn();
                        $(`#${k}`).siblings().text(v);
                    });
                });
            });
        });
    </script>
@endsection
