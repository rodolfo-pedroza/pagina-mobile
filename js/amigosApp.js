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
                alert(response.data.message)
            })
        },
        eliminarAmigo: function(idlogin){
           axios.post('amigosDB.php',{
               action: 'delete',
               IDLOGIN: idlogin
           }).then(response => {
               this.fecthAllData()
               alert(response.data.message)
           })
            
        },
    },
    created(){
        this.fecthAllData()
    }

})

app.mount('#app')