<template>
    <div class="app">
            <h1>Listado Usuarios</h1>
        <hr>

        <table class="table table-bordered">
            <thead>
                <td>Nombre</td>
                <td>Email</td>
                <td>Acciones</td>
            </thead>

            <tbody>
                <tr v-for="user in users">

                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>

                    <td>
                        <a href="#" v-on:click.prevent="deleteUser(user.id)">Eliminar</a>
                    </td>

                </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
    import Vue from 'vue'
    import VueSweetAlert from 'vue-sweetalert'

    Vue.use(VueSweetAlert);

    export default{
        data(){
            return{
                users:[]
            }
        },
        created(){
            this.getUsers();
        },
        methods:{
            getUsers(){
                    axios.get('lista').then(response => {
                        this.users = response.data.usuarios;
                    });
            },
            deleteUser(id){

                this.$swal({
                    title: '¿Estas seguro que desea eliminar?',
                    showCancelButton: true
                }).then((res)  => {
                    axios.delete('/eliminar_usuario/'+id).then(response => {
                        this.getUsers();
                    })

                    (this.$swal('Eliminado!', 'El registro a sido eliminado.', 'success'))
                }

                ).catch(dismiss => (dismiss !== 'cancel' ? undefined : this.$swal('Cancelled','Has Cancelado', 'error')));



            }
        }
    }

</script>

<style>

</style>