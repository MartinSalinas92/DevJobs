<template>
<div>
    <span

     
    :class="cambiarColor()" 
    v-on:click="cambio"
    :key="cambiarestado" 
   
    >{{ cambiarTexto }}</span>

</div>



</template>

<script>
export default {

    props:['activa','vacanteId'],


    mounted (){
        this.cambiarestado=Number(this.activa);
    },

    data (){
        return{
            cambiarestado:null
        }
    },

    methods:{


        cambiarColor(){

            //console.log('cambiar color');

            return this.cambiarestado === 1 ? 'btn btn-danger' : 'btn btn-success';

            

        },


        cambio(){

           //console.log( this.cambiarestado);

           if(this.cambiarestado === 1){
               this.cambiarestado = 0
           }else{
               this.cambiarestado = 1;

           }

           const param ={
               data: this.cambiarestado
           }

           axios.post('/activos/'+ this.vacanteId, param)
           .then(res=>{

               console.log(res);

           })
           .catch(error=>{

               console.log(error);
           })

        }
    },


        computed: {
            cambiarTexto(){
                return this.cambiarestado === 1 ? 'Inactivo' : 'Activo';
            }
        },
}

    




</script>

