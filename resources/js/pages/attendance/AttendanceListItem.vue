<template>
    <tr>
      <td>
        <i class="fas fa-star" style="color: goldenrod;" v-if="isMain(user)"></i>      
      </td>
      <td>
        {{ user.name }}
      </td>
      <td v-if="type === 'Attendance'">
        <i :class="getIconConfirm(user.confirm)" :style="getIconColor(user.confirm)"></i> 
      </td>    
      <td v-if="type === 'Arrival'">
        {{ formatTime(user.arrival) }}
      </td>    

      <td v-if="type === 'Attendance'">
        <div class="d-flex justify-content-center">
          <button  @click="changeStatus(user)" type="button" class="btn btn-secondary mx-2">
            <i class="fas fa-sync mr-1"></i>
          </button>
        </div>
      </td>

      <td v-if="type === 'Arrival'  && user.arrival == null">
        <div class="d-flex justify-content-center">
          <button  @click="changeArrival(user)" type="button" class="btn btn-success mx-2">
            <i class="fas fa-check mr-1"></i>
          </button>
        </div>
      </td>
    </tr>
</template>
  
<script>
import { showSuccessMessage, showErrorMessage, showErrorGroupMessages, useSweetAlert }  from '../../sweet.js';

  export default {
    emits: ['change-status'], //Eventos que se generan en este componente
    components: {
    },
    props: {
      user: Object,
      type: String,
    },
    data() {
      return {
        userData: this.user,
        rolesAll: [],
      };
    },
    created() {
    },
    watch: {
      user(newUser) {
        this.userData = newUser;
      },
    },
    methods: {
        //Buscar icono para confirmados
        getIconConfirm(confirm){
          return confirm ? "fa fa-check-circle mr-1" : "fa fa-times-circle mr-1" ;
        },

        getIconColor(confirm){
          return confirm ? "color: green; font-size: 20px;" : "color:red; font-size: 20px;" ;
        },

        isMain(){
          if (this.user.responsables) {
            return this.user.responsables.length > 0;
          }else{
            return false;
          }
        },

        //Funcion para actualizar
        changeStatus(user) {
            axios.get(`/web/users/change_status/${user.id}`).then(response => {
              //Cambiar icono
              user.confirm = user.confirm === 0 ? 1 : 0;

              //Mostar mensaje
              user.confirm 
              ? showSuccessMessage(`¡${this.user.name} Ha confirmado su asistencia al evento!`)
              : showErrorMessage(`¡${this.user.name} Ha confirmado no poder asistir al evento!`);
            })
            .catch(error => {
              const errors = error.response.data.errors;
              showErrorGroupMessages(errors)
            });
        },

        //Funcion para actualizar
        changeArrival(user) {
            axios.get(`/web/users/change_arrival/${user.id}`).then(response => {

              //Transformar la hora en la de venezuela
              const serverArrivalTime = new Date(response.data.arrival);
              const venezuelaArrivalTime = new Date(serverArrivalTime.getTime() - (6 * 60 * 60 * 1000));
              const arrivalTime = venezuelaArrivalTime.toLocaleTimeString(["en-US"], { hour: '2-digit', minute: '2-digit' });

              user.arrival = arrivalTime; //Mostrar hora
              showSuccessMessage(`¡${this.user.name} Llegada al evento confirmada!`) //Mostar mensaje
            })
            .catch(error => {
              const errors = error.response.data.errors;
              showErrorGroupMessages(errors)
            });
        },

        // Función para formatear la hora a formato AM/PM
        formatTime(timeString) {
          if (!timeString) return ''; // Retornar cadena vacía si no hay hora

          const time = new Date(`01/01/2020 ${timeString}`); // Crear una fecha para poder formatear la hora
          return time.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', hour12: true });
        },
    },
  };
</script>