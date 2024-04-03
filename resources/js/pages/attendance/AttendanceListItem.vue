<template>
    <tr>
      <td>{{ responsable.name }}</td>
      <td> <i :class="getIconConfirm(responsable.confirm)" :style="getIconColor(responsable.confirm)"></i> </td>      
      <td>
        <div class="d-flex justify-content-center">
          <button type="button" class="btn btn-secondary mx-2">
            <i class="fas fa-sync mr-1"></i>
          </button>
        </div>
      </td>
    </tr>
</template>
  
<script>
  export default {
    emits: ['open-update-user', 'open-delete-user'], //Eventos que se generan en este componente
    components: {
    },
    props: {
      responsable: Object,
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
      responsable(newUser) {
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
        }
    },
  };
</script>