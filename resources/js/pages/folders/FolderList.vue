<template>
    <!-- Header de la pagina -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <button v-if="subFolder" @click="ascendDirectories(null)" type="button" class="btn btn-link">Archivo</button>
                            <span v-else>Archivo</span>
                        </li>
                        <li class="breadcrumb-item" v-for="(sub, index) in allSubfolder">
                            <button @click="ascendDirectories(sub)" type="button" class="btn btn-link">{{ sub.name }}</button>
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
                    <!--    Boton para ordenar -->
                    <button type="button" class="mb-2 btn btn-primary ml-2" data-toggle="collapse" data-target="#orderBy" aria-expanded="true">
                        <i class="fas fa-sort"></i>                        
                        Ordenar
                    </button>
                    <!-- Boton para nueva carpeta -->
                    <button @click="openFolderModal" type="button" class="mb-2 btn btn-primary ml-2">
                        <i class="fa fa-save mr-1"></i>
                        Nueva Carpeta
                    </button>
                    <!--    Boton para subir archivos -->
                    <button v-if="subFolder" type="button" class="mb-2 btn btn-primary ml-2" data-toggle="collapse" data-target="#updloadFilesAccordion" aria-expanded="true">
                        <i class="fas fa-upload mr-1"></i>
                        Subir Archivos
                    </button>
                    <!-- Boton para eliminar carpeta -->
                    <button v-if="isAdmin && folders.length == 0 && files.length == 0" @click="openDeleteFolderModal" type="button" class="mb-2 btn btn-danger ml-2">
                        <i class="fa fa-trash mr-1"></i>
                        Eliminar Carpeta
                    </button>
                    <!-- Salir de la pantalla -->
                    <button @click.prevent="logout" type="button" class="mb-2 btn btn-secondary ml-2">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        Salir
                    </button>
                </div>
            </div>

            <!-- Ordenar por -->
            <div class="collapse" id="orderBy">
                <div class="btn-group" role="group">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <button @click="sortBy('name')"  type="button" class="btn btn-info ml-2">
                                Ordenar por Nombre
                                <span v-if="orderByColumn === 'name'">
                                    <i v-if="orderByType === 'asc'" class="fas fa-arrow-up"></i>
                                    <i v-else-if="orderByType === 'desc'" class="fas fa-arrow-down"></i>
                                </span>
                            </button>
                            <button @click="sortBy('created_at')" type="button" class="btn btn-info ml-2">
                                Ordenar por Fecha
                                <span v-if="orderByColumn === 'created_at'">
                                    <i v-if="orderByType === 'asc'" class="fas fa-arrow-up"></i>
                                    <i v-else-if="orderByType === 'desc'" class="fas fa-arrow-down"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filtros en un acordeón colapsable -->
            <div v-if="subFolder" class="collapse" id="updloadFilesAccordion">
                <div class="card card-body">
                    <FileDropzone
                        :subFolder=subFolder
                        :allSubfolder=allSubfolder
                        @upload-files="upload"
                    />
                </div>
            </div>

            <!-- Spinner cargando -->
            <div v-if="loading" class="spinner-container">
                <div class="spinner-border text-secondary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <!-- Listado con todos las carpetas y las miniaturas -->
            <div v-else class="card">
                <div class="row" style="padding: 20px;">
                    <!-- Aqui en este componente se imprimen las carpetas de la consulta a BD -->
                    <FolderListItem v-for="(folder) in folders"
                        :folder=folder
                        @open-sub-folder="openSubFolder"
                    />

                    <!-- Aqui en este componente se imprimen las miniaturas de la consulta a BD -->
                    <FileListItem v-if="subFolder" v-for="(file) in files"
                        :file=file
                        @open-file-modal="viewFileModal(file)"
                    />
                </div>

                <!-- Si esta vacio tnato carpetas como archivos -->
                <div v-if="folders.length == 0 && files.length == 0" class="centered-image">
                    <img src="empty.png" style="width: 50%;">
                </div>
            </div>
        </div>
    </div>

    <folder-modals ref="folderModal"
        :subFolder=subFolder
        @save-folder="save"
        @delete-Folder="deleteFolder"
    />

    <file-modals ref="fileModal"
        @update-file="update"
        @delete-file="deleteFile"
        @move-file="update"
    />
</template>

<script>
import axios from 'axios';
import { debounce } from 'lodash';
import FolderListItem from './FolderListItem.vue'; //Mostrar carpetas
import FolderModals from './FolderModals.vue'; //Crear Carpetas
import FileModals from '../files/FileModals.vue'; //Crear Carpetas
import FileListItem from '../files/FileListItem.vue'; //Mostrar miniaturas
import FileDropzone from '../files/FileDropzone.vue'; // Importador de archivos
import { useAuthUserStore } from '../../stores/AuthUserStore'; // Variables de session
import { useRouter } from 'vue-router';

