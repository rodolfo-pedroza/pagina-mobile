const app = Vue.createApp({
    data(){
        //los datos se deberan de sacar de la DB
        return{
            nombreIntercambio: 'Intercambio de pardo',
            selected: 'Navidad', //tema escogio originalmente
            temas: ['Navidad', 'Cumpleanos','Ano nuevo'],            
            monto: 500
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
        }
    }
})


app.mount('#app')