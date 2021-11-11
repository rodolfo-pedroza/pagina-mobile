const app = Vue.createApp({
    data(){
        return{
            selected: '',
            temas: ['Navidad', 'Cumpleanos','Ano nuevo'],
            //los amigos se deben de sacar de la DB
            amigos: ['Arturo','Rodolfo', 'Daniel'],
            invitados: [],
        }
    },
    methods: {
        agregar(amigo){
            if (!this.invitados.includes(amigo)){
            this.invitados.push(amigo)
        }
        }
    }
})


app.mount('#app')