<template>
        <!-- Header de la pagina -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Listado de usuarios</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link to="/">Inicio</router-link>
                            </li>
                            <li class="breadcrumb-item">
                                Usuarios
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenido de la pagina -->
        <div class="content">
            <div class="container-fluid">
                <!-- Botones bonitos -->
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <button type="button" class="mb-2 btn btn-info ml-2" data-toggle="collapse" data-target="#filtersAccordion" aria-expanded="true">
                            <i class="fas fa-sliders-h"></i>
                            Mostrar Filtros
                        </button>
                        <button @click="createModalUser()"  class="mb-2 btn btn-primary ml-2" type="button">
                            <i class="fa fa-plus-circle mr-1"></i>
                            Nuevo usuario
                        </button>
                        <!-- Salir de la pantalla -->
                        <button @click.prevent="logout" type="button" class="mb-2 btn btn-secondary ml-2">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            Salir
                        </button>
                    </div>
                </div>

                <!-- Filtros en un acordeón colapsable -->
                <div class="collapse" id="filtersAccordion">
                    <div class="card card-body">
                    <div class="row">
                        <div class="col-md-1">
                            <!-- Selección de paginación -->
                            <div class="form-group">
                                <label for="paginationNumber">Paginación:</label>
                                <select v-model="paginationNumber" class="form-control">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="150">150</option>
                                    <option value="200">200</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <!-- Input de búsqueda para número -->
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" v-model="nameSearch" class="form-control" placeholder="Buscar por nombre..." />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <!-- Input de búsqueda para número -->
                            <div class="form-group">
                                <label for="phone">Teléfono:</label>
                                <input type="text" v-model="phoneSearch" class="form-control" placeholder="Buscar por teléfono..." />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Asistente confirmada</label>
                                <select v-model="confirmSearch" class="form-control">
                                    <option value="null">Sin filtrar</option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <!-- Selección de roles -->
                            <div class="form-group">
                                <label for="roleSearch">Rol:</label>
                                <select v-model="roleSearch" class="form-control">
                                    <option value="null">Sin roles</option>
                                    <option v-for="rol in roles" :value="rol.id" :key="rol.id">{{ rol.name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                        <!-- Input de búsqueda por fecha de creacion -->
                        <div class="form-group">
                            <label for="start-time">Fecha creado:</label>
                            <div class="input-group">
                                <input v-model="dateSearch" type="text" class="form-control flatpickr" id="start-time">
                                <div class="input-group-append">
                                    <a href="#" @click="dateSearchNull" class="btn btn-outline-secondary">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- Listado de las usuarios y con el checkbox para eliminar varias o todas -->
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th @click="sortBy('name')">
                                            Nombre
                                            <span v-if="orderByColumn === 'name'">
                                                <i v-if="orderByType === 'asc'" class="fas fa-arrow-up"></i>
                                                <i v-else-if="orderByType === 'desc'" class="fas fa-arrow-down"></i>
                                            </span>
                                        </th>
                                        <th @click="sortBy('phone')">
                                            Teléfono
                                            <span v-if="orderByColumn === 'phone'">
                                                <i v-if="orderByType === 'asc'" class="fas fa-arrow-up"></i>
                                                <i v-else-if="orderByType === 'desc'" class="fas fa-arrow-down"></i>
                                            </span>
                                        </th>
                                        <th @click="sortBy('confirm')">
                                            Asis.
                                            <span v-if="orderByColumn === 'confirm'">
                                                <i v-if="orderByType === 'asc'" class="fas fa-arrow-up"></i>
                                                <i v-else-if="orderByType === 'desc'" class="fas fa-arrow-down"></i>
                                            </span>
                                        </th>
                                        <th @click="sortBy('id_role')">
                                            Rol
                                            <span v-if="orderByColumn === 'id_role'">
                                                <i v-if="orderByType === 'asc'" class="fas fa-arrow-up"></i>
                                                <i v-else-if="orderByType === 'desc'" class="fas fa-arrow-down"></i>
                                            </span>
                                        </th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <!-- Esta tabla esta paginada desde el controlador -->
                                <tbody v-if="totalUsers > 0">
                                    <!-- Aqui en este componente se imprimen los resultasdos de la consulta a BD -->
                                    <UserListItem v-for="(user, index) in users.data"
                                        :key="user.id"
                                        :user=user
                                        @open-update-user="updateModalUser"
                                        @open-delete-user="deleteModalUser"
                                    />
                                </tbody>
                                <tbody v-else>
                                    <tr>
                                        <td colspan="24" class="text-center">Sin resultados...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Esta paginacion viene del controlador y formateada por boostrap -->
                <Bootstrap4Pagination :limit="15" :data="users" @pagination-change-page="getUsers"/>
                <div class="mt-3">
                    <p>
                        Mostrando {{ resultsRange() }}
                    </p>
                </div>
            </div>
        </div>
    
    <!-- Modal -->
    <user-modals ref="userModal"
        @save-user="saveUser"
        @update-user="updateUser"
        @delete-user="deleteUser"
    />
</template>

<script>
import axios from 'axios';
import { debounce } from 'lodash';
import { Bootstrap4Pagination } from 'laravel-vue-pagination';
import UserListItem from './UserListItem.vue';
import flatpickr from "flatpickr";
import UserModals from './UserModals.vue';
import { useRouter } from 'vue-router';

export default {
    setup() {
        const router = useRouter();

        const logout = () => {
            axios.post('/logout')
            .then((response) => {
                router.push('/');
            });
        };

        const home = () => {
            router.push('/');
        };

        return {
            logout,
            home,
        };
    },
  components: {
    UserListItem,
    Bootstrap4Pagination,
    UserModals,
  },
  data() {
    return {
      //Objeto para la edicion
      user: {
        id: '',
        name: '',
        phone: '',
        confirm: '',
        id_responsable: '',
        id_role: '',
      },
      //Modales y titulos
      id: 0,
      update: false,
      //Variables para comprobar los resultados y el total de los datos
      roles: [],
      users: [],
      totalUsers: 0,
      //Filtros para el listado
      nameSearch: null,
      phoneSearch: null,
      confirmSearch: null,
      dateSearch: null,
      roleSearch: null,
      //Generales
      paginationNumber: 10,
      orderByColumn: '',
      orderByType: 'none', // none, asc, desc
    };
  },
  methods: {
    //Obtener todas los Usuarios
      getUsers(page = 1) {
        axios
            .get(`/web/users?page=${page}`, {
                params: {
                    name: this.nameSearch,
                    phone: this.phoneSearch,
                    confirm: this.confirmSearch,
                    date: this.dateSearch,
                    role: this.roleSearch,
                    //Generales
                    pagination: this.paginationNumber,
                    order: this.orderByType,
                    column: this.orderByColumn,
                },
            })
            .then((response) => {
                this.users = response.data;
                this.totalUsers = this.users.data.length;
            });
      },

    //Obetener roles
      getRoles(){
          axios.get('/web/roles').then((response) => {
              this.roles = response.data;
          })
      },    

    //Obetener ordenación
      sortBy(column) {
        if (this.orderByColumn === column) {
            if (this.orderByType === 'none') {
                this.orderByType = 'asc';
            } else if (this.orderByType === 'asc') {
                this.orderByType = 'desc';
            } else {
                this.orderByType = 'none';
                this.orderByColumn = '';
            }
        } else {
            this.orderByColumn = column;
            this.orderByType = 'asc';
        }
    },

    // Método para abrir el modal de creación
      createModalUser() {
        this.$refs.userModal.openFormModal(null);
      },

    // Método para abrir el modal de creación
      updateModalUser(data) {
        this.$refs.userModal.openFormModal(data);
      },

    // Método para abrir el modal de creación
      deleteModalUser(data) {
        this.$refs.userModal.openDeleteModal(data);
      },

    //Funcion para guardar
    saveUser(data){
        this.getUsers();
    },

    //Funcion para actualizar
    updateUser(data) {
        this.getUsers();
    },

    //Funcion para actualizar
    deleteUser(data) {
        this.getUsers();
    },

    //vaciar filtro de fecha
    dateSearchNull(){
        this.dateSearch = null;
    },

    //Datos del todal de paginacion
    resultsRange() {
        const start = (this.users.current_page - 1) * this.paginationNumber + 1;
        const end = this.paginationNumber < this.users.total 
                                                ? this.paginationNumber 
                                                : this.users.total;
        return `${start} a ${end} de ${this.users.total} resultados.`;
    },
  },
  watch: {
    nameSearch: debounce(function () {
      this.getUsers();
    }, 300),
    phoneSearch: debounce(function () {
      this.getUsers();
    }, 300),
    confirmSearch: debounce(function () {
      this.getUsers();
    }, 300),
    paginationNumber: debounce(function () {
      this.getUsers();
    }, 300),
    dateSearch: debounce(function () {
      this.getUsers();
    }, 300),
    roleSearch: debounce(function () {
      this.getUsers();
    }, 300),
    orderByType: debounce(function () {
      this.getUsers();
    }, 300),
  },
  created() {
    this.getUsers();
    this.getRoles();
  },
  mounted() {
    flatpickr(".flatpickr", {
        enableTime: false,
        dateFormat: "Y-m-d",
        locale: {
        firstDayOfWeek: 1,
        weekdays: {
          shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
          longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        },
        months: {
          shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
          longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        },
      },
    });
  }
};
</script>
