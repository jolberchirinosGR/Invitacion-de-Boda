<template>
    <button @click="openSubFolder" type="button" class="btn btn-outline-info mx-2 mb-4" style="border:none">
      <img src="type/folder.png" class="img-fluid rounded-start" style="width: 100px; height: 100px;">
      {{ folder.name }}
    </button>
</template>
  
<script>
import axios from 'axios';
import { showSuccessMessage, showErrorMessage, showErrorGroupMessages, useSweetAlert }  from '../../sweet.js';
import { useAuthUserStore } from '../../stores/AuthUserStore';

  export default {
    emits: ['open-sub-folder'], //Eventos que se generan en este componente
    props: {
      folder: Object,
    },
    data() {
      return {
      };
    },
    created() {
    },
    watch: {
    },
    methods: {
      openSubFolder(){
        this.$emit('open-sub-folder', this.folder);
      }
    },
  };
</script>