const app = Vue.createApp({
    data(){
        return{
            nombre: '',
            email: '',
            amigos: [],
            allData: ''
        }
    },
    methods: {
        fecthAllData: function(){
            axios.post('amigosDB.php',{
                action: 'fetchall'
            }).then(function(response){
                this.allData = response.data
                console.log(this.allData)
            })
        },
        agregarAmigo: function (nombre,email){
            axios.post('amigosDB.php',{
                action: 'check',
                nombreAmigo: nombre,
                correoAmigo: email
            }).then(function(response){
                alert(response.data.message)
                console.log(response.data.nombre)
            })
        },
        // eliminarAmigo: function(numero){
        //     numero -= 1
        //     this.amigos.splice(numero,1)
        //     for (var i = numero; i < this.amigos.length; i++) {
        //         if(i <= this.amigos[i].id){ 
        //             this.amigos[i].id-=1
        //         }         
        //     }
            
        // },
    },
    created:function(){
        this.fecthAllData()
    }

})

app.mount('#app')