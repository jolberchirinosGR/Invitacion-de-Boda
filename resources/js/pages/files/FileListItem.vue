<template>
  <button type="button" @click="openFileModal(file)" class="btn btn-outline-info mx-2 mb-4" style="border:none">
    <img :src=getFile(file) class="img-fluid rounded-start" style="width: 80px; height: 80px;">
    {{ file.name }}
  </button>
</template>

<script>
export default {
  props: {
    file: Object,
  },
  methods: {
    // Método para abrir el modal
      openFileModal() {
        this.$emit('open-file-modal', this.file);
      },
    //Devolver la imagen y sino una iamgen precargada para eso.
      getFile(file) {
        const fileType = file.type.toLowerCase();
        const fileName = file.name.toLowerCase();

        if (fileType === 'jpg' || fileType === 'jpeg' || fileType === 'png' || fileType === 'gif') {
          return `storage${file.path}/${fileName}`;
        }

        const defaultImage = 'type/files.png';

        if (commonFormats[fileType]) {
          return commonFormats[fileType];
        } else {
          return defaultImage;
        }
      },
  },
};
</script>