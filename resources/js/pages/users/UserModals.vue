<template>
    <!-- Modal de edicion y creacion de Usuario -->
    <div class="modal fade" id="userModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" :class="update ?'bg-success text-white':'bg-primary text-white'">
                    <h5 v-if="update" class="modal-title" id="staticBackdropLabel">
                        <i class="fa fa-edit"></i> Editar usuario
                    </h5>
                    <h5 v-else class="modal-title" id="staticBackdropLabel">
                        <i class="fa fa-plus-circle mr-1"></i> Nuevo usuario
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
			       		<label for="name">Nombre</label>
			       		<input v-model="user.name" type="text" class="form-control" id="name" placeholder="Nombre" name="" autocomplete="off">
                    </div>

                    <div class="modal-body">
			       		<label for="phone">Teléfono</label>
			       		<input v-model="user.phone" type="text" class="form-control" id="phone" placeholder="Nombre" name="" autocomplete="off">
                    </div>

                    <div class="modal-body">
                        <input v-model="user.confirm" type="checkbox">
                        <label for="checkbox"> Confirmar asistencia</label>
                    </div>

                    <div class="modal-body">
			       		<label for="arrival">Llegada al evento</label>
			       		<input v-model="user.arrival" type="text" class="form-control" id="arrival" placeholder="Hora de llegada" name="" autocomplete="off" disabled>
                    </div>

                    <div class="modal-body">
                        <label for="user">Usuario</label>
                        <div class="input-group">
                            <input v-model="selectedUser"                       
                                @focus="inputFocusedUser"
                                @blur="inputBlurredUser"
                                @input="getUserNames" 
                                type="text" 
                                class="form-control" 
                                id="user" 
                                placeholder="Seleccionar Usuario" 
                                autocomplete="off">
                        </div>
                        <ul :class="{'autocomplete-results': true, 'show-results': isInputFocusedUser}" class="autocomplete-results" required>
                            <li v-for="result in userResults" @click="selectUserName(result)" :key="result.id">
                                {{ result.name }}
                            </li>
                        </ul>
                    </div>

                    <div class="modal-body">
                        <label for="userRole">Rol del Usuario</label>
                        <select v-model="user.id_role" class="form-control" id="userRole">
                            <option v-for="role in rolesAll" :key="role.id" :value="role.id">{{ role.name }}</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                        <button v-if="update" @click="updateUser()" type="submit" class="btn btn-success"><i class="fas fa-edit"></i> Actualizar</button>
                        <button v-else @click="saveUser()" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { showSuccessMessage, showErrorMessage, showErrorGroupMessages, useSweetAlert }  from '../../sweet.js';

