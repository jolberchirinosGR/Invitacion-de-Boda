<template>
  <button type="button" @click="openFileModal(file)" class="btn btn-outline-info mx-2 mb-4" style="border:none">
    <img src="../storage/app/public/Jolber/1712320734_1.jpg" class="img-fluid rounded-start" style="width: 80px; height: 80px;">
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
  },
};
</script>