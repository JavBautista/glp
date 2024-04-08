<template>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Directorio
                <button type="button" @click="abrirModal('client','registrar')" class="btn btn-primary">
                    <i class="icon-plus"></i>&nbsp;Nuevo Cliente
                </button>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="input-group">
                          <input type="text" v-model="buscar" class="form-control" placeholder="Texto a buscar" @keyup.enter="listarDirectorio(1,buscar)">
                          <button type="submit" @click="listarDirectorio(1,buscar)" class="btn btn-dark"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </div>

                <div class="card" v-for="client in arrayDirectorio " :key="client.id">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <dl class="row">
                                    <dt class="col-4">Nombre</dt>
                                    <dd class="col-8">{{client.name}} {{client.last_name}} {{client.second_last_name}}</dd>
                                    <dt class="col-4">Empresa</dt>
                                    <dd class="col-8" v-text="client.company"></dd>
                                    <dt class="col-4">Email</dt>
                                    <dd class="col-8" v-text="client.mail"></dd>
                                    <dt class="col-4"> Teléfono</dt>
                                    <dd class="col-8" v-text="client.phone"></dd>
                                    <dt class="col-4">Móvil</dt>

                                </dl>

                            </div>
                            <div class="col-6">
                                <dl class="row">
                                    <dt class="col-4">CP</dt>
                                    <dd class="col-8" v-text="client.zip_code"></dd>
                                    <dt class="col-4">Dirección</dt>
                                    <dd class="col-8">{{client.address}} {{client.number_out}} {{client.district}}</dd>
                                    <dt class="col-4">Ciudad</dt>
                                    <dd class="col-8"> {{client.city}}, {{client.state}} </dd>

                                </dl>
                                <button class="btn btn-info" @click="abrirModal('client','ver',client)"> <i class="fa fa-search"></i> Ver Información</button>
                                <button class="btn btn-outline-info" @click="abrirModal('client','actualizar',client)"><i class="fa fa-edit"></i> Editar</button>
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

        <!-- -----------------------------------------------------------------------------  -->
        <!--Inicio del modal agregar/actualizar-->
        <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" v-text="tituloModal"></h4>
                        <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                                <section id="inputs-destino">
                                  <p class="card-text"><em><strong class="text text-danger">* Obligatorios</strong></em></p>
                                  <div class="form-group row">
                                     <label for="mail" class="col-sm-3 col-form-label">Email</label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" v-model="mail"  placeholder="" :disabled="tipoAccion==3">
                                     </div>
                                  </div>
                                  <!-- ------------------------------------------------------------------------>

                                  <div class="form-group row">
                                     <label for="name" class="col-sm-3 col-form-label">Nombre<strong class="text-danger small">*</strong></label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" v-model="name"  placeholder="" :disabled="tipoAccion==3" required>
                                     </div>
                                  </div>
                                  <!--<div class="form-group row">
                                     <label for="last_name" class="col-sm-3 col-form-label">Primer Apellido<span class="text-danger small">*</span></label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" v-model="last_name"  placeholder="Valdez" :disabled="tipoAccion==3" required>
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                     <label for="second_last_name" class="col-sm-3 col-form-label">Segundo Apellido</label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" v-model="second_last_name"  placeholder="Perez (Opcional)" :disabled="tipoAccion==3" required>
                                     </div>
                                  </div>
                                  -->
                                  <div class="form-group row">
                                     <label for="rfc" class="col-sm-3 col-form-label">RFC</label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" v-model="rfc"  placeholder="" :disabled="tipoAccion==3">
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                     <label for="company" class="col-sm-3 col-form-label">Razon Social</label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" v-model="company"  placeholder="" :disabled="tipoAccion==3">
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                     <label for="department" class="col-sm-3 col-form-label">Departamento</label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" v-model="department"  placeholder="" :disabled="tipoAccion==3">
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                     <label for="movil" class="col-sm-3 col-form-label">Celular<span class="text-danger small">*</span></label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" v-model="movil"  placeholder="" required :disabled="tipoAccion==3">
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                     <label for="phone" class="col-sm-3 col-form-label">Teléfono</label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" v-model="phone"  placeholder="" required :disabled="tipoAccion==3">
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                     <label for="zip_code" class="col-sm-3 col-form-label">CP<span class="text-danger small">*</span></label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" v-model="zip_code"  placeholder="" required :disabled="tipoAccion==3">
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                     <label for="address" class="col-sm-3 col-form-label">Calle<span class="text-danger small">*</span></label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" v-model="address"  placeholder="" required :disabled="tipoAccion==3">
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                     <label for="number_out" class="col-sm-3 col-form-label">No Exterior<span class="text-danger small">*</span></label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" v-model="number_out"  placeholder="" required :disabled="tipoAccion==3">
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                     <label for="number_int" class="col-sm-3 col-form-label">No Interior</label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" v-model="number_int"  placeholder="" :disabled="tipoAccion==3">
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                     <label for="district" class="col-sm-3 col-form-label">Colonia<span class="text-danger small">*</span></label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" v-model="district"  placeholder="" required :disabled="tipoAccion==3">
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="select_estado">Estado</label>
                                    <div class="col-sm-9">
                                      <select class="form-control" v-model="select_estado" @change="onChangeEstado()" :disabled="tipoAccion==3">
                                          <option v-for="edo in arrayEstados" :key="edo.id" v-bind:value="{ id: edo.id, text: edo.nombre }" v-text="edo.nombre"></option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="city">Municipio</label>
                                    <div class="col-sm-9">
                                      <select class="form-control" v-model="city" :disabled="tipoAccion==3">
                                          <option v-for="mun in arrayMunicipios" :key="mun.id" :value="mun.nombre" v-text="mun.nombre"></option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                     <label for="reference" class="col-sm-3 col-form-label">Referencia<span class="text-danger small">*</span></label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" v-model="reference"  placeholder="" required :disabled="tipoAccion==3">
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                     <label for="detail" class="col-sm-3 col-form-label">Detalles<span class="text-danger small">*</span></label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" v-model="detail"  placeholder="" required :disabled="tipoAccion==3">
                                     </div>
                                  </div>

                                  <!--<div class="form-group row">
                                     <label for="observations" class="col-sm-3 col-form-label">Observaciones<span class="text-danger small">*</span></label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" v-model="observations"  placeholder="Observations" required :disabled="tipoAccion==3">
                                     </div>
                                  </div>-->

                                </section><!--./inputs-destino-->

                            <div v-show="error" class="form-group row div-error">
                                <div class="text-center text-error">
                                    <div v-for="error in errorMostrarMsj" :key="error" v-text="error">
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                        <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrar()">Guardar</button>
                        <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizar()">Actualizar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--Fin del modal-->
    </div>
    <!--./container-fluid-->