export default {
  emits: ['save-user', 'update-user', 'delete-user'], //Eventos que se generan en este componente
  data() {
    return {
      //Objeto para la edicion
      user: {
        id: '',
        name: '',
        phone: '',
        arrival: '',
        confirm: '',
        id_role: '',
        id_responsable: '',
      },
      //Modales y titulos
      id: 0,
      update: false,
      //Variables para comprobar los resultados y el total de los datos
      rolesAll: [],
      totalUsers: 0,
      //Filtros para el listado
      paginationNumber: 10,

      //Autocompleted user
      selectedNameUser: null, // Almacena el nombre seleccionado
      selectedUserId: null,
      selectedUser: null,
      isInputFocusedUser: false,
      userResults: [],
    };
  },
  methods: {
    // Limpiar formulario
        clearForm() {
            this.user = {
                name: '',
                phone: '',
                arrival: '',
                confirm: '',
                id_role: '',
                id_responsable: '',
            };
            this.update = false;
        },

    //Abrir model de editar o crear usuario
        openFormModal(user) {
            if(user == null){
                this.update = false;

                this.user.name = '';
                this.user.phone = '';
                this.user.arrival = '';
                this.user.confirm = '';
                this.user.id_responsable = '';
                this.user.id_role = '';
                this.selectedUserId= '';
            }else{
                this.update = true;

                this.id = user.id ?? null;
                this.user.id = user.id ?? null;
                this.user.name = user.name ?? null;
                this.user.phone = user.phone ?? null;
                this.user.arrival = user.arrival ?? null;
                this.user.id_responsable = user.id_responsable ?? null;
                this.user.id_role = user.id_role ?? null;
            }

            $('#userModal').modal('show');
        },
        
    //Cerrar modal de editar o crear usuario
        closeFormModal() {
            this.clearForm();
            $('#userModal').modal('hide');
        },

    //Abrir modal eliminar usuario
        openDeleteModal(user) {
            this.id = user.id;
            this.showDeleteConfirmation();
        },

    //Obtener todas los Roles
        getRoles(){
            axios.get('/web/roles')
            .then((response) => {
                this.rolesAll = response.data;
            })
        },
        
    // Agrega una nueva función para mostrar la confirmación de eliminación con SweetAlert
        showDeleteConfirmation() {
        const swal = useSweetAlert();
        
        swal.fire({
            title: '¡Advertencia!',
            text: '¿Estás seguro de eliminar este usuario?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
            // Si el usuario confirma la eliminación, llamas a la función deleteUser()
            this.deleteUser();
            }
        });
        },

    //Funcion para eliminar
        deleteUser() {
            axios.delete(`/web/users/${this.id}`)
            .then(() => {
                showSuccessMessage('¡Usuario eliminado exitosamente!');
                this.$emit('delete-user');
            }).catch(error => {
                const errors = error.response.data.errors;

                showErrorGroupMessages(errors)
            });
        },

    //Funcion para guardar
        saveUser(){
            const data = {
                name: this.user.name,
                phone: this.user.phone,
                arrival: this.user.arrival,
                confirm: this.user.confirm,
                id_role: this.user.id_role, // Enviar el ID del rol seleccionado
                id_responsable: this.selectedUserId, // Enviar el ID del invitado seleccionado
            };

            axios.post('/web/users', data).then(response => {
                this.closeFormModal();               
                showSuccessMessage('¡Usuario creado exitosamente!');
                this.$emit('save-user');
            }).catch(error => {
                const errors = error.response.data.errors;

                showErrorGroupMessages(errors)
            });
        },

    //Funcion para actualizar
        updateUser() {
            const userId = this.id;
            const data = {
                id: userId,
                name: this.user.name,
                phone: this.user.phone,
                arrival: this.user.arrival,
                confirm: this.user.confirm,
                id_role: this.user.id_role, // Enviar el ID del rol seleccionado
                id_responsable: this.selectedUserId, // Enviar el ID del invitado seleccionado
            };

            axios.put(`/web/users/${userId}`, data).then(response => {
                this.closeFormModal();               
                showSuccessMessage('¡Usuario actualizado exitosamente!');
                this.$emit('update-user');
            })
            .catch(error => {
                const errors = error.response.data.errors;
                showErrorGroupMessages(errors)
            });
        },

    //Selecionnar otro usuario
        selectUserName(user) {
            if (user === null) {
                this.selectedNameUser = null;
                this.selectedUserId = null; 
                this.selectedUser = null;
            }else{
                this.selectedUser = user.name; // Muestra el nombre del servidor en el input
                this.selectedUserId = user.id; // Guarda el ID de la empresa
                this.userResults = []; // Limpia los resultados
            }
        },
    //Obtener todos los nombres del personal
        getUserNames() {
            axios.get('/web/users_unpaged_name/', {
                params: {
                    name: this.selectedUser,
                },
            })
            .then(response => {
                this.userResults = response.data;
            })
            .catch(error => {
                console.error('Error obtaining equipment_company', error);
            });
        },
        inputFocusedUser() { //Motrar lsitado si esta selccionado el select
            this.isInputFocusedUser = true;
        },
        inputBlurredUser() { //NO Motrar lsitado si NO esta selccionado el select
            // Retraso para permitir que ocurra la selección del resultado
            setTimeout(() => {
            this.isInputFocusedUser = false;
            }, 200);
        },

        //Comprobar si hay o no servidor 
        //Al abrir modal ¿Hay o no servidor?
        modalSearchUser(servidor){
            if (servidor) { 
                const server = this.getServerData(servidor);
                this.selectServer(server);
            }else{
                this.selectedServer = '';
                this.fetchServers();
            }
        },

        //Obtener el nombre de la Empresa
        getUserData(userId){
            if (!userId) {
                return;
            }
            const user = this.userResults.find(server => server.id === userId);

            if (user) {
                return user;
            } else {
                return 'Sin servidor';
            }
        },
  },
  created() {
    this.getRoles();
    this.getUserNames();
  },
};
</script>

<style scoped>
    .autocomplete-results {
        list-style: none;
        padding: 0;
        margin: 0;
        border: 1px solid #ccc;;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        color: #454d55;
        max-height: 200px; /* ajusta la altura máxima según tu preferencia */
        overflow-y: auto; /* agregar desplazamiento vertical si la lista es larga */
    }

    .autocomplete-results li {
        padding: 8px 12px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .autocomplete-results li:hover {
        background-color: #ccc; /* Color de fondo al pasar el mouse sobre una opción */
    }
    
    .autocomplete-results li {
        /* Estilos anteriores */
        border-bottom: 1px solid #eee; /* Línea separadora entre opciones */
    }

    .autocomplete-results li:last-child {
        border-bottom: none; /* Eliminar la línea separadora de la última opción */
    }

    .autocomplete-results li:hover {
        background-color: #f0f0f0; /* Color de fondo al pasar el mouse sobre una opción */
    }

    .autocomplete-results {
        display: none;
        position: absolute;
        z-index: 999;
        background-color: #fff;
        border: 1px solid #ccc;
    /* Otros estilos que desees agregar */
    }

    .show-results {
        display: block;
    }

    /* Nuevo estilo para ajustar el ancho */
    .autocomplete-results.show-results {
        width: calc(94% - 2px); /* Ten en cuenta el borde */
        margin-top: 2px; /* Ajuste para separación */
    }
</style>