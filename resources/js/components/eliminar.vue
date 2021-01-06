<template>
    <input type="submit"
    value="eliminar"
    class="btn btn-danger"
    @click=ELiminarVacante

    >


</template>

<script>




export default {



    props:['eliminarvacanteid'],


   methods:{

       ELiminarVacante(){

           console.log('eliminando...', this.eliminarvacanteid);



          this.$swal.fire({
            title: 'Estas seguro que deseas eliminar?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {

                //console.log(result);
           if (result.value) {

               const param={
                   id: this.eliminarvacanteid

               }


               //enviar peticion

               axios.post(`/vacantes/${this.eliminarvacanteid}`,{param, _method: 'delete' } )
                .then(res=>{
                    console.log(res);

                    this.$swal.fire(
                        'Deleted!',
                        res.data.mensaje

                )
                })
                .catch(res=>{
                    console.log(res);
                })





            }
            })


       }

}
}
</script>
