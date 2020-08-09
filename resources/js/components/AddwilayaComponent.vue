<template>
    <div>
        <div class="alert alert-success my-1">

        </div>

        <div class="box box-solid bg-black">
            <!-- /.box-header -->
            <div class="box-body">
                <form method="post" @submit.prevent='addWilaya'>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Wilaya</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="wilaya" type="text" v-model='wilaya'>

                                    <div class="alert alert-danger my-1">{{ $message }}</div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Code</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="code" type="text" v-model="code">

                                    <div class="alert alert-danger my-1">{{ $message }}</div>

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
    mounted() {
        console.log("wilaya component");
    },
    data() {
        return {
            'code': '',
            'wilaya': '',
        }
    },
    methods: {
        addWilaya() {
            axios.post('/wilaya/ajouter', {
                code: this.code,
                wilaya: this.wilaya,
            })
        }
    },
}
</script>