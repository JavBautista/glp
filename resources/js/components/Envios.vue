<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Envios
            </div>
            <div class="card-body">

                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="input-group">
                          <input type="text" v-model="buscar" class="form-control" placeholder="Texto a buscar" @keyup.enter="listarEnvios(1,buscar)">
                          <button type="submit" @click="listarEnvios(1,buscar)" class="btn btn-dark"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </div>

                <section v-for="envio in arrayEnvios" :key="envio.id">
                    <div class="card" v-if="envio.disabled==0">
                      <div class="card-header">
                        <h5>Folio <span v-text="envio.id">  </span> Num. Rastreo <span v-text="envio.tracking_number"></span> </h5 class="card-title">

                      </div>
                      <div class="card-body">
                          <div class="row">

                            <div class="col-md-4">
                              <h5>Quien envía</h5>
                              <dl class="row">
                                  <dt class="col-4">Razón Social</dt>
                                  <dd class="col-8" v-text="envio.remitent.company"></dd>
                                  <dt class="col-4">Nombre</dt>
                                  <dd class="col-8" v-text="envio.remitent.name"></dd>
                                  <dt class="col-4">Móvil</dt>
                                  <dd class="col-8" v-text="envio.remitent.movil"></dd>
                                  <dt class="col-4">Dirección</dt>
                                  <dd class="col-8" v-text="envio.remitent.address"></dd>
                                  <dt class="col-4">Ciudad</dt>
                                  <dd class="col-8" v-text="envio.remitent.city"></dd>
                                  <dt class="col-4">Estado</dt>
                                  <dd class="col-8" v-text="envio.remitent.state"></dd>
                              </dl>
                            </div>
                            <div class="col-md-4">
                              <h5>Quien recibe</h5>
                              <dl class="row">
                                  <dt class="col-4">Razón Social</dt>
                                  <dd class="col-8" v-text="envio.destinatary.company"></dd>
                                  <dt class="col-4">Nombre</dt>
                                  <dd class="col-8" v-text="envio.destinatary.name"></dd>
                                  <dt class="col-4">Móvil</dt>
                                  <dd class="col-8" v-text="envio.destinatary.movil"></dd>
                                  <dt class="col-4">Dirección</dt>
                                  <dd class="col-8" v-text="envio.destinatary.address"></dd>
                                  <dt class="col-4">Ciudad</dt>
                                  <dd class="col-8" v-text="envio.destinatary.city"></dd>
                                  <dt class="col-4">Estado</dt>
                                  <dd class="col-8" v-text="envio.destinatary.state"></dd>
                              </dl>
                            </div>
                            <div class="col-md-4">

                              <dl class="row">
                                  <dt class="col-4">Estatus</dt>
                                  <dd class="col-8" v-text="envio.status.status"></dd>
                                  <dt class="col-4">Creada</dt>
                                  <dd class="col-8 small text-muted" v-text="envio.created_at"></dd>
                                </dl>
                                <p><a :href="'/customer/shipment/detail/'+envio.id" class="btn btn-block btn-dark"> <i class="fa fa-search"></i> Ver Detalle</a></p>
                                <!--<p><a :href="'/customer/shipment/print/'+envio.id" class="btn btn-block btn-outline-danger"> <i class="fa fa-print"></i> Imprimir tradicional</a></p>-->
                                <p><a :href="'/customer/shipment/print-new/'+envio.id" class="btn btn-block btn-danger"> <i class="fa fa-print"></i> PDF </a></p>

                                <!--<p><a :href="'/customer/shipment/print-new-alt/'+envio.id" class="btn btn-block btn-outline-secondary"> <i class="fa fa-print"></i> Imprimir + Paquetes Alt </a></p>-->
                            </div>

                          </div><!--.div.row-->
                      </div><!--./div.card-body-->
                    </div><!--./div.card-->
                </section>

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
                arrayEnvios:[],
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
            listarEnvios(page,buscar){
                console.log(buscar)
                let me=this;
                var url = '/customer/get-customers?page='+page+'&buscar='+buscar
                axios.get(url).then(function (response) {
                    console.log(response.data)
                    var respuesta  = response.data;
                    me.arrayEnvios = respuesta.shipments.data;
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
              me.listarEnvios(page,buscar);
            },
        },
        mounted() {

            this.listarEnvios(1,'')
        }
    }
</script>
