<template>
  <div>
    <div class="container-fluid">
      <!-- Ejemplo de tabla Listado -->
      <div class="card">
          <div class="card-header">
              <i class="fa fa-align-justify"></i> Recollectores
              <button type="button" @click="abrirModal('collector','registrar')" class="btn btn-primary">
                  <i class="icon-plus"></i>&nbsp;Nuevo
              </button>
          </div>
          <div class="card-body">
              <div class="form-group row">
                  <div class="col-md-6">
                      <div class="input-group">
                          <select class="form-control col-md-3" v-model="criterio">
                            <option value="name">Nombre</option>
                            <option value="mail">Mail</option>
                          </select>
                          <input type="text" v-model="buscar" class="form-control" placeholder="Texto a buscar" @keyup.enter="loadCollectors(1,buscar,criterio)">
                          <button type="submit" @click="loadCollectors(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                      </div>
                  </div>
              </div>
              <table class="table table-bordered table-striped table-sm">
                  <thead>
                      <tr>
                          <th>Mail</th>
                          <th>Name</th>
                          <th>RFC</th>
                          <th>Direccion</th>
                          <th>CP</th>
                          <th>Ciudad</th>
                          <th>Estado</th>
                          <th>Estatus</th>
                          <th>Opciones</th>
                      </tr>
                  </thead>
                  <tbody>
                        <tr v-for="collector in arrayCollectors" :key="collector.id">
                            <td v-text="collector.mail"></td>
                            <td v-text="collector.name"></td>
                            <td v-text="collector.rfc"></td>
                            <td v-text="collector.addres"></td>
                            <td v-text="collector.zip_code"></td>
                            <td v-text="collector.city"></td>
                            <td v-text="collector.state"></td>
                            <td>
                                <template v-if="collector.active">
                                    <button type="button" class="btn btn-sm btn-info" @click="actualizarAInactivo(collector.id)"> Activo <i class="fa fa-toggle-on"></i>
                                    </button>
                                </template>
                                <template v-else>
                                    <button type="button" class="btn btn-sm btn-secondary" @click="actualizarAActivo(collector.id)"> Inavtivo <i class="fa fa-toggle-off"></i>
                                    </button>
                                </template>
                            </td>
                            <td>

                                <button class="btn btn-info btn-sm" @click="abrirModal('collector','ver_datos', collector)" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-info btn-sm" @click="abrirModal('collector','actualizar_datos', collector)" title="Editar"><i class="fa fa-edit"></i></button>
                            </td>

                        </tr>

                </tbody>
              </table>
              <nav>
                  <ul class="pagination">
                      <li class="page-item" v-if="pagination.current_page > 1">
                          <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page-1,buscar,criterio)">Ant</a>
                      </li>

                      <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page==isActived ? 'active':'']">
                          <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                      </li>

                      <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                          <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page+1,buscar,criterio)">Sig</a>
                      </li>
                  </ul>
              </nav>
          </div>
      </div>
      <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar/actualizar-->
    <div class="modal fade" tabindex="-1" :class="{'mostrar':modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" v-text="tituloModal"></h4>
                    <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form v-on:submit.prevent action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                        <div v-show="errorCollector" class="form-group row div-error">
                          <div class="container-fluid">
                            <div class="alert alert-danger text-center">
                                <div v-for="error in errorMostrarMsjCollector" :key="error" v-text="error">
                                </div>
                            </div>
                          </div>
                        </div>
                        <div v-show="error_server" class="form-group row div-error">
                          <div class="container-fluid">
                            <div class="alert alert-danger text-center">
                                <div v-for="esm in errors_server_msg " v-text="esm"></div>
                            </div>
                          </div>
                        </div>
                        <!--tipoAccion==1 o 2: Agregar o Actualizar-->
                        <div v-if="tipoAccion==1 || tipoAccion==2">
                          <p><em><strong class="text text-danger">* Campos obligatorios</strong></em></p>
                          <div v-if="tipoAccion==1">
                            <div class="form-group">
                              <label for="mail">Email<span class="text-danger small">*</span></label>
                              <input type="text" class="form-control" v-model="mail" placeholder="email@example.com" required>
                            </div>
                          </div>
                          <div v-else>
                            <div class="form-group">
                              <label for="mail">Email<span class="text-danger small">*</span></label>
                              <input type="text" class="form-control" v-model="mail" placeholder="email@example.com" readonly>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="name">Nombre<span class="text-danger small">*</span></label>
                            <input type="text" class="form-control" v-model="name"  placeholder="Enter Name" required>
                          </div>

                          <div class="form-group">
                            <label for="rfc">RFC<span class="text-danger small">*</span></label>
                            <input type="text" class="form-control" v-model="rfc" placeholder="RFC o Razon Social" required>
                          </div>

                          <div class="form-group">
                            <label for="phone">Telefono<span class="text-danger small">*</span></label>
                            <input type="text" class="form-control" v-model="phone" placeholder="7775985421" required>
                          </div>

                          <div class="form-group">
                            <label for="movil">Movil<span class="text-danger small">*</span></label>
                            <input type="text" class="form-control" v-model="movil" placeholder="7775985421" required>
                          </div>

                          <div class="form-group">
                            <label for="zip_code">CP<span class="text-danger small">*</span></label>
                            <input type="text" class="form-control" v-model="zip_code" placeholder="55083" required>
                          </div>

                          <div class="form-group">
                            <label for="address">Calle<span class="text-danger small">*</span></label>
                            <input type="text" class="form-control" v-model="address" placeholder="Calle" required>
                          </div>

                          <div class="form-group">
                            <label for="number_out">No Exterior<span class="text-danger small">*</span></label>
                            <input type="text" class="form-control" v-model="number_out" placeholder="Numero Exterior" required>
                          </div>

                          <div class="form-group">
                            <label for="number_int">No Interior</label>
                            <input type="text" class="form-control" v-model="number_int" placeholder="Numero Interior (opcional)">
                          </div>

                          <div class="form-group">
                            <label for="district">Colonia<span class="text-danger small">*</span></label>
                            <input type="text" class="form-control" v-model="district" placeholder="El mirador" required>
                          </div>

                          <div class="form-group">
                            <label for="city">Ciudad<span class="text-danger small">*</span></label>
                            <input type="text" class="form-control" v-model="city" placeholder="Puebla" required>
                          </div>

                          <div class="form-group">
                            <label for="state">Estado<span class="text-danger small">*</span></label>
                            <input type="text" class="form-control" v-model="state" placeholder="Puebla" required>
                          </div>

                          <div class="form-group">
                            <label for="reference">Referencia<span class="text-danger small">*</span></label>

                            <input type="text" class="form-control" v-model="reference" placeholder="Entre que calles" required>
                          </div>

                          <div class="form-group">
                            <label for="detail">Detalles<span class="text-danger small">*</span></label>
                            <input type="text" class="form-control" v-model="detail" placeholder="(Color de fachada y puerta)" required>
                          </div>

                          <div class="form-group">
                            <label for="observations">Obervaciones</label>
                            <input type="text" class="form-control" v-model="observations" placeholder="Obervaciones opcionales acerca del cliente">
                          </div>
                        <!--./tipoAccion==1 o 2: Agregar o Actualizar-->
                        </div><!--./ifelse tipoAccion 1 | 2-->
                        <div v-else-if="tipoAccion==3">
                          <dl class="row">
                            <dt class="col-4">Mail</dt>
                            <dd class="col-8" v-text="mail"></dd>
                            <dt class="col-4">Nombre</dt>
                            <dd class="col-8" v-text="name"></dd>
                            <dt class="col-4">RFC</dt>
                            <dd class="col-8" v-text="rfc"></dd>
                            <dt class="col-4">Teléfono</dt>
                            <dd class="col-8" v-text="phone"></dd>
                            <dt class="col-4">Movil</dt>
                            <dd class="col-8" v-text="movil"></dd>
                            <dt class="col-4">Dirección</dt>
                            <dd class="col-8">
                              {{ address }} Ext. {{ number_out }} Int. {{ number_int }}
                              <br>
                              Col. {{ district }} CP. {{zip_code }}
                              <br>
                              {{city}}, {{state}}
                            </dd>
                            <dt class="col-4">Referancia</dt>
                            <dd class="col-8" v-text="reference"></dd>
                            <dt class="col-4">Detalle</dt>
                            <dd class="col-8" v-text="detail"></dd>
                            <dt class="col-4">Observaciones</dt>
                            <dd class="col-8" v-text="observations"></dd>
                          </dl>
                        </div><!--./ifelse tipoAccion 3-->

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"  @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarCollector()">Guardar</button>
                    <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarDatosCollector()">Actualizar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->
  </div>