</template>

<script>
    export default {
        data(){
            return {
                arrayDirectorio:[],

                client_id:0,
                mail:'',
                company:'',
                name:'',
                last_name:'',
                second_last_name:'',
                rfc:'',
                department:'',
                phone:'',
                movil:'',
                zip_code:'',
                address:'',
                number_out:'',
                number_int:'',
                district:'',
                city:'',
                state:'',
                reference:'',
                detail:'',
                observations:'',

                select_estado:{},
                arrayEstados:[],
                arrayMunicipios:[],

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

                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                error : 0,
                errorMostrarMsj : [],

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
            listarDirectorio(page,buscar){
                let me=this;
                var url = '/customer/clients/get/?page='+page+'&buscar='+buscar
                axios.get(url).then(function (response) {
                    var respuesta  = response.data;
                    me.arrayDirectorio = respuesta.clients.data;
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
              me.listarDirectorio(page,buscar);
            },
            onChangeEstado(){
              let me=this
              me.state=me.select_estado.text;
              me.getMunicipio('dest',me.select_estado.id)
            },
            getMunicipio(tipo,id){
                let me=this;
                var url = '/municipio/get/'+id
                axios.get(url).then(function (response){
                      me.arrayMunicipios= response.data;
                })
                .catch(function (error) {
                // handle error
                console.log(error);
                })
                .finally(function () {
                // always executed
                });
            },
            getEstados(){
                let me=this;
                var url = '/estados/get/'
                axios.get(url).then(function (response) {
                     me.arrayEstados = response.data
                })
                .catch(function (error) {
                // handle error
                console.log(error);
                })
                .finally(function () {
                // always executed
                });
            },

            validarDatos(){
              this.error=0;
              this.errorMostrarMsj=[];
              if (!this.name) this.errorMostrarMsj.push('El nombre no puede estar vacio ');
              //if (!this.last_name) this.errorMostrarMsj.push('El apellido no puede estar vacio ');
              if (!this.movil) this.errorMostrarMsj.push('El movil no puede estar vacio ');
              if (!this.zip_code) this.errorMostrarMsj.push('El CP no puede estar vacio ');
              if (!this.address) this.errorMostrarMsj.push('La calle no puede estar vacio ');
              if (!this.number_out) this.errorMostrarMsj.push('El número exterior no puede estar vacio ');
              if (!this.district) this.errorMostrarMsj.push('La colonia no puede estar vacio ');
              if (!this.city) this.errorMostrarMsj.push('La ciudad no puede estar vacio ');
              if (!this.state) this.errorMostrarMsj.push('El estado no puede estar vacio ');
              if (!this.reference) this.errorMostrarMsj.push('La referencia no puede estar vacio ');
              if (!this.detail) this.errorMostrarMsj.push('El detalle no puede estar vacio ');
              if(this.errorMostrarMsj.length) this.error=1;
              return this.error;
            },

            registrar(){
                if (this.validarDatos()){ return; }
                let me = this;
                axios.post('/customer/clients/store',{
                    'mail':this.mail,
                    'company':this.company,
                    'name':this.name,
                    'last_name':this.last_name,
                    'second_last_name':this.second_last_name,
                    'rfc':this.rfc,
                    'department':this.department,
                    'phone':this.phone,
                    'movil':this.movil,
                    'zip_code':this.zip_code,
                    'address':this.address,
                    'number_out':this.number_out,
                    'number_int':this.number_int,
                    'district':this.district,
                    'city':this.city,
                    'state':this.state,
                    'reference':this.reference,
                    'detail':this.detail,
                    'observations':this.observations,
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarDirectorio(1,'');
                }).catch(function (error) {
                    console.log(error);
                });
            },
            actualizar(){
                if (this.validarDatos()){ return; }
                let me=this;
                axios.put('/customer/clients/update',{
                    'client_id':me.client_id,
                    'mail':me.mail,
                    'company':me.company,
                    'name':me.name,
                    'last_name':me.last_name,
                    'second_last_name':me.second_last_name,
                    'rfc':me.rfc,
                    'department':me.department,
                    'phone':me.phone,
                    'movil':me.movil,
                    'zip_code':me.zip_code,
                    'address':me.address,
                    'number_out':me.number_out,
                    'number_int':me.number_int,
                    'district':me.district,
                    'city':me.city,
                    'state':me.state,
                    'reference':me.reference,
                    'detail':me.detail,
                    'observations':me.observations,
                }).then(function (response){
                  console.log(response)
                  me.cerrarModal();
                  me.listarDirectorio(me.pagination.current_page,'')
                }).catch(function (error){
                    /*me.error_server=1;
                    me.errors_server_msg=error.response.data.errors;*/
                });
            },

            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
            },
            limpiarDatos(){
              this.modal=0;
              this.tipoAccion =0;
              this.tituloModal='';

              this.client_id= 0;
              this.mail = '';
              this.name = '';
              this.last_name = '';
              this.second_last_name = '';
              this.rfc = '';
              this.department = '';
              this.phone = '';
              this.movil = '';
              this.zip_code = '';
              this.address = '';
              this.number_out = '';
              this.number_int = '';
              this.district = '';
              this.city = '';
              this.state = '';
              this.reference = '';
              this.detail = '';
              this.observations = '';

              this.error=0;
              this.errorMostrarMsj=[];
            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "client":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.limpiarDatos()
                                this.modal = 1;
                                this.tipoAccion=1;
                                this.tituloModal = 'Registrar';

                                break;
                            }
                            case 'actualizar':
                            {
                                this.limpiarDatos()
                                this.modal=1;
                                this.tipoAccion=2;
                                this.tituloModal='Actualizar';
                                this.client_id= data['id'];
                                this.mail = data['mail'];
                                this.name = data['name'];
                                this.last_name = data['last_name'];
                                this.second_last_name = data['second_last_name'];
                                this.rfc = data['rfc'];
                                this.company = data['company'];
                                this.department = data['department'];
                                this.phone = data['phone'];
                                this.movil = data['movil'];
                                this.zip_code = data['zip_code'];
                                this.address = data['address'];
                                this.number_out = data['number_out'];
                                this.number_int = data['number_int'];
                                this.district = data['district'];

                                this.state = data['state'];
                                for (var i = this.arrayEstados.length - 1; i >= 0; i--) {
                                    if(this.arrayEstados[i].nombre==this.state){
                                        this.select_estado.text = this.arrayEstados[i].nombre;
                                        this.select_estado.id = this.arrayEstados[i].id;
                                        this.getMunicipio('dest',this.arrayEstados[i].id)
                                    }
                                }
                                this.city = data['city'];


                                this.reference = data['reference'];
                                this.detail = data['detail'];
                                this.observations = data['observations'];

                                break;
                            }

                            case 'ver':
                            {
                                this.limpiarDatos()
                                this.modal=1;
                                this.tipoAccion=3;
                                this.tituloModal='Ver Información';
                                this.client_id= data['id'];
                                this.mail = data['mail'];
                                this.name = data['name'];
                                this.last_name = data['last_name'];
                                this.second_last_name = data['second_last_name'];
                                this.rfc = data['rfc'];
                                this.company = data['company'];
                                this.department = data['department'];
                                this.phone = data['phone'];
                                this.movil = data['movil'];
                                this.zip_code = data['zip_code'];
                                this.address = data['address'];
                                this.number_out = data['number_out'];
                                this.number_int = data['number_int'];
                                this.district = data['district'];

                                this.state = data['state'];
                                for (var i = this.arrayEstados.length - 1; i >= 0; i--) {
                                    if(this.arrayEstados[i].nombre==this.state){
                                        this.select_estado.text = this.arrayEstados[i].nombre;
                                        this.select_estado.id = this.arrayEstados[i].id;
                                        this.getMunicipio('dest',this.arrayEstados[i].id)
                                    }
                                }
                                this.city = data['city'];


                                this.reference = data['reference'];
                                this.detail = data['detail'];
                                this.observations = data['observations'];

                                break;
                            }
                        }
                    }
                }
            }
        },
        mounted() {
            //console.log('Component mounted.')
            this.listarDirectorio(1,'')
            this.getEstados();
        }
    }
</script>
<style>
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
</style>
