<template>
    <div class="container">
      <h3>Selecciona una fecha:</h3>
  
      <date-picker
        v-model:value="fechaSeleccionada"
        type="date"
        format="YYYY-MM-DD"
        value-type="format"  
        :lang="es"
        @change="onChange"
      ></date-picker>
  
      <!-- 🔥 Agregamos manualmente un input para verificar que Vue sí recibe la fecha -->
      <input type="text" v-model="fechaSeleccionada" class="form-control mt-3" />
  
      <p><strong>Fecha seleccionada:</strong> {{ fechaSeleccionada }}</p>
    </div>
  </template>
  
  <script>
  import DatePicker from "vue-datepicker-next";
  import "vue-datepicker-next/index.css";
  import es from "vue-datepicker-next/locale/es";
  
  export default {
    components: {
      DatePicker,
    },
    data() {
      return {
        es, 
        fechaSeleccionada: new Date().toISOString().split("T")[0], //  Forzar formato "YYYY-MM-DD"
      };
    },
    methods: {
      onChange(value) {
        console.log("Fecha seleccionada:", value);
        this.fechaSeleccionada = value; // Esto asegurará que el valor se refleje en el input
      },
    },
  };
  </script>
  
  <style scoped>
  .container {
    padding: 20px;
    max-width: 400px;
    margin: auto;
    text-align: center;
  }
  </style>
  