</template>

<script>
    export default {
        data(){
            return {
              arrayShopTypes:[],
              arrayCollectors:[],
              pagination:{
                  'total':0,
                  'current_page':0,
                  'per_page':0,
                  'last_page':0,
                  'from':0,
                  'to':0
              },
              offset:3,
              criterio:'name',
              buscar:'',

              collector_id:0,
              mail:'',
              name:'',
              rfc:'',
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

              error_server:0,
              errors_server_msg:[],

              modal:0,
              tituloModal:'',
              tipoAccion:0,
              errorCollector:0,
              errorMostrarMsjCollector:[],
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
        methods : {
            loadCollectors(page,buscar,criterio){
                let me=this;
                var url = '/admin/collectors/get?page='+page+'&buscar='+buscar+'&criterio='+criterio;
                axios.get(url).then(function (response){
                    var respuesta  = response.data;
                    me.arrayCollectors = respuesta.collectors.data;
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
            cambiarPagina(page,buscar,criterio){
                let me = this;
                me.pagination.current_page = page;
                me.loadCollectors(page,buscar,criterio);
            },
            limpiarDatos(){
              this.modal=0;
              this.tipoAccion =0;
              this.tituloModal='';
              this.collector_id= 0;
              this.mail = '';
              this.name = '';
              this.rfc = '';
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
              this.error_server=0;
              this.errors_server_msg=[];
              this.errorCollector=0;
              this.errorMostrarMsjCollector=[];
            },
            actualizarAActivo(id){
                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                  title: '¿Desea cambiar a activo?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Aceptar',
                  cancelButtonText: 'Cancelar',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {

                    let me=this;
                    axios.put('/admin/collectors/update/active',{
                        'id': id
                    }).then(function (response){
                        me.loadCollectors(me.pagination.current_page,me.buscar,me.criterio);
                        swalWithBootstrapButtons.fire(
                          '¡Activo!',
                          'Actualizacion exitosa.',
                          'success'
                        )
                    }).catch(function (error){
                        console.log(error);
                    });

                  } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                  ) {
                    swalWithBootstrapButtons.fire(
                      'Cancelled',
                      'Your imaginary file is safe :)',
                      'error'
                    )
                  }
                })
            },
            actualizarAInactivo(id){
                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                  title: '¿Desea cambiar a inactivo?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Aceptar',
                  cancelButtonText: 'Cancelar',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {

                    let me=this;
                    axios.put('/admin/collectors/update/inactive',{
                        'id': id
                    }).then(function (response){
                        me.loadCollectors(me.pagination.current_page,me.buscar,me.criterio);
                        swalWithBootstrapButtons.fire(
                          '¡Inactivo!',
                          'Actualizacion exitosa.',
                          'success'
                        )
                    }).catch(function (error){
                        console.log(error);
                    });

                  } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                  ) {
                    swalWithBootstrapButtons.fire(
                      'Cancelled',
                      '',
                      'error'
                    )
                  }
                })
            },
            registrarCollector(){
                if(this.validarDatosCollector('create')){
                    return;
                }
                let me=this;
                axios.post('/admin/collectors/store',{
                  'mail':me.mail,
                  'name':me.name,
                  'rfc':me.rfc,
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
                  me.loadCollectors(me.pagination.current_page,me.buscar,me.criterio)
                }).catch(function (error){
                    if (error.response.status == 422){
                      me.error_server=1;
                      me.errors_server_msg=error.response.data.errors;
                      Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Ocurrio un error al guardar en la BD, vea el mensaje arriba.'
                      })
                    }
                });
            },
            actualizarDatosCollector(){
                if(this.validarDatosCollector('edit')){
                    return;
                }
                let me=this;
                axios.put('/admin/collectors/update',{
                  'collector_id':me.collector_id,
                  'name':me.name,
                  'rfc':me.rfc,
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
                  me.loadCollectors(me.pagination.current_page,me.buscar,me.criterio)
                }).catch(function (error){
                    me.error_server=1;
                    me.errors_server_msg=error.response.data.errors;
                });
            },
            validarDatosCollector(accion){
                this.errorCollector=0;
                this.errorMostrarMsjCollector=[];
                if(accion=='create'){
                  if(!this.mail) this.errorMostrarMsjCollector.push('El mail no puede estar vacio');
                }
                if(!this.name) this.errorMostrarMsjCollector.push('El nombre no puede estar vacio');
                if(!this.rfc) this.errorMostrarMsjCollector.push('El rfc no puede estar vacio');
                if(!this.phone) this.errorMostrarMsjCollector.push('El teléfono no puede estar vacio');
                if(!this.movil) this.errorMostrarMsjCollector.push('El movil no puede estar vacio');
                if(!this.address) this.errorMostrarMsjCollector.push('La dirección no puede estar vacio');
                if(!this.number_out) this.errorMostrarMsjCollector.push('El numero exterior no puede estar vacio');
                if(!this.zip_code) this.errorMostrarMsjCollector.push('El CP no puede estar vacio');
                if(!this.district) this.errorMostrarMsjCollector.push('La colonia no puede estar vacio');
                if(!this.city) this.errorMostrarMsjCollector.push('La ciudad no puede estar vacio');
                if(!this.state) this.errorMostrarMsjCollector.push('El estado no puede estar vacio');
                if(!this.reference) this.errorMostrarMsjCollector.push('La referencia no puede estar vacio');
                if(!this.detail) this.errorMostrarMsjCollector.push('El detalle no puede estar vacio');
                if(this.errorMostrarMsjCollector.length) this.errorCollector=1;
                return this.errorCollector;
            },
            abrirModal(modelo, accion, data=[]){
                switch(modelo){
                    case "collector":{
                        switch(accion){
                            case 'registrar':{
                                this.limpiarDatos();
                                this.modal=1;
                                this.tipoAccion =1;
                                this.tituloModal='Agregar';
                                this.mail='';
                                this.name='';
                                this.rfc='';
                                this.phone='';
                                this.movil='';
                                this.zip_code='';
                                this.address='';
                                this.number_out='';
                                this.number_int='';
                                this.district='';
                                this.city='';
                                this.state='';
                                this.reference='';
                                this.detail='';
                                this.observations='';
                                break;
                            }
                            case 'actualizar_datos':{
                                this.limpiarDatos();
                                this.modal=1;
                                this.tipoAccion =2;
                                this.tituloModal='Actualizar';
                                this.collector_id= data['id'];
                                this.mail = data['mail'];
                                this.name = data['name'];
                                this.rfc = data['rfc'];
                                this.phone = data['phone'];
                                this.movil = data['movil'];
                                this.zip_code = data['zip_code'];
                                this.address = data['address'];
                                this.number_out = data['number_out'];
                                this.number_int = data['number_int'];
                                this.district = data['district'];
                                this.city = data['city'];
                                this.state = data['state'];
                                this.reference = data['reference'];
                                this.detail = data['detail'];
                                this.observations = data['observations'];
                                break;
                            }
                            case 'ver_datos':{
                                this.limpiarDatos();
                                this.modal=1;
                                this.tipoAccion =3;
                                this.tituloModal='Ver';
                                this.collector_id= data['id'];
                                this.mail = data['mail'];
                                this.name = data['name'];
                                this.rfc = data['rfc'];
                                this.phone = data['phone'];
                                this.movil = data['movil'];
                                this.zip_code = data['zip_code'];
                                this.address = data['address'];
                                this.number_out = data['number_out'];
                                this.number_int = data['number_int'];
                                this.district = data['district'];
                                this.city = data['city'];
                                this.state = data['state'];
                                this.reference = data['reference'];
                                this.detail = data['detail'];
                                this.observations = data['observations'];
                                break;
                            }
                        }
                    }
                }
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
            },
        },
        mounted() {
            this.loadCollectors(1,'','name');

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
        position: fixed !important;
        background-color: #3c29297a !important;
        overflow: scroll;
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
