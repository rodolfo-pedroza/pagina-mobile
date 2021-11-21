const app = Vue.createApp({
    data(){
        return{
            temas: ['Navidad', 'Cumpleanos','Ano nuevo'],
            //los amigos se deben de sacar de la DB
            amigos: [
                {id: 1, nombre: 'rodo', correo: 'ejemplo@gmail.com'},
                {id: 2, nombre: 'arturo', correo: 'ejemplo1@gmail.com'},
                {id: 3, nombre: 'rodrigo', correo: 'ejemplo2@gmail.com'},
                {id: 4, nombre: 'melissa', correo: 'ejemplo3@gmail.com'},
                {id: 5, nombre: 'andrea', correo: 'ejemplo4@gmail.com'},
                {id: 6, nombre: 'daniel', correo: 'ejemplo5@gmail.com'}
            ],
            
            //datos que se van a guardar en la DB
            nombreIntercambio: '',
            tema: '',
            monto: '',
            fechaIntercambio: '',
            fechaLimite: '',
            invitados: [],      
            comentarios: ''
        }
    },
    methods: {
        agregarAmigo:function(event){
            // this.invitados.push(amigo)
            amigo = event.target.value
            if (!this.invitados.includes(amigo)){
                this.invitados.push(amigo)
            }            
        },
        insertData: function(){
            console.log(this.nombreIntercambio, this.tema, this.monto, this.fechaIntercambio, this.fechaLimite, this.invitados, this.comentarios)
            alert('Listo')
            axios.post('intercambio.php', {
                action:'insert',
                nombre: this.nombreIntercambio,
                tema: this.tema,
                monto: parseInt(this.monto),
                fechaIntercambio: this.fechaIntercambio,
                fechaLimite: this.fechaLimite,
                invitados: this.invitados,
                comentarios: this.comentarios
            }).then(function(response){
                alert(response.data.message)
            })
        }
    }
})


app.mount('#app')