<template>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Destinos
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="input-group">
                          <input type="text" v-model="buscar" class="form-control" placeholder="Texto a buscar" @keyup.enter="listarDirectorios(1,buscar)">
                          <button type="submit" @click="listarDirectorios(1,buscar)" class="btn btn-dark"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </div>

                <div class="card" v-for="destinatary in arrayDirectorio " :key="destinatary.id">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <dl class="row">
                                    <dt class="col-4">Email</dt>
                                    <dd class="col-8" v-text="destinatary.mail"></dd>
                                    <dt class="col-4">Empresa</dt>
                                    <dd class="col-8" v-text="destinatary.company"></dd>
                                    <dt class="col-4">Nombre</dt>
                                    <dd class="col-8" v-text="destinatary.name"></dd>
                                    <dt class="col-4"> Teléfono</dt>
                                    <dd class="col-8" v-text="destinatary.phone"></dd>
                                    <dt class="col-4">Móvil</dt>

                                </dl>

                            </div>
                            <div class="col-6">
                                <dl class="row">
                                    <dt class="col-4">CP</dt>
                                    <dd class="col-8" v-text="destinatary.zip_code"></dd>
                                    <dt class="col-4">Dirección</dt>
                                    <dd class="col-8">{{destinatary.address}} {{destinatary.number_out}} {{destinatary.district}}</dd>
                                    <dt class="col-4">Ciudad</dt>
                                    <dd class="col-8" v-text="destinatary.city"></dd>
                                    <dt class="col-4">Estado</dt>
                                    <dd class="col-8" v-text="destinatary.state"></dd>
                                </dl>

                                <!--<a :href="'/customer/shipment/select-destinatary/'+destinatary.id+'/'" class="btn btn-dark"><i class="fa fa-plus"></i> Seleccionar</a>
                                -->
                            </div>
                        </div>

                    </div>
                </div>

                <nav>
                    <ul class="pagination">
                        <li class="page-item" v-if="pagination.current_page > 1">
                            <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page-1,buscar)">Ant</a>
                        </li>

                        <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page==isActived ? 'active':'']">
                            <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar)" v-text="page"></a>
                        </li>

                        <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                            <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page+1,buscar)">Sig</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                arrayDirectorio:[],
                pagination:{
                    'total':0,
                    'current_page':0,
                    'per_page':0,
                    'last_page':0,
                    'from':0,
                    'to':0
                },
                offset:3,
                buscar:''
            }
        },
        computed:{
           isActived: function(){
            return this.pagination.current_page;
           },
           //Calcula los elementos de la paginacion
           pagesNumber: function(){
                if(!this.pagination.to){
                    return [];
                }
                var from = this.pagination.current_page - this.offset;
                if(from <1){
                    from=1;
                }

                var to = from + (this.offset * 2);
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }

                var pagesArray = [];
                while(from <= to ){
                    pagesArray.push(from);
                    from++;
                }

                return pagesArray;
           }
        },
        methods:{
            listarDirectorios(page,buscar){
                let me=this;
                var url = '/customer/shipment/get/destination-directory?page='+page+'&buscar='+buscar
                axios.get(url).then(function (response) {
                    var respuesta  = response.data;
                    me.arrayDirectorio = respuesta.destinataries.data;
                    me.pagination = respuesta.pagination;

                })
                .catch(function (error) {
                    // handle error
                console.log(error);
                })
                .finally(function () {
                // always executed
                });
            },
            cambiarPagina(page,buscar){
              let me = this;
              me.pagination.current_page = page;
              me.listarDirectorios(page,buscar);
            },
        },
        mounted() {
            //console.log('Component mounted.')
            this.listarDirectorios(1,'')
        }
    }
</script>
