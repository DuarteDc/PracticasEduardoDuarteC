<template>
    <div>
        <table class="table">
                            <thead class="thead-dark">

                            <tr>
                                <th >Clave</th>
                                <th >Nombre</th>
                                <th>Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="materia in materias" :key="materia.id">
                                <td v-text="materia.id"></td>
                                <td v-text="materia.nombre"></td>
                                <td>
                                <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-secondary" v-on:click="updateid(materia)"><i class="fas fa-pen"></i></button>
                                <button data-toggle="modal" data-target="#deletemateria" type="button" class="btn btn-danger" v-on:click="delete    id(materia)"><i class="fas fa-trash"></i></button></td>
                                </tr>
                                </tbody>
            </table>
            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit.prevent="editarMateria()" >
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Materia:</label>
                                    <input type="text"  v-model="materiaedit.nombre" class="form-control" id="recipient-name">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button ttype="submit" name="action" class="btn btn-primary">Actualizar</button>
                       
                                </div>
        </form>
      </div>
    </div>
  </div>
</div>
    </div>
</template>

<script>
    export default {
        data (){
            return{
                //array para obtener todos las materias
                materias: [],
                //array para modificar una materia en especifico
                materiaedit: [],
                }
            },
        mounted() {
            this.getMaterias();
            console.log('se carga la API')
        },
        methods: {
            //función para obtener todas las materias de /api/materia con axios
            getMaterias: function () {
                 axios.get('Materias').then(response => {
                    this.materias = response.data.materias
                    console.log (this.materias);
                });
            },
            //función para obtener el id
            updateid(id){
                this.materiaedit = id;
            },
            //función para editar Materia 
            editarMateria(){
                let urlUpdate='Materias/'+ this.materiaedit.id;
                axios.put(urlUpdate,this.materiaedit).then(response =>{
                if(response.data.error){
                    toastr.error(response.data.mensaje);
                }else{
                    toastr.success(response.data.mensaje);
                    $('#exampleModal').modal('hide')
                }
                }).catch(error=>{
                });
            }
        }
    }
</script>