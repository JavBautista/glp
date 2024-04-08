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
              <div class="form-group">
                <label for="comentary">Comentario</label>
                <textarea class="form-control" v-model="comentary" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label for="image">Agregar imagen</label>
                <input type="file" v-on:change="onImageChange" class="form-control">
              </div>
              <hr>
              <button type="button" class="btn btn-outline-primary" @click="updateShipment('intento')"> <li class="fa fa-clock"></li> Intento de entrega</button>
              <button type="button" class="btn btn-primary" @click="updateShipment('entrega')"> <li class="fa fa-paper-plane"></li> Entregada</button>
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
                image:'',
                status:'',
                trk:'',
                entrega:0,
                txt_btn:'',
                accion:'',
                comentary:'',
                error:0,
                error_msg:''
            }
        },
        methods:{
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
            uploadImage(){
                axios.post('/collector/image/store',{image: this.image, id:this.shipment_id}).then(response => {
                   console.log(response);
                });
            },

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
              if (btn_action=='intento') me.accion = 'intento'
              else if(btn_action=='entrega') me.accion = 'entregada'
              axios.put('/collector/update-status-shipment',{
                  'shipment_id': me.shipment_id,
                  'accion': me.accion,
                  'comentary': me.comentary,
                  'image': me.image,
              }).then(function (response) {
                  window.location.href = '/collector';
              }).catch(function (error) {
                  console.log(error);
              });
            }
        },
        mounted() {
            this.loadShipment()
        }
    }
</script>
