<template>
    <!-- Modal de edicion y creacion de Carpeta -->
    <div class="modal fade" id="folderModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" :class="update ?'bg-success text-white':'bg-primary text-white'">
                    <h5 v-if="update" class="modal-title" id="staticBackdropLabel">
                        <i class="fa fa-edit"></i> Editar carpeta
                    </h5>
                    <h5 v-else class="modal-title" id="staticBackdropLabel">
                        <i class="fa fa-plus-circle mr-1"></i> Nueva carpeta
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
			       		<label for="name">Nombre</label>
			       		<input v-model="folder.name" type="text" class="form-control" id="name" placeholder="Nombre" name="" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                        <button v-if="update" @click="updateFolder()" type="submit" class="btn btn-success"><i class="fas fa-edit"></i> Actualizar</button>
                        <button v-else @click="saveFolder()" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { showSuccessMessage, showErrorMessage, showErrorGroupMessages, useSweetAlert }  from '../../sweet.js';

export default {
  emits: ['save-folder', 'update-folder', 'delete-folder'], //Eventos que se generan en este componente
  props: {
    subFolder: Number,
  },
  data() {
    return {
      //Objeto para la edicion
      folder: {
        id: '',
        name: '',
        id_folder: '',
      },
      //Modales y titulos
      id: 0,
      update: false,
    };
  },
  methods: {
    // Limpiar formulario
        clearForm() {
            this.folder = {
                id: '',
                name: '',
                id_folder: '',
            };
            this.update = false;
        },

    //Abrir model de editar o crear carpeta
        openFormModal(folder) {

            if(folder == null){
                this.update = false;

                this.folder.name = '';
                this.folder.id_folder = '';
            }else{
                this.update = true;

                this.id = folder.id ?? null;
                this.folder.id = folder.id ?? null;
                this.folder.name = folder.name ?? null;
                this.folder.id_folder = folder.id_folder ?? null;
            }

            $('#folderModal').modal('show');
        },
        
    //Cerrar modal de editar o crear carpeta
        closeFormModal() {
            this.clearForm();
            $('#folderModal').modal('hide');
        },

    //Abrir modal eliminar carpeta
        openDeleteModal(folderId) {
            this.id = folderId;
            this.showDeleteConfirmation();
        },
        
    // Agrega una nueva función para mostrar la confirmación de eliminación con SweetAlert
        showDeleteConfirmation() {
        const swal = useSweetAlert();
        
        swal.fire({
            title: '¡Advertencia!',
            text: '¿Estás seguro de eliminar este carpeta?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
            // Si el carpeta confirma la eliminación, llamas a la función deleteFolder()
            this.deleteFolder();
            }
        });
        },

    //Funcion para eliminar
        deleteFolder() {
            axios.delete(`/web/folders/${this.id}`)
            .then(() => {
                showSuccessMessage('¡Carpeta eliminada exitosamente!');
                this.$emit('delete-folder');
            }).catch(error => {
                const errors = error.response.data.errors;
                showErrorGroupMessages(errors)
            });
        },

    //Funcion para guardar
        saveFolder(){
            const data = {
                name: this.folder.name,
                id_folder: this.subFolder, // Enviar el ID del folder
            };

            axios.post('/web/folders', data).then(response => {
                this.closeFormModal();               
                showSuccessMessage('¡Carpeta creada exitosamente!');
                this.$emit('save-folder');
            }).catch(error => {
                const errors = error.response.data.errors;

                showErrorGroupMessages(errors)
            });
        },

    //Funcion para actualizar
        updateFolder() {
            const folderId = this.id;
            const data = {
                id: folderId,
                name: this.folder.name,
                id_folder: this.folder.id_folder, // Enviar el ID del rol seleccionado
            };

            axios.put(`/web/folders/${folderId}`, data).then(response => {
                this.closeFormModal();               
                showSuccessMessage('¡Carpeta actualizada exitosamente!');
                this.$emit('update-folder');
            })
            .catch(error => {
                const errors = error.response.data.errors;
                showErrorGroupMessages(errors)
            });
        },
  },
  created() {
  },
};
</script>
