<template>
    <tr>
      <td>{{ userData.name }}</td>
      <td>{{ userData.phone }}</td>
      <td class="text-center"> <i :class="getIconConfirm(userData.confirm)" :style="getIconColor(userData.confirm)"></i> </td>      
      <td>{{ getRoleName(userData.id_role) }}</td>
      <td>
        <div class="d-flex justify-content-center">
          <button @click="editModalUser(user)" type="button" class="btn btn-success mx-2">
            <i class="fa fa-edit mr-1"></i>
          </button>
          <button @click="deleteModalUser(user)" type="button" class="btn btn-danger mx-2">
            <i class="fa fa-trash mr-1"></i>
          </button>

        </div>
      </td>
    </tr>
</template>
  
<script>
import UserModals from './UserModals.vue';

  export default {
    emits: ['open-update-user', 'open-delete-user'], //Eventos que se generan en este componente
    components: {
      UserModals,
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
      this.getRoles();
    },
    watch: {
      user(newUser) {
        this.userData = newUser;
      },
    },
    methods: {
      //Obtener todas los Roles
        getRoles(){
          axios.get('/web/roles').then((response) => {
              this.rolesAll = response.data;
          })
        },

      //Obtener el nombre del rol 
        getRoleName(roleId) {
          const role = this.rolesAll.find(role => role.id === roleId);
          return role ? role.name : 'Rol no encontrado';
        },

      // Método para abrir el modal de edición
        editModalUser(user) {
          this.$emit('open-update-user', user);
        },
      // Método para abrir el modal de eliminación
        deleteModalUser(user) {
          this.$emit('open-delete-user', user);
        },
      //Obtener fecha en formato carbon
        getDate(date) {
          const d = new Date(date);
          const day = String(d.getDate()).padStart(2, '0'); // Ajusta el día a dos dígitos
          const month = String(d.getMonth() + 1).padStart(2, '0'); // Ajusta el mes a dos dígitos
          const year = d.getFullYear();
          return `${day}-${month}-${year}`;
        },
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