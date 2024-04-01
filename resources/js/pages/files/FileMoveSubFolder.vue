<template>
  <div class="card mb-3" v-for="(folder, index) in foldersAll" :key="index" style="background-color: rgb(243, 243, 243);">
    <div class="card-header d-flex justify-content-between align-items-center" @click="toggleFolder(index)">
      <h6 class="m-0">
        <span>
          <i v-if="folder.id === selectedFolder" class="fas fa-check-circle" style="color:yellowgreen"></i>
          <i v-else class="far fa-circle"></i>
        </span>
        <img src="type/folder.png" class="img-fluid rounded-start" style="width: 50px; height: 50px;">
        {{ folder.name }}
      </h6>

      <span v-if="folder.sub_folders.length > 0" class="ml-auto">
        <i class="fas fa-eye"></i> <!-- Icono de "Ver más" como un ojo -->
        Ver más...
      </span>
    </div>

    <!-- Vovler a cargar el componente si hay subcarpetas -->
    <div class="card-body" v-if="index === activeFolder && folder.sub_folders.length > 0">
      <FileMoveSubFolder 
        :foldersAll="folder.sub_folders"
        @get-selected-folder="getSelectedFolder"
      />
    </div>

  </div>
</template>

<script>
import FileMoveSubFolder from './FileMoveSubFolder.vue';

  export default {
    emits: ['get-selected-folder'],
    name: 'FileMoveSubFolder',
    props: {
      foldersAll: Object,
    },
    data() {
      return {
        selectedFolder: null,
        activeFolder: null,
      };
    },
    methods: {
      //Desplegar carpeta
      toggleFolder(index) {      
        
        if (this.activeFolder === index) {
          this.activeFolder = null;
        } else {
          this.activeFolder = index;
          this.selectedFolder = this.foldersAll[index].id; //Asigna el del servidor que se desplego
          this.$emit('get-selected-folder', this.selectedFolder);
        }
      },

      // Obtener el selected fodler de la subcarpeta
      getSelectedFolder(folder){
        this.selectedFolder = folder;
        
        this.$emit('get-selected-folder', this.selectedFolder);
      },
      
    },
  };
</script>