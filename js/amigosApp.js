const app = Vue.createApp({
    data(){
        return{
            nombre: '',
            email: '',
            allData: [],
            nombreamigo: '',
            correoamigo: ''
        }
    },
    methods: {
        fecthAllData: function(){
            axios.post('amigosDB.php',{
                action: 'fetchall'
            }).then(response => {
                this.allData = response.data
                console.log(this.allData)
            })
        },
        agregarAmigo: function (nombre,email){
            axios.post('amigosDB.php',{
                action: 'check',
                nombreAmigo: nombre,
                correoAmigo: email
            }).then(response =>{
                this.nombre= '',
                this.email='',
                this.fecthAllData()
                console.log(allData[0].Usuario)
                alert(response.data.message)
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
    created(){
        this.fecthAllData()
    }

})

app.mount('#app')