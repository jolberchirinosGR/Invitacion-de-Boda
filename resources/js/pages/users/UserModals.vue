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
                        <label for="email">Correo</label>
                        <input v-model="user.email" type="email" class="form-control" id="email" placeholder="ejemplo@email.com" name="" autocomplete="off">
                    </div>
                    <div class="modal-body">
                        <label for="password">Contraseña</label>
                        <input v-model="user.password" type="password" class="form-control" id="passsword" placeholder="**********" name="" autocomplete="off">
                    </div>
                    <div class="modal-body">
                        <label for="confirm_password">Confirmar Contraseña</label>
                        <input v-model="user.confirm_password" type="password" class="form-control" id="confirm_passsword" placeholder="**********" name="" autocomplete="off">
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
        email: '',
        password: '',
        confirm_password: '',
        id_role: '',
      },
      //Modales y titulos
      id: 0,
      update: false,
      //Variables para comprobar los resultados y el total de los datos
      rolesAll: [],
      totalUsers: 0,
      //Filtros para el listado
      paginationNumber: 10,
    };
  },
  methods: {
    // Limpiar formulario
        clearForm() {
            this.user = {
                name: '',
                email: '',
                password: '',
                confirm_password: '',
                id_role: '',
            };
            this.update = false;
        },

    //Abrir model de editar o crear usuario
        openFormModal(user) {
            if(user == null){
                this.update = false;

                this.user.name = '';
                this.user.email = '';
                this.user.password = '';
                this.user.confirm_password = '';
                this.user.id_role = '';
            }else{
                this.update = true;

                this.id = user.id ?? null;
                this.user.id = user.id ?? null;
                this.user.name = user.name ?? null;
                this.user.email = user.email ?? null;
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
            if (this.user.password !== this.user.confirm_password) {
                showErrorMessage('¡La contraseña y su confirmación no coinciden!');
                return;
            }else{
                const data = {
                    id: this.user.id,
                    name: this.user.name,
                    email: this.user.email,
                    password: this.user.password,
                    id_role: this.user.id_role, // Enviar el ID del rol seleccionado
                };

                axios.post('/web/users', data).then(response => {
                    this.closeFormModal();               
                    showSuccessMessage('¡Usuario creado exitosamente!');
                    this.$emit('save-user');
                }).catch(error => {
                    const errors = error.response.data.errors;

                    showErrorGroupMessages(errors)
                });
            }
        },

    //Funcion para actualizar
        updateUser() {
            const userId = this.id;
            let passwordConfirm =  true;
            const data = {
                id: userId,
                name: this.user.name,
                email: this.user.email,
                id_role: this.user.id_role, // Enviar el ID del rol seleccionado
            };

            if(this.passsword !== '' && this.confirm_password !== ''){
                this.user.password == this.user.confirm_password
                    ? data.password = this.user.password
                    : passwordConfirm = false;
            };

            if (passwordConfirm) {
                axios.put(`/web/users/${userId}`, data).then(response => {
                    this.closeFormModal();               
                    showSuccessMessage('¡Usuario actualizado exitosamente!');
                    this.$emit('update-user');
                })
                .catch(error => {
                    const errors = error.response.data.errors;
                    showErrorGroupMessages(errors)
                });
            }else{
                showErrorMessage('¡Contraseñas no coinciden!');
            }
        },
  },
  created() {
    this.getRoles();
  },
};
</script>
