import { createApp } from 'vue';
import swal from "sweetalert";
import spanish from '../data_tables/spanish.json';
import axios from 'axios';

const app = createApp({
    data() {
        return {
            tablaLista: {
                draw: () => {}
            },
        }
    },
    computed: {

        

    },
    mounted() {
        this.tablaLista = $('#tabla_usuarios').DataTable({
            "language": spanish,
            "processing": true,
            "serverSide": true,
            "responsive": true,
            search: {
                return: true,
            },
            "ajax": {
                url: "/usuarios/listar-usuarios",
                data: function (d) {
                    // return $.extend({}, d, {
                    //     "buscar": $('#caja-filtro').val().toLowerCase(),
                    // });
                }
            },
            "columns": [
                { data: "nombre", name: "nombre" },
                { data: "email", name: "email" },
                
            ]
        });
       

    },

    methods: {


    }
})

app.mount('#app_general');