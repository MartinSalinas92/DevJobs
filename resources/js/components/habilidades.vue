<template>
<div>

    <ul class='row justify-content-center'>

        <li

        class="border border-gray-500 px-10 py-10 py-3 rounded mr-4"
        :class="verificarhabilidadesGuardados(skill)"
        v-for="(skill, i ) in this.skills"
        v-bind:key="i"
        v-on:click=activar($event);



        >{{skill}}




        </li>

    </ul>

    <input type="hidden" class="form-control" name="skills" id="skills">


</div>
</template>


<script>
export default {

    props:['skills','oldskill'],


    data: function(){

        return{
            habilidades: new Set()
        }
    },
    created:function(){

        if(this.oldskill){
            const skillarray= this.oldskill.split(',');

            console.log(skillarray);

           //agregar el arrayskill en habilidades
           skillarray.forEach( skill => this.habilidades.add(skill) );
        }

    },
    mounted(){
        //console.log(this.skill);
       // console.log(this.oldskill);

        //una vez que los datos estan cargados
        document.querySelector('#skills').value=this.oldskill;
    },

    methods:{

        activar(e){

            //verificamos si funcion el click con el nombre del contenido
            //console.log('ha hecho click aqui', e.target.textContent);

            //Agregamos un color de fondo a cada skill que de click si esta activo o no
            if(e.target.classList.contains('bg-dark')){

                 e.target.classList.remove('bg-dark');

                 //eliminar del set de habilidades
                this.habilidades.delete(e.target.textContent);

            }else{
                 e.target.classList.add('bg-dark');

                 //agregar set de habilidades
                 this.habilidades.add(e.target.textContent);

            }


            //convertir las habilidades en string
            const stringhablidades= [...this.habilidades];
            //Agregar las habilidades al input hidden

            document.querySelector("#skills").value=stringhablidades;

        },
        verificarhabilidadesGuardados(skill){
            console.log(skill);

            return this.habilidades.has(skill) ? 'bg-dark' : '';
        }



    }

}
</script>