export default {
    setup() {
        const router = useRouter();
        const authUserStore = useAuthUserStore();

        const logout = () => {
            axios.post('/logout')
            .then((response) => {
                authUserStore.user.name = '';
                router.push('/');
            });
        };

        return {
            logout,
        };
    },
  components: {
    FolderModals,
    FolderListItem,
    FileListItem,
    FileModals,
    FileDropzone,
  },
  data() {
    return {
      // Objeto file
      file: {
        id: '',
        name: '',
        id_folder: '',
      },
      // Obtener y filtrar el listado
      title: 'Gestión de fotos',
      folders: [], // Guardar todas las carpetas
      files: [], // Guardar todos los archivos
      subFolder: null, // Alamacena el ID de las subcarpeta
      allSubfolder: [], // Alamacena el ID de varias subcarpetas

      //Generales
      orderByColumn: '',
      orderByType: 'none', // none, asc, desc
      isAdmin: null, // ¿ Es admin ?
      loading: true, // Esta será la variable para controlar la visibilidad del spinner
    };
  },
  methods: {
    //Obtener todas las carpetas
    getFolders() {
        this.loading = true; // Activar el spinner al iniciar la carga

        axios.get(`/web/folders`, {
            params: {
                //Generales
                order: this.orderByType,
                column: this.orderByColumn,                
                subFolder: this.subFolder,
            },
        })
        .then((response) => {
            this.folders = response.data;
            this.loading = false; // Desactivar el spinner cuando la carga ha finalizado
        });
    },

    //Obtener todos los archivos
    getFiles() {
        this.loading = true; // Activar el spinner al iniciar la carga

        axios.get(`/web/files`, {
            params: {
                //Generales
                order: this.orderByType,
                column: this.orderByColumn,
                subFolder: this.subFolder,
            },
        })
        .then((response) => {
                this.files = response.data;
                this.loading = false; // Desactivar el spinner cuando la carga ha finalizado
        });
    },

    // Método para abrir el modal de creación
    openFolderModal() {
        this.$refs.folderModal.openFormModal();
    },

    // Método para abrir el modal de eliminación
    openDeleteFolderModal() {
        this.$refs.folderModal.openDeleteModal(this.subFolder);
    },

    // Método para abrir el modal de eliminación
    openMoveFileModal() {
        this.$refs.fileModal.openDeleteModal(this.subFolder);
    },

    // Método para abrir el modal de creación
    openSubFolder(file) {
        this.title = file.name; // Cambiar el titulo a la carpeta
        this.subFolder = file.id; // Asignarle un id a la subcarpeta
        this.allSubfolder.push(file); // Agregar ese id al grupo posible de subcarpetas
        this.files = [];      
        this.folders = [];      

        this.getFolders(); // Obtener todas las carpetas
        this.getFiles(); // Obtener todos los archivos
    },

    // Método para abrir el modal ARCHIVO
    viewFileModal(file) {
        this.$refs.fileModal.openFormModal(file);
    },

    // Crear subir en las carpetas
    ascendDirectories(file) {
        const id = file ? file.id : null;

        // Encontrar el índice del archivo en allSubfolder
        const index = id ? this.allSubfolder.findIndex(sub => sub.id === id) : false;

        if (index !== false) {
            // Recortar el array hasta el índice correspondiente
            this.allSubfolder = this.allSubfolder.slice(0, index + 1);
        } else {
            this.allSubfolder = []; // Si no hay ID, vaciar el array
            this.subFolder = null; // Si no hay ID, pone en vacio que no estas dentro de una subcarpeta
            this.title = 'Gestionan archivos' //Inicializar el titulo tambien;
        }

        this.subFolder = id;
        this.files = []; //Inicializar todos los datos por cada ascenso     
        this.folders = [];   //Inicializar todos los datos por cada ascenso       

        if(this.subFolder){   
            this.getFiles();
        }

        this.getFolders();
    },

    //Subir archivos
    upload(){   
        this.getFolders();
        this.getFiles();
    },

    //Guardar carpeta
    save(){
        this.getFolders();
        this.getFiles();
    },

    //Actualizar carpeta & archivos
    update(){
        this.getFolders();
        this.getFiles()    
    },

    //Eliminar carpeta & archivos
    deleteFolder(){      
        this.subFolder = null; //Mandar a la carpeta raiz    
        this.ascendDirectories(null); //Limpiar carpetas anteriores
        this.getFolders();
        this.getFiles();
    },
    
    //Eliminar carpeta & archivos
    deleteFile(){      
        this.getFolders();
        this.getFiles();
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
  },
  watch: {
    orderByType: debounce(function () {
      this.getFolders();
      this.getFiles();
    }, 300),
  },
  created() {
    const user = useAuthUserStore(); //Cargar sesion del usuario logeado
    this.isAdmin = user.user.role.name === 'Admin' ? true : false; //¿Es Admin o No ?

    this.getFolders();
  },
};
</script>

<style>
    /* Estilos para el contenedor del spinner */
    .spinner-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px; /* Ajusta la altura según tus necesidades */
        position: relative; /* Agregar posición relativa para controlar z-index */
        z-index: 999; /* Valor alto para asegurar que esté por encima del texto */
    }

    /* Estilos para el spinner utilizando clases de Bootstrap */
    .spinner-border {
        width: 11rem;
        height: 11rem;
        border: 15px dotted #575757; /* Cambia el ancho y el estilo del borde */
        border-radius: 50%; /* Para hacer el spinner circular */
        animation: spinner-border-spin 2.5s linear infinite;
        position: absolute;
        z-index: 1000;
    }

    /* Animación de rotación del spinner */
    @keyframes spinner-border-spin {
        to {
            transform: rotate(360deg);
        }
    }

    .centered-image {
        display: flex;
        justify-content: center;
        align-items: center;
        /* Otros estilos si es necesario */
    }
</style>