<template>
    <!-- Modal de laravel logs-->
    <div class="modal fade" id="laravelLogModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <i class="fa fa-plus-circle mr-1"></i> Logs
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <!-- Mostrar logs en el modal -->
                        <p v-if="logs.length === 0">No hay registros de log disponibles.</p>
                        <ul v-else>
                            <li v-for="(log, index) in logs" :key="index">{{ log }}</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                        <button @click="deleteLogs()" type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Borrar</button>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { showSuccessMessage, showErrorMessage, showErrorGroupMessages, useSweetAlert }  from '../sweet.js';

export default {
  props: {
    subFolder: Number,
  },
  data() {
    return {
        //Modales y titulos
        id: 0,
        logs: [] // Inicializar los logs como un array vacío
    };
  },
  methods: {
    //Abrir model de editar o crear carpeta
        openFormModal() {
            axios.get('/get-logs')
            .then(response => {
                this.logs = response.data.logs.split("\n");
            })
            .catch(error => {
                console.log(error);
            });
            
            $('#laravelLogModal').modal('show');
        },
        
    //Cerrar modal de editar o crear carpeta
        closeFormModal() {
            $('#laravelLogModal').modal('hide');
        },

    //Función para el borrar los LOGs
        deleteLogs() {
            axios.get('/clear-log')
            .then(response => {
                this.closeFormModal();
                showSuccessMessage('Logs vaciados exitosamente!');
            })
            .catch(error => {
                console.log(error);
            });
        },
  },
  created() {
  },
};
</script>
