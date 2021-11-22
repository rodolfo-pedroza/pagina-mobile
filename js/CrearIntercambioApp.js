const app1 = Vue.createApp({
    data(){
        return{
            nombreIntercambio: '',
            tema: '',
            monto: '',
            fechaIntercambio: '',
            fechaLimite: '',
            comentarios: '',
            amigos: '',
            invitados: '',
            temas: '',
            agregarAmigo: ''
        }
    },
    methods: {
        agregarIntercambio: function (nombreIntercambio,tema, monto, fechaIntercambio, fechaLimite, comentarios){
            // if(this.amigos.length==0){
            //     lastId = 0
            // }else{
            //     last = this.amigos[this.amigos.length -1]
            //     lastId = last.id
            // }
            // this.amigos.push({id: lastId+=1, nombre: nombre, correo: email})
            // this.nombre= ''
            // this.email= ''
            axios.post('IntercambiosBD.php',{
                action: 'check',
                nombreIntercambio: nombreIntercambio,
                tema: tema,
                monto: monto,
                fechaIntercambio: fechaIntercambio,
                fechaLimite: fechaLimite,
                comentarios: comentarios
            }).then(function(response){
                alert(response.data.message)
            })
        }
    
    }
})

app1.mount('#app')