const app = Vue.createApp({
    data(){
        //los datos se deberan de sacar de la DB
        return{
            nombreIntercambio: '',
            selected: '', //tema escogio originalmente
            temas: ['Navidad', 'Cumpleanos','Año nuevo'],            
            monto: 500,
            fechalimite: '',
            fechaIntercambio: '',
            clave: '',
            invitados: '',
            comentarios: '',
            clave: '',
            allData: '',
            participantes: '',
            tema: '',
            fecha: '',
            data: ''
        }
    },
    methods: {
        fetchAllData: function(){
            axios.post('detallesIntercambio.php', {
                action: 'fetchall'
            }).then( response => {
                console.log(response.data)
                this.allData = response.data[0]
                this.nombreIntercambio = this.allData.NOMBRE
                this.tema = this.allData.TEMA
                this.monto = this.allData.MONTO
                this.fechalimite = this.allData.FECHALIMITE
                this.fechaIntercambio = this.allData.FECHAINTERCAMBIO
                this.comentarios = this.allData.COMENTARIO
                this.clave = this.allData.CLAVE
                this.data = [...response.data]
                this.data.splice(0,1)
                this.participantes = this.data
                console.log(this.participantes)
            })
        },
        cambiarNombre: function(nombre){
            this.nombreIntercambio = nombre
            console.log(this.nombreIntercambio)
        },
        cambiarTema: function(tema){
            this.tema = tema
            console.log(this.tema)
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
        eliminarParticipante: function(idlogin){
            console.log(idlogin)
            axios.post('detallesIntercambio.php',{
                action: 'delete',
                IDLOGIN: idlogin
            }).then(response => {
                this.fetchAllData()
                alert(response.data.message)
            })
         },
        guardarCambios: function(){
            // console.log(this.fecha)
            // console.log(this.fechaIntercambio)
            // console.log(this.tema)
            axios.post('detallesIntercambio.php', {
                action:'insert',
                nombre: this.nombreIntercambio,
                tema: this.tema,
                monto: this.monto,
                fechaLimite: this.fechalimite,
                fechaIntercambio: this.fechaIntercambio,
                comentarios: this.comentarios
            })
            .then( response =>{
                this.fetchAllData()
                alert(response.data.message)
            })
        }
    },
    created(){
        this.fetchAllData()
    }
})


app.mount('#app')