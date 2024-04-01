<template>
  <button type="button" @click="openFileModal(file)" class="btn btn-outline-info mx-2 mb-4" style="border:none">
    <img v-if="file.type === 'jpg' || file.type === 'png' ||  file.type === 'gif' ||  file.type === 'jpeg'" 
                :src=getFile(file) class="img-fluid rounded-start" style="width: 80px; height: 80px;">

    <img v-else :src=getFile(file) class="img-fluid rounded-start" style="width: 80px; height: 80px;">
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
  },
};
</script>