<template>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Envios
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-10">
                        <label for="fecha_ini">Inicio</label>&nbsp;
                        <datepicker @input="changeDate()" v-model="fecha_ini" name="fecha_ini" format="yyyy-MM-dd" :language="es"></datepicker>
                        <label for="fecha_fin">Fin</label>&nbsp;
                        <datepicker @input="changeDate()" v-model="fecha_fin" name="fecha_fin" format="yyyy-MM-dd" :language="es"></datepicker>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10">
                        <div class="input-group">
                          <input type="text" v-model="buscar" class="form-control" placeholder="Texto a buscar" @keyup.enter="listarEnvios(1,buscar)">
                          <button type="submit" @click="listarEnvios(1,buscar)" class="btn btn-dark"><i class="fa fa-search"></i> Buscar</button>
                          <button @click="exportar()" class="btn btn-success"><i class="fas fa-file-excel"></i> Exportar</button>
                        </div>
                    </div>
                </div>


                <section v-for="envio in arrayEnvios" :key="envio.id">
                    <div class="card" v-if="envio.disabled==0">
                      <div class="card-body">
                          <div class="row">
                            <div class="col-md-4">
                              <h5>Envio <span v-text="envio.id"></span></h5>
                              <dl class="row">
                                  <dt class="col-4">Estatus</dt>
                                  <dd class="col-8" v-text="envio.status.status"></dd>
                                  <dt class="col-4">#Trk</dt>
                                  <dd class="col-8"><strong><span v-text="envio.tracking_number"></span></strong></dd>
                                  <dt class="col-4">Creación</dt>
                                  <dd class="col-8" v-text="envio.created_at"></dd>
                                </dl>
                                <a :href="'/admin/shipments/detail/'+envio.id" class="btn btn-dark btn-block">Ver Detalle</a>

                            </div>
                            <div class="col-md-4">
                              <h5>Quien envia</h5>
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
    import Datepicker from 'vuejs-datepicker';
    import { es } from 'vuejs-datepicker/dist/locale'
    import moment from "moment";
    export default {
        components: {
            Datepicker
        },
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
                buscar:'',
                es: es,
                fecha_ini:'',
                fecha_fin:''
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
            formatDate(date){
                let formatted_date = date.getFullYear() + "-" + (("0" + (date.getMonth() + 1)).slice(-2)) + "-" + (("0" + date.getDate()).slice(-2))
                 return formatted_date;
            },
            changeDate(){
                let me = this
                let f1 = moment(me.fecha_ini).format('YYYY-MM-DD')
                let f2 = moment(me.fecha_fin).format('YYYY-MM-DD')
                let url='/admin/shipments/set-seesion-fechas?fecha_ini='+f1+'&fecha_fin='+f2;
                axios.get(url).then(function (response){
                })
                .catch(function (error){
                })
                .finally(function () {
                });

            },
            listarEnvios(page,buscar){
                let me=this;
                var url = '/admin/shipments/get-shipments?page='+page+'&buscar='+buscar;
                axios.get(url).then(function (response) {
                    var respuesta  = response.data;
                    console.log(respuesta);
                    me.arrayEnvios = respuesta.shipments.data;
                    me.pagination  = respuesta.pagination;
                    me.fecha_ini   = new Date(respuesta.fecha_ini);
                    me.fecha_fin   = new Date(respuesta.fecha_fin);
                })
                .catch(function (error) {
                // handle error
                })
                .finally(function () {
                // always executed
                });
            },
            exportar(){
                let me=this;
                let ff1=moment(me.fecha_ini).format('YYYY-MM-DD')
                let ff2=moment(me.fecha_fin).format('YYYY-MM-DD')
                let export_url= '/admin/shipments/export/excel?fecha_ini='+ff1+'&fecha_fin='+ff2;
                window.location.href= export_url;

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
