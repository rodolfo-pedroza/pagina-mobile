const app = Vue.createApp({
    data(){
        //los datos se deberan de sacar de la DB
        return{
            nombreIntercambio: 'Intercambio de pardo',
            selected: 'Navidad', //tema escogio originalmente
            temas: ['Navidad', 'Cumpleanos','Ano nuevo'],            
            monto: 500,
            fechalimite: '2021-12-18',
            fechaIntercambio: '2021-12-25',
            invitados: [
                {id: 1, nombre: 'rodo', correo: 'ejemplo@gmail.com'},
                {id: 2, nombre: 'arturo', correo: 'ejemplo1@gmail.com'},
                {id: 3, nombre: 'rodrigo', correo: 'ejemplo2@gmail.com'},
                {id: 4, nombre: 'melissa', correo: 'ejemplo3@gmail.com'},
                {id: 5, nombre: 'andrea', correo: 'ejemplo4@gmail.com'},
                {id: 6, nombre: 'daniel', correo: 'ejemplo5@gmail.com'}
            ],
            comentarios: 'Tienen que venir disfrazados de elefantes'
        }
    },
    methods: {
        cambiarNombre: function(nombre){
            this.nombreIntercambio = nombre
            console.log(this.nombreIntercambio)
        },
        cambiarTema: function(tema){
            this.selected = tema
            console.log(this.selected)
        },
        cambiarMonto: function(monto){
            this.monto = monto
            console.log(this.monto)
        },
        cambiarFechaLimite: function(fecha){
            this.fechalimite = fecha
            console.log(this.fechalimite)
        },
        cambiarFechaIntercambio: function(fecha){
            this.fechaIntercambio = fecha
            console.log(this.fechaIntercambio)
        },
        cambiarComentarios: function(texto){
            this.comentarios = texto
            console.log(this.comentarios)
        },
        eliminarInvitado: function(numero){
            numero -= 1
            if(numero > -1){
                this.invitados.splice(numero,1)
                for (var i = numero; i < this.invitados.length; i++) {
                    if(i <= this.invitados[i].id){ 
                        this.invitados[i].id-=1
                    }         
                }
            }
        },
        guardarCambios: function(){
            console.log(` ${this.nombreIntercambio} ${this.selected} ${this.monto} ${this.fechalimite} ${this.fechaIntercambio} ${this.comentarios}`)
            this.invitados.forEach(element => {
                console.log(element.id)
                console.log(element.nombre)
                console.log(element.correo)
            });
        }
    },
    // components: {
    //     'col-invitado':
    // }
})


app.mount('#app')