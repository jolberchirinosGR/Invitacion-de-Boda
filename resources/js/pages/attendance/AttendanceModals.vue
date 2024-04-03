<template>
    <!-- Modal de edicion y creacion de Usuario -->
    <div class="modal fade" id="modal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: goldenrod;">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <i class="fa fa-check-circle mr-1"></i> 
                        Confirmar asistencia
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <label for="user">Nomre y Apellido</label>
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

                    <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <AttendanceListItem v-for="(respon, index) in resposablesResults"
                                        :key="respon.id"
                                        :responsable=respon
                                    />
                                </tbody>
                            </table>
                        </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                        <button @click="saveUser()" type="submit" class="btn" style="background-color: goldenrod; color: white;"><i class="fas fa-save"></i> Guardar</button>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { showSuccessMessage, showErrorMessage, showErrorGroupMessages, useSweetAlert }  from '../../sweet.js';
import AttendanceListItem from './AttendanceListItem.vue';

export default {
  emits: ['save-user', 'update-user', 'delete-user'], //Eventos que se generan en este componente
  components: {
    AttendanceListItem,
  },
  data() {
    return {
      //Objeto para la edicion
      user: {
        id: '',
        name: '',
        phone: '',
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
      resposablesResults: [],
    };
  },
  methods: {
    // Limpiar formulario
        clearForm() {
            this.user = {
                name: '',
                phone: '',
                confirm: '',
                id_role: '',
                id_responsable: '',
            };
            this.update = false;
        },

    //Abrir model de editar o crear usuario
        openFormModal() {
            $('#modal').modal('show');
        },
        
    //Cerrar modal de editar o crear usuario
        closeFormModal() {
            this.clearForm();
            $('#modal').modal('hide');
        },

    //Selecionnar otro usuario
        selectUserName(user) {
            this.responsablesData(user.responsables); //Imprimir los demas invitados

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

    //Obtener el resto de invitados
        responsablesData(invitados) {
            if (invitados.length) {
                this.resposablesResults = invitados;
                console.log(this.resposablesResults)
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
  },
  created() {
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