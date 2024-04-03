<template>
    <!-- Modal de edicion archivo -->
      <div class="modal fade" id="fileModal" data-backdrop="static" tabindex="-1" role="dialog"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header bg-info text-white'">
                      <h5 class="modal-title" id="staticBackdropLabel">
                          <i class="fa fa-eye"></i> Ver archivo
                      </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-md-12 d-flex justify-content-center">
                              <img :src="file.url" style="width: 60%; border: 2px dashed #928e8e; border-radius: 5px; padding: 5px;">
                          </div>
                      </div>
  
                      <br>
                      
                      <div class="row d-flex justify-content-center">
                          <div class="col-md-6">
                              <label for="name">Nombre</label>
  
                              <div class="input-group mb-3">
                                  <div class="input-group-append">
                                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                  </div>
                                  <input v-model="name" class="form-control" disabled>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <label for="download">Descargar:</label>
                              <div class="input-group mb-3">                            
                                  <button @click="downloadFile(file)" type="button" class="form-control btn btn-primary">
                                      <i class="fa fa-download mr-1"></i>
                                      Descargar
                                  </button>
                              </div>
                          </div>
                      </div>
  
                      <br>
  
                      <div class="row d-flex justify-content-center">
                          <div class="col-md-4">
                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                  <span class="input-group-text"><i class="fas fa-tags"></i></span>
                              </div>
                              <input v-model="file.type" class="form-control" disabled>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                  <span class="input-group-text"><i class="fas fa-weight-hanging"></i></span>
                              </div>
                              <input v-model="file.size" class="form-control" disabled>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                  <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                              </div>
                              <input v-model="file.created_at" class="form-control" disabled>
                            </div>
                          </div>
                      </div>
  
                      <span><strong> Ultima actualización: </strong></span>
                      <div class="row">
                          <div class="col-md-12">
                            <span>Actualizado a las {{ file.updated_at }}</span>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                      <!-- <button v-if="isAdmin" @click="openMoveFileModal()" type="submit" class="btn btn-success"><i class="fas fas fa-project-diagram"></i> Mover</button> -->
                      <!-- <button v-if="isAdmin" @click="updateFile()" type="submit" class="btn btn-info"><i class="fas fa-edit"></i> Renombrar</button> -->
                  </div>
              </div>
          </div>
      </div>
  
    <!-- Modal de mover archivo de carpeta -->
      <div class="modal fade" id="moveFileModal" data-backdrop="static" tabindex="-1" role="dialog"
          aria-labelledby="staticBackdropLabel" aria-hidden="true" style="max-height: 100%; overflow-y: auto;">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header bg-success text-white">
                      <h5 class="modal-title" id="staticBackdropLabel">
                          <i class="fa fa-project-diagram mr-1"></i> Mover archivo a:
                      </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                      
                  <div class="modal-body">
                      <label for="selectedFolder">
                          Seleccionar Carpeta
                      </label>
  
                      <div class="alert alert-warning d-flex align-items-center" role="alert" style="opacity: 0.7; color: black">
                          <i class="fas fa-exclamation-triangle mr-1"></i>                             
                          <strong>Asegúrate de verificar que la carpeta con el símbolo ✔ es donde se moverá el archivo.</strong> 
                      </div>
                      <file-move-sub-folder
                          :foldersAll=foldersAll
                          @get-selected-folder="selectedFolder"
                      />
                  </div>
  
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                      <button @click="moveFileToFolder" type="submit" class="btn btn-success"><i class="fas fa-save"></i> Mover</button>
                  </div>
              </div>
          </div>
      </div>
  </template>
  
  <script>
  import axios from 'axios';
  import { showSuccessMessage, showErrorMessage, showErrorGroupMessages, useSweetAlert }  from '../../sweet.js';
  import { useAuthUserStore } from '../../stores/AuthUserStore';
  import FileMoveSubFolder from './FileMoveSubFolder.vue';
  
  export default {
    emits: ['update-file', 'delete-file', 'move-file'], //Eventos que se generan en este componente
    components:{
      FileMoveSubFolder
    },
    data() {
      return {
        //Objeto para la edicion
        file: {
          id: '',
          name: '',
          url: '',
          size: '',
          type: '',
          created_at: '',
          updated_at: '',
        },
        name: '',
        usersAll: [],
        foldersAll: [],
        authUserStore: null,
        folderId: null, // Carpeta a la que se puede mover el archivo
      };
    },
    methods: {
      // Limpiar formulario
          clearForm() {
              this.file = {
                  id: '',
                  name: '',
                  url: '',
                  size: '',
                  type: '',
                  created_at: '',
                  updated_at: '',
              };
              this.authUserStore = null
          },
  
      //Abrir model de editar o crear usuario
          openFormModal(file) {
              this.file.id = file.id ?? null;
              this.file.name = file.name ?? null;
              this.name = this.getNameWithoutExtension(file) ?? null;
              this.file.url = this.getFile(file) ?? null;
              this.file.path = file.path ?? null;
              this.file.size = file.size + 'mb' ?? null;
              this.file.type = file.type ?? null;
              this.file.created_at = this.getDate(file.created_at) ?? null;
              this.file.updated_at = this.getDateWithHour(file.updated_at) ?? null;
              
              $('#fileModal').modal('show');
          },
  
      //Abrir model de mover archivo a otra carpeta
          openMoveFileModal() {
              $('#fileModal').modal('hide'); //Oculto el modal de file pero sin reiniciar los datos del archivo
              this.getFolders(); //Obtener las caerpetas
              $('#moveFileModal').modal('show'); //Mostar modal de mover
          },
          
      //Cerrar modal de editar o crear usuario
          closeFormModal() {
              this.clearForm();
              $('#fileModal').modal('hide');
          },
  
      //Cerrar modal de mover
          closeFileMoveModal() {
              $('#moveFileModal').modal('hide');
          },
  
      //Funcion para actualizar
          updateFile() {
              const auth = useAuthUserStore();
              const data = {
                  id: this.file.id,
                  name: this.name,
                  type: this.file.type,
              };
  
              axios.put(`/web/files/${data.id}`, data).then(response => {
                  this.closeFormModal();               
                  showSuccessMessage('¡Archivo renombrado exitosamente!');
                  this.$emit('update-file');
              })
              .catch(error => {
                  const errors = error.response.data.errors;
                  showErrorGroupMessages(errors)
              });
          },
  
      //Obtener todas las carpetas para mi drop
          getFolders() {
              axios.get(`/web/folders_unpaged`)
              .then((response) => {
                  this.foldersAll = response.data;
              });
          },
  
      //Obtener todas los usuarios
          getUsers(){
              axios.get('/web/users_unpaged').then((response) => {
                  this.usersAll = response.data;
              })
          },
  
      //Obtener el nombre del usuario por ID
          getUserName(userId) {
              const user = this.usersAll.find(user => user.id === userId);
              return user ? user.name : 'Usuario no encontrado';
          },
  
      // Método para abrir el modal de edición
          openFileModal(file) {
              this.$refs.fileModal.openFormModal(file);
          },
  
      // Eliminar extensión del nombre
          getNameWithoutExtension(file) {
              const lastDotIndex = file.name.lastIndexOf('.'); // Encuentra el último punto en el nombre del archivo
              if (lastDotIndex === -1) {
              return file.name; // Si no hay punto, devuelve el nombre completo
              } else {
              return file.name.substring(0, lastDotIndex); // Devuelve el nombre sin la extensión
              }
          },
  
      //Obtener fecha en formato carbon
          getDate(date) {
              const d = new Date(date);
              const day = String(d.getDate()).padStart(2, '0'); // Ajusta el día a dos dígitos
              const month = String(d.getMonth() + 1).padStart(2, '0'); // Ajusta el mes a dos dígitos
              const year = d.getFullYear();
              return `${day}-${month}-${year}`;
          },
  
      //Obtener fecha y hora en formato carbon
          getDateWithHour(date) {
              const d = new Date(date);
              const day = String(d.getDate()).padStart(2, '0'); // Ajusta el día a dos dígitos
              const month = String(d.getMonth() + 1).padStart(2, '0'); // Ajusta el mes a dos dígitos
              const year = d.getFullYear();
              const hour = d.getHours();
              const minutes = d.getMinutes();
  
              return `${hour}:${minutes} del ${day}-${month}-${year}`;
          },
  
      //Devolver la imagen y sino una iamgen precargada para eso.
          getFile(file) {
              const fileType = file.type.toLowerCase();
              const fileName = file.name.toLowerCase();
  
              if (fileType === 'jpg' || fileType === 'jpeg' || fileType === 'png' || fileType === 'gif') {
                  return `storage${file.path}/${fileName}`;
              }
  
              const commonFormats = {
              //Compresión
              'rar': 'type/comp.png',
              'zip': 'type/comp.png',
              'tar': 'type/comp.png',
              '7z': 'type/comp.png',
              'tar.gz': 'type/zip.png',
              'gz': 'type/zip.png',
              'iso': 'type/iso.png',
  
              //Documentos
              'doc': 'type/doc.png',
              'docx': 'type/doc.png',
              'txt': 'type/doc.png',
              'xlsx': 'type/excel.png',
              'xls': 'type/excel.png',
              'ppt': 'type/pp.png',
              'pptx': 'type/pp.png',
              'pdf': 'type/pdf.png',
  
              //Ejectuables
              'exe': 'type/exe.png',
              'apk': 'type/exe.png',
  
              //Medias
              'mkv': 'type/mkv.png',
              'mp4': 'type/mkv.png',
              'mp3': 'type/mp3.png',
              'ipa': 'type/mp3.png',
              
              //Programmer
              'sql': 'type/sql.png',
              'html': 'type/html.png',
              'json': 'type/json.png',
              'xml': 'type/html.png',
              'php': 'type/html.png',
  
              'psd': 'type/image.png',
              'bmp': 'type/image.png',
              'tiff': 'type/image.png',
              'psd': 'type/image.png',
              'ai': 'type/image.png',
              'webb': 'type/image.png',
              // Agrega aquí más formatos comunes si es necesario
              };
  
              const defaultImage = 'type/files.png';
  
              if (commonFormats[fileType]) {
              return commonFormats[fileType];
              } else {
              return defaultImage;
              }
          },
  
      //Descargar el archivo en cuestión
          downloadFile(file) {
              const filePath = `storage${file.path}/${file.name}`;
  
              // Crear un enlace temporal para descargar el archivo
              axios({
              url: filePath,
              method: 'GET',
              responseType: 'blob', // Indicar que se espera un objeto blob como respuesta
              })
              .then((response) => {
                  const url = window.URL.createObjectURL(new Blob([response.data]));
                  const link = document.createElement('a');
                  link.href = url;
                  link.setAttribute('download', file.name); // Establecer el nombre del archivo
                  document.body.appendChild(link);
                  link.click();
  
                  // Ocultar el modal después de descargar
                  showSuccessMessage('Tu archivo comenzará a descargarse en breve...');
              })
              .catch((error) => {
                  // Manejar cualquier error que ocurra durante la descarga
                  console.error('Error al descargar el archivo:', error);
                  showErrorMessage('Error al descargar el archivo');
              });
          },
  
      //Modal de eliminar
          showDeleteConfirmation() {
              const swal = useSweetAlert();
                  
              swal.fire({
                  title: '¡Advertencia!',
                  text: '¿Estás seguro de eliminar este archivo?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#d33',
                  confirmButtonText: 'Eliminar',
                  cancelButtonText: 'Cancelar'
              }).then((result) => {
                  if (result.isConfirmed) {
                      // Si el usuario confirma la eliminación, llamas a la función deleteUser()
                      this.deleteFile();
                  }
              });
          },
  
      //Funcion para eliminar
          deleteFile() {
              axios.delete(`/web/files/${this.file.id}`)
              .then(() => {
                  this.closeFormModal();               
                  showSuccessMessage('Archivo eliminado exitosamente!');
                  this.$emit('delete-file');
              }).catch(error => {
                  const errors = error.response.data.errors;
  
                  showErrorGroupMessages(errors)
              });
          },
  
      //Almacenar carpeta de guardado
          selectedFolder(folder){
              this.folderId =  folder;
          },
      //Mover el archivo a una carpeta
          moveFileToFolder(){
              const auth = useAuthUserStore();
              const data = {
                  id: this.file.id,
                  id_folder: this.folderId,
              };
  
              axios.post(`/web/move_file/`, data).then(response => {
                  this.closeFileMoveModal();               
                  showSuccessMessage('¡Archivo movido exitosamente!');
                  this.$emit('move-file');
              })
              .catch(error => {
                  const errors = error.response.data.errors;
                  showErrorGroupMessages(errors)
              });
          },
    },
    created() {
      this.getUsers();
      this.clearForm();
    },
  };
  </script>