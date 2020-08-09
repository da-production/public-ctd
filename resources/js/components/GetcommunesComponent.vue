<template>

    <div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Wilaya</label>
            <div class="col-sm-10">
                <select  class="form-control select2 w-p100" id="" @change="wilaya_id($event)">
                    <option></option>
                    <option v-for="w in wilayas" :value="w.code"> {{ w.code }} - {{ w.wilaya }}</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Commune</label>
            <div class="col-sm-10">
                <select class="form-control select2 w-p100" name="code_commune" id="" @change="setCommune($event)">
                    <option value="">Selection</option>
                    <option v-for='c in communes'  :value="c.code" v-model="commune">{{ c.lib_commune }}</option>
                </select>
            </div>
        </div>
    </div>

</template>
<script>
export default {
    props:['wilayas'],
    data() {
        return {
            'communes':[],
            'commune':'',
        }
    },
    methods: {
        wilaya_id(event){
            if(event.target.value.length)
            {
                axios.get('/api/commune/bywilaya/' + event.target.value,{
                    wilaya_code: event.target.value
                })
                .then((response) => {
                    this.communes = [];
                    this.communes = response.data
                })
            }
            
        },
        setCommune(event) {
            this.commune = event.target.value;
        }
    },
}
</script>