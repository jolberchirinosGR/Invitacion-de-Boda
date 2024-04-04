<template>
    <tr>
      <td>
        <i class="fas fa-star" style="color: goldenrod;" v-if="isMain(user)"></i>      
      </td>
      <td>
        {{ user.name }}
      </td>
      <td> 
        <i :class="getIconConfirm(user.confirm)" :style="getIconColor(user.confirm)"></i> 
      </td>      
      <td>
        <div class="d-flex justify-content-center">
          <button  @click="changeStatus(user)" type="button" class="btn btn-secondary mx-2">
            <i class="fas fa-sync mr-1"></i>
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
              user.confirm = user.confirm === 0 ? 1 : 0;
              user.confirm 
              ? showSuccessMessage(`¡${this.user.name} Ha confirmado su asistencia al evento!`)
              : showErrorMessage(`¡${this.user.name} Ha confirmado no poder asistir al evento!`);
;
            })
            .catch(error => {
              const errors = error.response.data.errors;
              showErrorGroupMessages(errors)
            });
        },
    },
  };
</script>