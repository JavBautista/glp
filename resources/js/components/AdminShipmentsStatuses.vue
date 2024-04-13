<template>
    <div>
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Escritorio</a></li>
        </ol>
        <div class="container-fluid">
            <!-- Ejemplo de tabla Listado -->
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Estatus
                    <button type="button" @click="abrirModal('status','registrar')" class="btn btn-secondary">
                        <i class="icon-plus"></i>&nbsp;Nuevo
                    </button>
                </div>
                <div class="card-body">
                    <div class="alert alert-info text-center">
                        <p><i class="fa fa-exclamation-triangle"></i> El <strong>Estatus</strong> solo podrá ser creado una sola vez. Se recomienda usar una sola palabra.</p>
                    </div>
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Estatus</th>

                                <!--<th>Order</th>-->
                                <th>Activo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="status in arrayStatuses" :key="status.id">

                                <td v-text="status.status"></td>

                                <!--<td v-text="status.order"></td>-->
                                <td>
                                    <div v-if="status.active">
                                        <button type="button" class="btn btn-outline-primary btn-sm" @click="desactivarStatus(status.id)">
                                            <i class="fa fa-toggle-on"></i> Activo
                                        </button>
                                    </div>
                                    <div v-else>
                                        <button type="button" class="btn btn-outline-dark btn-sm" @click="activarStatus(status.id)">
                                            <i class="fa fa-toggle-off"></i> Inactivo
                                        </button>
                                    </div>

                                </td>
                                <td>
                                   <!-- <button type="button" @click="abrirModal('status','actualizar',status)" class="btn btn-warning btn-sm">
                                      <i class="icon-pencil"></i>
                                    </button> &nbsp; -->
                                    <button type="button" @click="eliminarStatus(status.id)" class="btn btn-danger btn-sm">
                                      <i class="icon-trash"></i>
                                    </button> &nbsp;
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Fin ejemplo de tabla Listado -->
        </div>
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


                            <div v-if="tipoAccion==1" class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre de estatus</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="status" class="form-control" placeholder="Nombre de estatus">
                                </div>
                            </div>
                            <div v-if="tipoAccion==2" class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre de estatus</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="status" class="form-control" placeholder="Nombre de estatus" readonly>
                                </div>
                            </div>

                            <!--<div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Descripcion de estatus</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="description" class="form-control" placeholder="Descripcion de estatus">
                                </div>
                            </div>-->

                            <div v-show="errorStatus" class="form-group row div-error">
                                <div class="text-center text-error">
                                    <div v-for="error in errorMostrarMsjStatus" :key="error" v-text="error">

                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                        <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarStatus()">Guardar</button>
                        <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarStatus()">Actualizar</button>
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
        data (){
            return {
                arrayStatuses : [],

                status_id:0,
                status : '',
                description : '',
                active : 0,
                order : 0,

                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorStatus : 0,
                errorMostrarMsjStatus : [],
            }
        },
        methods : {
            listarStatuses (){
                let me=this;
                var url= '/admmin/shipments_status/get-statuses';
                axios.get(url).then(function (response) {
                    me.arrayStatuses = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            validarStatus(){
                this.errorStatus=0;
                this.errorMostrarMsjStatus =[];
                if (!this.status) this.errorMostrarMsjStatus.push("El nombre del estatus no puede estar vacío.");
                //if (!this.description) this.errorMostrarMsjStatus.push("La description del estatus no puede estar vacío.");
                if (this.errorMostrarMsjStatus.length) this.errorStatus = 1;
                return this.errorStatus;
            },
            registrarStatus(){
                if (this.validarStatus()){ return; }
                let me = this;
                axios.post('/admmin/shipments_status/store',{
                    'status': this.status
                    //'description': this.description
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarStatuses();
                }).catch(function (error) {
                    console.log(error);
                });
            },
            actualizarStatus(){
               if (this.validarStatus()){ return; }
                let me = this;
                axios.put('/admmin/shipments_status/update',{
                    'id': this.status_id,
                    'status': this.status
                    //'description': this.description
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarStatuses();
                }).catch(function (error) {
                    console.log(error);
                });
            },
            desactivarStatus(id){
                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                  title: '¿Desea cambiar el estatus a inactivo?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Aceptar',
                  cancelButtonText: 'Cancelar',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {
                    let me=this;
                    axios.put('/admmin/shipments_status/update-inactive',{
                        'id': id
                    }).then(function (response){
                        me.listarStatuses();
                        swalWithBootstrapButtons.fire(
                          'Inactivo',
                          'Actualización exitosa.',
                          'success'
                        )
                    }).catch(function (error){
                        console.log(error);
                    });

                  }
                })
            },
            activarStatus(id){
                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                  title: '¿Desea cambiar el estatus a activo?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Aceptar',
                  cancelButtonText: 'Cancelar',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {
                    let me=this;
                    axios.put('/admmin/shipments_status/update-active',{
                        'id': id
                    }).then(function (response){
                        me.listarStatuses();
                        swalWithBootstrapButtons.fire(
                          'Activo',
                          'Actualización exitosa.',
                          'success'
                        )
                    }).catch(function (error){
                        console.log(error);
                    });

                  }
                })
            },
            eliminarStatus(id){
                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                  title: '¿Realmente desea eliminar el estatus?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Aceptar',
                  cancelButtonText: 'Cancelar',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {
                    let me=this;
                    axios.put('/admmin/shipments_status/delete',{
                        'id': id
                    }).then(function (response){
                        me.listarStatuses();
                        swalWithBootstrapButtons.fire(
                          'Eliminado',
                          'Actualización exitosa.',
                          'success'
                        )
                    }).catch(function (error){
                        console.log(error);
                    });

                  }
                })
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.status = '';
            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "status":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tipoAccion=1;
                                this.tituloModal = 'Registrar';
                                this.status= '';
                                this.description= '';
                                break;
                            }
                            case 'actualizar':
                            {
                                this.modal=1;
                                this.tipoAccion=2;
                                this.tituloModal='Actualizar';
                                this.status_id=data['id'];
                                this.status = data['status'];
                                this.description = data['description'];
                                break;
                            }
                        }
                    }
                }
            }
        },
        mounted() {
            this.listarStatuses();
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
