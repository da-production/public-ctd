<template>
    <div>
        <div class="alert alert-success my-1">

        </div>

        <div class="box box-solid bg-black">
            <!-- /.box-header -->
            <div class="box-body">
                <form method="post" @submit.prevent='addUser'>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nom d'Utilisateur</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="user" type="text" v-model='user'>

                                    <div class="alert alert-danger my-1">{{ $message }}</div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nom</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="first_name" type="text" v-model="first_name">

                                    <div class="alert alert-danger my-1">{{ $message }}</div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Prénom</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="last_name" type="text" v-model="last_name">

                                    <div class="alert alert-danger my-1">{{ $message }}</div>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mot de passe</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="password" type="text" v-model="password">

                                    <div class="alert alert-danger my-1">{{ $message }}</div>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="email" type="text" v-model="email">

                                    <div class="alert alert-danger my-1">{{ $message }}</div>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Previlages</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2 w-p100" name="privilage" @change="privilage($event)">
                                        <option value="">previlages</option>
                                        <option v-for="p in previlages" :value="p.id" v-model="previlage">{{ p.libelle }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Agence</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2 w-p100" name="agences_id" @change="agences_id($event)">
                                        <option value="">Agence</option>
                                        <option v-for="a in agences" :value="a.id" v-model="agence_id">{{ a.name }}</option>
                                    </select>
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
        </div>
    </div>
</template>
<script>
export default {
    props: ['previlages','agences'],
    data() {
        return {
            "user":"",
            "first_name":"",
            "last_name":"",
            "password":"",
            "email":"",
            "previlage": "",
            "agence_id": "",
        }
    },
    methods: {
        addUser(){
            axios.post('/member/ajouter',{
                previlage: this.previlage,
                user: this.user,
                first_name: this.first_name,
                last_name: this.last_name,
                password: this.password,
                agence_id: this.agence_id,
            })
        },
        privilage(event){
            this.previlage = event.target.value;
        },
        agences_id(event){
            this.agence_id = event.target.value;
        }
    },
}
</script>