<template>
  <div class="container">

    <div class="card  text-center my-4">
      <div class="card-header bg-primary text-white">Recollector</div>
      <div class="card-body">
        <h5 class="card-title"> #TRK <span v-text="trk"></span></h5>
        <p class="card-text"> Estatus: <span v-text="status"></span> </p>
        <div v-if="error">
          <div class="alert alert-info">
            <i class="fa fa-info-circle"></i> <span v-text="error_msg"></span>
          </div>
        </div>
        <div v-else>
            <div v-if="entrega">
              <form v-on:submit.prevent action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group">
                  <label for="name_receiver">Nombre de quien Rrecibe:</label>
                  <input type='text' class="form-control" v-model="name_receiver" rows="3"></input>
                </div>

                <div class="form-group">
                  <label for="comentary">Comentario:</label>
                  <textarea class="form-control" v-model="comentary" rows="3"></textarea>
                </div>

                <div class="form-group">
                  <label for="image">Agregar imagen:</label>
                  <!--<input type="file" v-on:change="onImageChange" class="form-control">-->
                  <input class="form-control"  type="file" name="logo" @change="uploadImage">
                </div>
                <hr>
                <button type="button" class="btn btn-outline-primary" @click="updateShipment('intento')"> <li class="fa fa-clock"></li> Intento de entrega</button>
                <button type="button" class="btn btn-primary" @click="updateShipment('entrega')"> <li class="fa fa-paper-plane"></li> Entregada</button>
              </form>
            </div>
            <div v-else>
              <button type="button" class="btn btn-primary" @click="updateShipment('otro')"> <li class="fa fa-paper-plane"></li> {{txt_btn}}</button>
            </div>
        </div>
<!--
        <hr>

        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-9">
                  <input type="file" v-on:change="onImageChange" class="form-control">
              </div>
              <div class="col-md-3">
                 <button class="btn btn-success btn-block" @click="uploadImage">Upload Image</button>
              </div>
            </div>
          </div>
        </div>
-->
      </div><!--./card-body-->
    </div><!--./card-->

  </div>
</template>

<script>
    export default {
        props:['shipment_id'],
        data(){
            return {
                image:null,
                status:'',
                trk:'',
                entrega:0,
                txt_btn:'',
                accion:'',
                comentary:'',
                name_receiver:'',
                error:0,
                error_msg:''
            }
        },
        methods:{
          uploadImage(event) {
                this.image = event.target.files[0];
                console.log(this.image)
          },

          onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },

            /*uploadImage(){
                axios.post('/collector/image/store',{image: this.image, id:this.shipment_id}).then(response => {
                   console.log(response);
                });
            },*/

            loadShipment(){
              let me=this;
                var url= '/collector/get-shipment/'+me.shipment_id;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.status = respuesta.shipment.status.description;
                    me.trk = respuesta.shipment.tracking_number;
                    me.entrega = respuesta.entrega;
                    me.txt_btn = respuesta.txt_btn;
                    me.accion = respuesta.accion;
                    me.error = respuesta.error;
                    me.error_msg = respuesta.error_msg;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },

            updateShipment(btn_action){
              let me = this;
              const formData = new FormData();

              console.log('me.shipment_id:');
              console.log(me.shipment_id);
              console.log(me.accion);
              console.log(me.comentary);
              console.log(me.name_receiver);

              formData.append('shipment_id', me.shipment_id);
              formData.append('accion', btn_action);
              formData.append('comentary', me.comentary);
              formData.append('name_receiver', me.name_receiver);

              let image = this.image;
              if(image!=null){
                let imageType = image.type;
                if(imageType.indexOf('image/') === -1){
                    Swal.fire({
                      title: 'Error',
                      text: 'El archivo seleccionado no es una imagen',
                      icon: 'error',
                    });
                    return;
                }//if imageType
              }//if null
              formData.append('image', this.image);


              Swal.fire({
                  title: 'Cargando...',
                  onBeforeOpen: () => {
                    Swal.showLoading()
                  },
                  allowOutsideClick: false,
              });

              console.log('formData:');
              formData.forEach((value, key) => {
                  console.log(key, value);
              });

              axios.post('/collector/update-status-shipment',formData)
              .then(function (response) {
                  console.log(response);
                  Swal.close();
                  Swal.fire({
                        title: 'Exitoso',
                        text: 'El video ha sido guardado exitosamente',
                        icon: 'success',
                    });
                  window.location.href = '/collector';
              }).catch(function (error) {
                  console.log(error);
                  Swal.close();
                  Swal.fire({
                      title: 'Error',
                      text: 'Ha ocurrido un error al guardar el video',
                      icon: 'error',
                    });
              });
            }

        },
        mounted() {
            this.loadShipment()
        }
    }
</script>
