<template>
<div>
   <div class="container-fluid my-4">
    <div v-show="error_store" class="alert alert-danger text-center my-2">
      <p><i class="fa fa-exclamation-triangle"></i> Error al guardar el envio: {{ error_store_msg }} </p>
    </div>
    <div v-show="error" class="form-group row div-error">
      <div class="container-fluid">
        <div class="alert alert-danger text-center">
            <div v-for="error in errorMostrarMsj" :key="error" v-text="error">
            </div>
        </div>
      </div>
    </div>
     <div class="row">
         <div class="col-md-10">
            <div class="card">
              <div class="card-header bg-dark text-white">Remitente</div>
              <div class="card-body">
                  <div class="row mb-2">
                      <div class="col">
                        <div class="btn-group float-right" role="group" aria-label="Opciones">
                          <button @click="abrirModal('directorio','remitente')" class="btn btn-outline-dark">Directorio</button>
                          <button @click="usarMisDatos()" class="btn btn-outline-dark">Usar mis datos</button>
                          <button @click="limpiarDatosRemitente()" class="btn btn-outline-dark">Limpiar</button>
                        </div>
                      </div>
                  </div>
                  <p class="card-text"><em><strong class="text text-danger">* Obligatorios</strong></em></p>
                  <div class="form-group row mt-2">
                      <label for="remitent_mail" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" v-model="remitent_mail" placeholder="">

                      </div>
                  </div>
                  <!-- ------------------------------------------------------------------------>
                  <div class="form-group row">
                      <label for="remitent_company" class="col-sm-3 col-form-label">Razon Social</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" v-model="remitent_company" placeholder="">

                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="remitent_name" class="col-sm-3 col-form-label">Nombre<span class="text-danger small">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" v-model="remitent_name" placeholder="" required>

                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="remitent_rfc" class="col-sm-3 col-form-label">RFC</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" v-model="remitent_rfc" placeholder="">

                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="remitent_phone" class="col-sm-3 col-form-label">Telefono<span class="text-danger small">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" v-model="remitent_phone" placeholder="" required>

                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="remitent_movil" class="col-sm-3 col-form-label">Movil<span class="text-danger small">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" v-model="remitent_movil" placeholder="" required>

                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="remitent_zip_code" class="col-sm-3 col-form-label">CP<span class="text-danger small">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" v-model="remitent_zip_code" placeholder="" required>

                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="remitent_address" class="col-sm-3 col-form-label">Calle<span class="text-danger small">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" v-model="remitent_address" placeholder="" required>

                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="remitent_number_out" class="col-sm-3 col-form-label">No Exterior<span class="text-danger small">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" v-model="remitent_number_out" placeholder="" required>

                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="remitent_number_int" class="col-sm-3 col-form-label">No Interior</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" v-model="remitent_number_int" placeholder="">

                      </div>
                  </div>


                  <div class="form-group row">
                      <label for="remitent_district" class="col-sm-3 col-form-label">Colonia<span class="text-danger small">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" v-model="remitent_district" placeholder="" required>

                      </div>
                  </div>



                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="select_estado">Estado</label>
                    <div class="col-sm-9">
                      <select class="form-control" v-model="select_estado_remitent" @change="onChangeEstadoRemitent()">
                          <option v-for="edo in arrayEstados" :key="edo.id" v-bind:value="{ id: edo.id, text: edo.nombre }" v-text="edo.nombre"></option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="remitent_city">Municipio</label>
                    <div class="col-sm-9">
                      <select class="form-control" v-model="remitent_city">
                          <option v-for="mun in arrayMunicipiosRemi" :key="mun.id" :value="mun.nombre" v-text="mun.nombre"></option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                      <label for="remitent_reference" class="col-sm-3 col-form-label">Referencia<span class="text-danger small">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" v-model="remitent_reference" placeholder="" required>

                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="remitent_detail" class="col-sm-3 col-form-label">Detalles<span class="text-danger small">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" v-model="remitent_detail" placeholder="" required>

                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="remitent_content" class="col-sm-3 col-form-label">Contenido<span class="text-danger small">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" v-model="remitent_content" placeholder="" required>
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="remitent_declared_value" class="col-sm-3 col-form-label">Valor Declarado<span class="text-danger small">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" v-model="remitent_declared_value" placeholder="" required>
                      </div>
                  </div>
              </div>
            </div>
         </div><!--.col-10-->

     </div><!--.row-->
     <div class="row">

         <div class="col-md-10">
            <div class="card">
              <div class="card-header bg-dark text-white">Destinatario</div>
              <div class="card-body">
                <div class="row">
                      <div class="col">
                          <div class="btn-group float-right" role="group" aria-label="Opciones">
                            <button @click="abrirModal('directorio','destinatario')" class="btn btn-outline-dark">Directorio</button>
                            <button @click="abrirModal('envios','')" class="btn btn-outline-dark">Destinos</button>
                            <button @click="invertirDatos()" class="btn btn-outline-dark">Invertir Datos</button>
                            <button @click="limpiarDatosDestinatario()" class="btn btn-outline-dark">Limpiar</button>
                          </div>
                      </div>
                </div>

                <section id="inputs-destino">
                  <p class="card-text"><em><strong class="text text-danger">* Obligatorios</strong></em></p>
                  <div class="form-group row">
                     <label for="destinatary_mail" class="col-sm-3 col-form-label">Email</label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" v-model="destinatary_mail"  placeholder="">
                     </div>
                  </div>
                  <!-- ------------------------------------------------------------------------>
                  <div class="form-group row">
                     <label destinatary_for="destinatary_company" class="col-sm-3 col-form-label">Razon Social</label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" v-model="destinatary_company"  placeholder="">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label destinatary_for="destinatary_name" class="col-sm-3 col-form-label">Nombre<span class="text-danger small">*</span></label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" v-model="destinatary_name"  placeholder="" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="destinatary_rfc" class="col-sm-3 col-form-label">RFC</label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" v-model="destinatary_rfc"  placeholder="">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="destinatary_department" class="col-sm-3 col-form-label">Departamento</label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" v-model="destinatary_department"  placeholder="">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label destinatary_for="phone" class="col-sm-3 col-form-label">Telefono<span class="text-danger small">*</span></label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" v-model="destinatary_phone"  placeholder="" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="destinatary_movil" class="col-sm-3 col-form-label">Movil<span class="text-danger small">*</span></label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" v-model="destinatary_movil"  placeholder="" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="destinatary_zip_code" class="col-sm-3 col-form-label">CP<span class="text-danger small">*</span></label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" v-model="destinatary_zip_code"  placeholder="" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="destinatary_address" class="col-sm-3 col-form-label">Calle<span class="text-danger small">*</span></label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" v-model="destinatary_address"  placeholder="" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="destinatary_number_out" class="col-sm-3 col-form-label">No Exterior<span class="text-danger small">*</span></label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" v-model="destinatary_number_out"  placeholder="" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="destinatary_number_int" class="col-sm-3 col-form-label">No Interior</label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" v-model="destinatary_number_int"  placeholder="">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="destinatary_district" class="col-sm-3 col-form-label">Colonia<span class="text-danger small">*</span></label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" v-model="destinatary_district"  placeholder="" required>
                     </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="select_estado">Estado</label>
                    <div class="col-sm-9">
                      <select class="form-control" v-model="select_estado_destinatary" @change="onChangeEstadoDestinatary()">
                          <option v-for="edo in arrayEstados" :key="edo.id" v-bind:value="{ id: edo.id, text: edo.nombre }" v-text="edo.nombre"></option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="destinatary_city">Municipio</label>
                    <div class="col-sm-9">
                      <select class="form-control" v-model="destinatary_city">
                          <option v-for="mun in arrayMunicipiosDest" :key="mun.id" :value="mun.nombre" v-text="mun.nombre"></option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                     <label for="destinatary_reference" class="col-sm-3 col-form-label">Referencia<span class="text-danger small">*</span></label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" v-model="destinatary_reference"  placeholder="" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="destinatary_detail" class="col-sm-3 col-form-label">Detalles<span class="text-danger small">*</span></label>
                     <div class="col-sm-9">
                       <input type="text" class="form-control" v-model="destinatary_detail"  placeholder="" required>
                     </div>
                  </div>
                </section><!--./inputs-destino-->

              </div>
            </div>
         </div><!--.col-10-->
     </div><!--.row-->
     <div class="container">
      <div class="card">
        <div class="card-body">
          <h3>Paquetes</h3>
          <hr>
          <button class="btn btn-dark" @click="modalAgregarPaquete()"> <i class="icon-plus"></i> Agregar Paquete</button>
          <table class="table mt-4">
            <thead>
              <tr>
                <th>Descripcion</th>
                <th>Qty</th>
                <th>Peso</th>
                <th>Long.</th>
                <th>Ancho</th>
                <th>Altura</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
             <tr v-for="paquete in paquetes" :key="paquete.id">
                <td v-text="paquete.descripcion"></td>
                <td v-text="paquete.cantidad"></td>
                <td v-text="paquete.peso"></td>
                <td v-text="paquete.longitud"></td>
                <td v-text="paquete.ancho"></td>
                <td v-text="paquete.altura"></td>
                <td><button class="btn btn-info btn-sm" @click="modalEditarPaquete(paquete.id)"><i class="fa fa-edit"></i></button></td>
                <td><button class="btn btn-danger btn-sm" @click="eliminarItemPaquete(paquete.id)"><i class="fa fa-trash"></i></button></td>
             </tr>
            </tbody>
          </table>
        </div>
      </div>
     </div>
     <button type="button" class="btn btn-primary btn-block mt-2" @click="storeEnvio()">Guardar</button>
   </div><!--container-->

    <!--Modal-->
    <div class="modal fade" tabindex="-1" :class="{'mostrar':modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-primary modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <i class="fa fa-align-justify"></i>&nbsp;<h5 class="modal-title" v-text="tituloModal"></h5>
              <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">
            <!--DIRECTORIO DE CIENTES-->
            <div v-if="tipoAccion==1">
              <div class="container">
                <div class="form-group row">
                  <div class="col-md-6">
                    <div class="input-group">
                      <select class="form-control col-md-4" v-model="criterio">
                        <option value="name">Nombre</option>
                        <option value="address">Dirección</option>
                        <option value="zip_code">CP</option>
                        <option value="phone">Teléfono</option>
                        <option value="movil">Móvil</option>
                      </select>
                      <input type="text" v-model="buscar" @keyup.enter="loadDirectorioClientes(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                      <button type="submit" @click="loadDirectorioClientes(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                  </div>
                </div>
                <table class="table table-bordered table-striped table-sm">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Direccion</th>
                      <th>CP</th>
                      <th>Teléfono</th>
                      <th>Movil</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="dstn in arrayDirectorioClientes " :key="dstn.id">
                      <td>{{dstn.name}} {{dstn.last_name}} {{dstn.second_last_name}}</td>
                      <td v-text="dstn.address "></td>
                      <td v-text="dstn.zip_code"></td>
                      <td v-text="dstn.phone"></td>
                      <td v-text="dstn.movil"></td>
                      <td><button class="btn btn-primary btn-sm" @click="seleccionarDestino(dstn,1)"><i class="fa fa-check"></i></button></td>
                    </tr>
                  </tbody>
                </table>
                <nav>
                  <ul class="pagination">
                    <li class="page-item" v-if="pagination.current_page > 1">
                        <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                    </li>
                    <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                        <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                    </li>
                    <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                        <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
            <!--./DIRECTORIO DE CIENTES -->

            <!--DESTINOS (Envios pasados) guardados -->
            <div v-if="tipoAccion==2">
              <div class="container">
                <div class="form-group row">
                  <div class="col-md-6">
                    <div class="input-group">
                      <select class="form-control col-md-4" v-model="criterio">
                        <option value="name">Nombre</option>
                        <option value="address">Dirección</option>
                        <option value="zip_code">CP</option>
                        <option value="phone">Teléfono</option>
                        <option value="movil">Móvil</option>
                      </select>
                      <input type="text" v-model="buscar" @keyup.enter="loadDestinos(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                      <button type="submit" @click="loadDestinos(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                  </div>
                </div>
                <table class="table table-bordered table-striped table-sm">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Direccion</th>
                      <th>CP</th>
                      <th>Teléfono</th>
                      <th>Movil</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="dstn in arrayDestinos" :key="dstn.id">
                      <td v-text="dstn.name"></td>
                      <td v-text="dstn.address "></td>
                      <td v-text="dstn.zip_code"></td>
                      <td v-text="dstn.phone"></td>
                      <td v-text="dstn.movil"></td>
                      <td><button class="btn btn-primary btn-sm" @click="seleccionarDestino(dstn,0)"><i class="fa fa-check"></i></button></td>
                    </tr>
                  </tbody>
                </table>
                <nav>
                  <ul class="pagination">
                    <li class="page-item" v-if="pagination.current_page > 1">
                        <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                    </li>
                    <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                        <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                    </li>
                    <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                        <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
            <!--./ DESTINOS (Envios pasados) guardados  -->


            <!--MODAL PARA PAQUETES -->
            <div v-else-if="tipoAccion==3 || tipoAccion==4">
              <h2>Paquetes</h2>

              <div class="form-group">
                <label for="paquete_descripcion">Dscripcion del paquete</label>
                <input type="text" class="form-control" v-model="paquete_descripcion">
              </div>

              <div class="form-row">
                <div class="col">
                  <label for="paquete_cantidad">Cantidad</label>
                  <input type="nomber" min="0" step="1" class="form-control" v-model="paquete_cantidad">
                </div>
                <div class="col">
                  <label for="paquete_peso">Peso</label>
                  <input type="nomber" min="0" step="any" class="form-control" v-model="paquete_peso">
                </div>
              </div>

              <h4>Medidas</h4>

              <div class="form-row">
                <div class="col">
                  <label for="paquete_longitud">Longitud</label>
                  <input type="nomber" min="0" step="any" class="form-control" v-model="paquete_longitud" placeholder="">
                </div>
                <div class="col">
                  <label for="paquete_ancho">Ancho</label>
                  <input type="nomber" min="0" step="any" class="form-control" v-model="paquete_ancho" placeholder="">
                </div>
                <div class="col">
                  <label for="paquete_altura">Altura</label>
                  <input type="nomber" min="0" step="any" class="form-control" v-model="paquete_altura" placeholder="">
                </div>
              </div>
            </div>
            <!--./MODAL PARA PAQUETES -->
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary"  @click="cerrarModal()">Cerrar</button>
              <button type="button" v-if="tipoAccion==3" class="btn btn-primary" @click="agregarPaquete()"> <i class="icon-plus"></i> Agregar</button>
              <button type="button" v-if="tipoAccion==4" class="btn btn-primary" @click="editarPaquete()"> <i class="icon-refresh"></i> Actualizar</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!--./Modal-->




  </div>
</template>

<script>
    export default {
        data(){
            return {
              select_estado_remitent:{},
              select_estado_destinatary:{},
              arrayEstados:[],
              arrayMunicipiosRemi:[],
              arrayMunicipiosDest:[],
              arrayDestinos:[],
              arrayDirectorioClientes:[],

              remitent_mail:'',
              remitent_company:'',
              remitent_name:'',
              remitent_rfc:'',
              remitent_phone:'',
              remitent_movil:'',
              remitent_zip_code:'',
              remitent_address:'',
              remitent_number_out:'',
              remitent_number_int:'',
              remitent_district:'',
              remitent_city:'',
              remitent_state:'',

              remitent_reference:'',
              remitent_detail:'',
              remitent_content:'',
              remitent_declared_value:'',
              destinatary_mail:'',
              destinatary_company:'',
              destinatary_name:'',
              destinatary_rfc:'',
              destinatary_department:'',
              destinatary_phone:'',
              destinatary_movil:'',
              destinatary_zip_code:'',
              destinatary_address:'',
              destinatary_number_out:'',
              destinatary_number_int:'',
              destinatary_district:'',
              destinatary_city:'',
              destinatary_state:'',

              destinatary_reference:'',
              destinatary_detail:'',

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
              criterio:'name',

              error_store:0,
              error_store_msg:'',
              modal:0,
              tituloModal:'',
              error:0,
              errorMostrarMsj:[],
              tipoAccion:0,
              origenDirectorio:'',

              paquete_descripcion:'',
              paquete_cantidad:0,
              paquete_peso:0,
              paquete_longitud:0,
              paquete_ancho:0,
              paquete_altura:0,
              paquete_id:null,
              paquetes:[],
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
            onChangeEstadoRemitent(){
              let me=this
              me.remitent_state=me.select_estado_remitent.text;
              me.getMunicipio('remi',me.select_estado_remitent.id)
            },
            onChangeEstadoDestinatary(){
              let me=this
              me.destinatary_state=me.select_estado_destinatary.text;
              me.getMunicipio('dest',me.select_estado_destinatary.id)
            },
            getMunicipio(tipo,id){
                let me=this;
                var url = '/municipio/get/'+id
                axios.get(url).then(function (response) {
                    if(tipo=='remi')
                      me.arrayMunicipiosRemi= response.data;
                    else
                      me.arrayMunicipiosDest= response.data;
                })
                .catch(function (error) {
                // handle error
                console.log(error);
                })
                .finally(function () {
                // always executed
                });
            },
            usarMisDatos(){
               let me=this;
                var url = '/customer/get/my-info'
                axios.get(url).then(function (response) {
                     me.remitent_mail= response.data.mail
                     me.remitent_company= response.data.company
                     me.remitent_name= response.data.name
                     me.remitent_rfc= response.data.rfc
                     me.remitent_phone= response.data.phone
                     me.remitent_movil= response.data.movil
                     me.remitent_zip_code= response.data.zip_code
                     me.remitent_address= response.data.address
                     me.remitent_number_out= response.data.number_out
                     me.remitent_number_int= response.data.number_int
                     me.remitent_district= response.data.district

                     me.remitent_state= response.data.state
                      for (var i = me.arrayEstados.length - 1; i >= 0; i--) {
                          if(me.arrayEstados[i].nombre==me.remitent_state){
                              me.select_estado_remitent.text = me.arrayEstados[i].nombre;
                              me.select_estado_remitent.id = me.arrayEstados[i].id;
                              me.getMunicipio('remi',me.arrayEstados[i].id)
                          }
                      }
                     me.remitent_city= response.data.city

                     me.remitent_reference= response.data.reference
                     me.remitent_detail= response.data.detail
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
                     me.arrayEstados = response.data;
                })
                .catch(function (error) {
                // handle error
                console.log(error);
                })
                .finally(function () {
                // always executed
                });
            },
            seleccionarDestino(destinatario=[],directorio){
              let me = this

              if(directorio && me.origenDirectorio=='remitente'){
                console.log('Cargar a Remitente')
                me.remitent_mail= destinatario['mail'];
                me.remitent_company= destinatario['company'];
                if(directorio){
                  let last_name         = destinatario['last_name']?destinatario['last_name']:'';
                  let second_last_name  = destinatario['last_name']?destinatario['last_name']:'';
                  me.remitent_name= destinatario['name']+' '+last_name+' '+second_last_name;
                  me.remitent_name= me.remitent_name.trim();
                }else
                  me.remitent_name= destinatario['name'];
                me.remitent_rfc= destinatario['rfc'];
                //me.remitent_department= destinatario['department'];
                me.remitent_phone= destinatario['phone'];
                me.remitent_movil= destinatario['movil'];
                me.remitent_zip_code= destinatario['zip_code'];
                me.remitent_address= destinatario['address'];
                me.remitent_number_out= destinatario['number_out'];
                me.remitent_number_int= destinatario['number_int'];
                me.remitent_district= destinatario['district'];

                me.remitent_state= destinatario['state'];
                  for (var i = me.arrayEstados.length - 1; i >= 0; i--) {
                      if(me.arrayEstados[i].nombre==me.remitent_state){
                          me.select_estado_remitent.text = me.arrayEstados[i].nombre;
                          me.select_estado_remitent.id = me.arrayEstados[i].id;
                          me.getMunicipio('remi',me.arrayEstados[i].id)
                      }
                  }
                 me.remitent_city= destinatario['city'];

                 me.remitent_reference= destinatario['reference'];
                 me.remitent_detail= destinatario['detail'];

              }else{
                console.log('Cargar a Destino')
                me.destinatary_mail= destinatario['mail'];
                me.destinatary_company= destinatario['company'];
                if(directorio){
                  let last_name         = destinatario['last_name']?destinatario['last_name']:'';
                  let second_last_name  = destinatario['last_name']?destinatario['last_name']:'';
                  me.destinatary_name= destinatario['name']+' '+last_name+' '+second_last_name;
                  me.destinatary_name= me.destinatary_name.trim();
                }else
                  me.destinatary_name= destinatario['name'];
                me.destinatary_rfc= destinatario['rfc'];
                me.destinatary_department= destinatario['department'];
                me.destinatary_phone= destinatario['phone'];
                me.destinatary_movil= destinatario['movil'];
                me.destinatary_zip_code= destinatario['zip_code'];
                me.destinatary_address= destinatario['address'];
                me.destinatary_number_out= destinatario['number_out'];
                me.destinatary_number_int= destinatario['number_int'];
                me.destinatary_district= destinatario['district'];

                me.destinatary_state= destinatario['state'];
                  for (var i = me.arrayEstados.length - 1; i >= 0; i--) {
                      if(me.arrayEstados[i].nombre==me.destinatary_state){
                          me.select_estado_destinatary.text = me.arrayEstados[i].nombre;
                          me.select_estado_destinatary.id = me.arrayEstados[i].id;
                          me.getMunicipio('dest',me.arrayEstados[i].id)
                      }
                  }
                 me.destinatary_city= destinatario['city'];

                 me.destinatary_reference= destinatario['reference'];
                 me.destinatary_detail= destinatario['detail'];

              }
               me.modal=0;
               me.tituloModal='';
            },
            limpiarDatosRemitente(){
               let me=this;
               me.remitent_mail=''
               me.remitent_company=''
               me.remitent_name=''
               me.remitent_rfc=''
               me.remitent_phone=''
               me.remitent_movil=''
               me.remitent_zip_code=''
               me.remitent_address=''
               me.remitent_number_out=''
               me.remitent_number_int=''
               me.remitent_district=''
               me.remitent_city=''
               me.remitent_state=''
               me.remitent_reference=''
               me.remitent_detail=''
               me.remitent_content=''
               me.remitent_declared_value=''
            },
            invertirDatos(){
               let me=this;
                var tmp_rmt_mail        = me.remitent_mail
                var tmp_rmt_company     = me.remitent_company
                var tmp_rmt_name        = me.remitent_name
                var tmp_rmt_rfc         = me.remitent_rfc
                var tmp_rmt_phone       = me.remitent_phone
                var tmp_rmt_movil       = me.remitent_movil
                var tmp_rmt_zip_code    = me.remitent_zip_code
                var tmp_rmt_address     = me.remitent_address
                var tmp_rmt_number_out  = me.remitent_number_out
                var tmp_rmt_number_int  = me.remitent_number_int
                var tmp_rmt_district    = me.remitent_district
                var tmp_rmt_city        = me.remitent_city
                var tmp_rmt_state       = me.remitent_state
                var tmp_rmt_reference   = me.remitent_reference
                var tmp_rmt_detail      = me.remitent_detail
                //var tmp_rmt_content     = me.remitent_content
                //var tmp_rmt_declared_value  = me.remitent_declared_value
                //------------------------------------------------------

                 var tmp_dst_mail         = me.destinatary_mail
                 var tmp_dst_company      = me.destinatary_company
                 var tmp_dst_name         = me.destinatary_name
                 var tmp_dst_rfc          = me.destinatary_rfc
                 var tmp_dst_phone        = me.destinatary_phone
                 var tmp_dst_movil        = me.destinatary_movil
                 var tmp_dst_zip_code     = me.destinatary_zip_code
                 var tmp_dst_address      = me.destinatary_address
                 var tmp_dst_number_out   = me.destinatary_number_out
                 var tmp_dst_number_int   = me.destinatary_number_int
                 var tmp_dst_district     = me.destinatary_district
                 var tmp_dst_city         = me.destinatary_city
                 var tmp_dst_state        = me.destinatary_state
                 var tmp_dst_reference    = me.destinatary_reference
                 var tmp_dst_detail       = me.destinatary_detail
                 //var tmp_dst_department   = me.destinatary_department
                 //var tmp_dst_weight       = me.destinatary_weight
                 //var tmp_dst_unit_measure = me.destinatary_unit_measure

                 //-------------------------------------------------------

                 me.remitent_mail       = tmp_dst_mail
                 me.remitent_company    = tmp_dst_company
                 me.remitent_name       = tmp_dst_name
                 me.remitent_rfc        = tmp_dst_rfc
                 me.remitent_phone      = tmp_dst_phone
                 me.remitent_movil      = tmp_dst_movil
                 me.remitent_zip_code   = tmp_dst_zip_code
                 me.remitent_address    = tmp_dst_address
                 me.remitent_number_out = tmp_dst_number_out
                 me.remitent_number_int = tmp_dst_number_int
                 me.remitent_district   = tmp_dst_district

                 me.remitent_state      = tmp_dst_state
                for (var i = me.arrayEstados.length - 1; i >= 0; i--) {
                    if(me.arrayEstados[i].nombre==me.remitent_state){
                        me.select_estado_remitent.text = me.arrayEstados[i].nombre;
                        me.select_estado_remitent.id = me.arrayEstados[i].id;
                        me.getMunicipio('remi',me.arrayEstados[i].id)
                    }
                }
                me.remitent_city       = tmp_dst_city

                 me.remitent_reference  = tmp_dst_reference
                 me.remitent_detail     = tmp_dst_detail

                 me.destinatary_mail       = tmp_rmt_mail
                 me.destinatary_company    = tmp_rmt_company
                 me.destinatary_name       = tmp_rmt_name
                 me.destinatary_rfc        = tmp_rmt_rfc
                 me.destinatary_phone      = tmp_rmt_phone
                 me.destinatary_movil      = tmp_rmt_movil
                 me.destinatary_zip_code   = tmp_rmt_zip_code
                 me.destinatary_address    = tmp_rmt_address
                 me.destinatary_number_out = tmp_rmt_number_out
                 me.destinatary_number_int = tmp_rmt_number_int
                 me.destinatary_district   = tmp_rmt_district

                 me.destinatary_state      = tmp_rmt_state
                 for (var i = me.arrayEstados.length - 1; i >= 0; i--) {
                    if(me.arrayEstados[i].nombre==me.destinatary_state){
                        me.select_estado_destinatary.text = me.arrayEstados[i].nombre;
                        me.select_estado_destinatary.id = me.arrayEstados[i].id;
                        me.getMunicipio('dest',me.arrayEstados[i].id)
                    }
                }
                 me.destinatary_city       = tmp_rmt_city

                 me.destinatary_reference  = tmp_rmt_reference
                 me.destinatary_detail     = tmp_rmt_detail
            },
            limpiarDatosDestinatario(){
               let me=this;
               me.destinatary_mail=''
               me.destinatary_company=''
               me.destinatary_name=''
               me.destinatary_rfc=''
               me.destinatary_department=''
               me.destinatary_phone=''
               me.destinatary_movil=''
               me.destinatary_zip_code=''
               me.destinatary_address=''
               me.destinatary_number_out=''
               me.destinatary_number_int=''
               me.destinatary_district=''
               me.destinatary_city=''
               me.destinatary_state=''
               me.destinatary_reference=''
               me.destinatary_detail=''
            },
            cambiarPagina(page,buscar,criterio){
              let me = this;
              me.pagination.current_page = page;
              me.loadDestinos(page,buscar,criterio);
            },
            validarDatosEnvio(){
              this.error=0;
              this.errorMostrarMsj=[];

              if (!this.paquetes.length) this.errorMostrarMsj.push('Debe agregar al menos un paquete al envio.');

              if (!this.remitent_name) this.errorMostrarMsj.push('El nombre del remitente no puede estar vacio ');
              if (!this.remitent_phone) this.errorMostrarMsj.push('El teléfono del remitente no puede estar vacio ');
              if (!this.remitent_movil) this.errorMostrarMsj.push('El movil del remitente no puede estar vacio ');
              if (!this.remitent_zip_code) this.errorMostrarMsj.push('El CP del remitente no puede estar vacio ');
              if (!this.remitent_address) this.errorMostrarMsj.push('La calle del remitente no puede estar vacio ');
              if (!this.remitent_number_out) this.errorMostrarMsj.push('El número exterior del remitente no puede estar vacio ');
              if (!this.remitent_district) this.errorMostrarMsj.push('La colonia del remitente no puede estar vacio ');
              if (!this.remitent_city) this.errorMostrarMsj.push('La ciudad del remitente no puede estar vacio ');
              if (!this.remitent_state) this.errorMostrarMsj.push('El estado del remitente no puede estar vacio ');
              if (!this.remitent_reference) this.errorMostrarMsj.push('La referencia del remitente no puede estar vacio ');
              if (!this.remitent_detail) this.errorMostrarMsj.push('El detalle del remitente no puede estar vacio ');
              if (!this.remitent_content) this.errorMostrarMsj.push('El contenido del remitente no puede estar vacio ');
              if (!this.remitent_declared_value) this.errorMostrarMsj.push('El valor declarado del remitente no puede estar vacio ');
              if (!this.destinatary_name) this.errorMostrarMsj.push('El nombre del destinatario no puede estar vacio ');
              if (!this.destinatary_phone) this.errorMostrarMsj.push('El teléfono del destinatario no puede estar vacio ');
              if (!this.destinatary_movil) this.errorMostrarMsj.push('El movil del destinatario no puede estar vacio ');
              if (!this.destinatary_zip_code) this.errorMostrarMsj.push('El CP del destinatario no puede estar vacio ');
              if (!this.destinatary_address) this.errorMostrarMsj.push('La calle del destinatario no puede estar vacio ');
              if (!this.destinatary_number_out) this.errorMostrarMsj.push('El número exterior del destinatario no puede estar vacio ');
              if (!this.destinatary_district) this.errorMostrarMsj.push('La colonia del destinatario no puede estar vacio ');
              if (!this.destinatary_city) this.errorMostrarMsj.push('La ciudad del destinatario no puede estar vacio ');
              if (!this.destinatary_state) this.errorMostrarMsj.push('El estado del destinatario no puede estar vacio ');
              if (!this.destinatary_reference) this.errorMostrarMsj.push('La referencia del destinatario no puede estar vacio ');
              if (!this.destinatary_detail) this.errorMostrarMsj.push('El detalle del destinatario no puede estar vacio ');
              if(this.errorMostrarMsj.length) this.error=1;
              return this.error;
            },
            storeEnvio(){
                if(this.validarDatosEnvio()){
                    return;
                }

                let me=this;
                me.error_store=0;
                me.error_store_msg='';
                axios.post('/customer/shipment/store',{
                  'remitent_mail':me.remitent_mail,
                  'remitent_company':me.remitent_company,
                  'remitent_name':me.remitent_name,
                  'remitent_rfc':me.remitent_rfc,
                  'remitent_phone':me.remitent_phone,
                  'remitent_movil':me.remitent_movil,
                  'remitent_zip_code':me.remitent_zip_code,
                  'remitent_address':me.remitent_address,
                  'remitent_number_out':me.remitent_number_out,
                  'remitent_number_int':me.remitent_number_int,
                  'remitent_district':me.remitent_district,
                  'remitent_city':me.remitent_city,
                  'remitent_state':me.remitent_state,
                  'remitent_reference':me.remitent_reference,
                  'remitent_detail':me.remitent_detail,
                  'remitent_content':me.remitent_content,
                  'remitent_declared_value':me.remitent_declared_value,
                  'destinatary_mail':me.destinatary_mail,
                  'destinatary_company':me.destinatary_company,
                  'destinatary_name':me.destinatary_name,
                  'destinatary_rfc':me.destinatary_rfc,
                  'destinatary_department':me.destinatary_department,
                  'destinatary_phone':me.destinatary_phone,
                  'destinatary_movil':me.destinatary_movil,
                  'destinatary_zip_code':me.destinatary_zip_code,
                  'destinatary_address':me.destinatary_address,
                  'destinatary_number_out':me.destinatary_number_out,
                  'destinatary_number_int':me.destinatary_number_int,
                  'destinatary_district':me.destinatary_district,
                  'destinatary_city':me.destinatary_city,
                  'destinatary_state':me.destinatary_state,
                  'destinatary_reference':me.destinatary_reference,
                  'destinatary_detail':me.destinatary_detail,
                  'paquetes':me.paquetes,
                }).then(function (response){
                  window.location.href = '/customer';
                }).catch(function (error){
                    me.error_store=1;
                    me.error_store_msg=error;

                });
            },
            loadDestinos(page,buscar,criterio){
              let me=this;
              me.arrayDestinos=[];
              var url = '/customer/get/destinos?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
              axios.get(url).then(function (response) {
                  var respuesta= response.data;
                  me.arrayDestinos = respuesta.destinos.data;
                  me.pagination= respuesta.pagination;
                 console.log(me.arrayDestinos)
              })
              .catch(function (error) {
              // handle error
              console.log(error);
              })
              .finally(function () {
              // always executed
              });
            },
            loadDirectorioClientes(page,buscar,criterio){
              let me=this;
              me.arrayDirectorioClientes=[];
              var url = '/customer/get/clients?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
              axios.get(url).then(function (response) {
                  var respuesta= response.data;
                  me.arrayDirectorioClientes = respuesta.clients.data;
                  me.pagination= respuesta.pagination;
                 console.log(me.arrayDirectorioClientes)
              })
              .catch(function (error) {
              // handle error
              console.log(error);
              })
              .finally(function () {
              // always executed
              });
            },
            agregarPaquete(){
              var paquete={
                'id':0,
                'descripcion':'',
                'cantidad':0,
                'peso':0,
                'longitud':0,
                'ancho':0,
                'altura':0
              }
              var items = this.paquetes.length
              var new_id=items++;
              paquete.id = new_id
              paquete.descripcion = this.paquete_descripcion
              paquete.cantidad = this.paquete_cantidad
              paquete.peso = this.paquete_peso
              paquete.longitud = this.paquete_longitud
              paquete.ancho = this.paquete_ancho
              paquete.altura = this.paquete_altura

              this.paquetes.push(paquete)
              this.cerrarModal()
            },
            editarPaquete(){

              let temp_paquete={
                'id':0,
                'descripcion':'',
                'cantidad':0,
                'peso':0,
                'longitud':0,
                'ancho':0,
                'altura':0
              }
              this.paquetes[this.paquete_id].id   = this.paquete_id
              this.paquetes[this.paquete_id].descripcion = this.paquete_descripcion
              this.paquetes[this.paquete_id].cantidad = this.paquete_cantidad
              this.paquetes[this.paquete_id].peso = this.paquete_peso
              this.paquetes[this.paquete_id].longitud = this.paquete_longitud
              this.paquetes[this.paquete_id].ancho = this.paquete_ancho
              this.paquetes[this.paquete_id].altura = this.paquete_altura

              this.cerrarModal()
            },
            eliminarItemPaquete(item){
              var temp_paquetes = this.paquetes
              temp_paquetes.splice(item, 1);
              this.paquetes = temp_paquetes

              let num_items =this.paquetes.length

              this.paquetes.forEach(function(paquete, index) {
                  paquete.id = index;
              });

              //console.log(this.paquetes)

            },

            abrirModal(directorio,origen){
              this.modal=1;
              if(directorio == 'directorio'){
                this.origenDirectorio = origen
                this.loadDirectorioClientes(1,this.buscar,this.criterio);
                this.tituloModal='Directorio de Clientes';
                this.tipoAccion=1;
                console.log(origen)
              }else{
                this.loadDestinos(1,this.buscar,this.criterio);
                this.tituloModal='Envios Pasados';
                this.tipoAccion=2;
              }
            },
            modalAgregarPaquete(){
              this.paquete_descripcion=''
              this.paquete_cantidad=0
              this.paquete_peso=0
              this.paquete_longitud=0
              this.paquete_ancho=0
              this.paquete_altura=0
              this.paquete_id=null
              this.modal=1;
              this.tipoAccion=3;
              this.tituloModal='Agregar Paquete';
            },
            modalEditarPaquete(item){
              let paquete = this.paquetes[item]
              this.paquete_descripcion= paquete.descripcion
              this.paquete_cantidad= paquete.cantidad
              this.paquete_peso= paquete.peso
              this.paquete_longitud= paquete.longitud
              this.paquete_ancho= paquete.ancho
              this.paquete_altura= paquete.altura
              this.paquete_id= paquete.id
              this.modal=1;
              this.tipoAccion=4;
              this.tituloModal='Editar Paquete';
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
            },

        },
        mounted() {
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
