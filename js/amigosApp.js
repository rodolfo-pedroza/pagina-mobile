const app = Vue.createApp({
    data(){
        return{
            nombre: '',
            email: '',
            allData: [],
            DataPartiInter: [],
            nombreamigo: '',
            correoamigo: '',
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
        eliminarInvitado: function(idlogin, idintercambio){
            axios.post('amigosDB.php',{
                action: 'deleteInvi',
                IDLOGIN: idlogin,
                IDINTERCAMBIO: idintercambio
            }).then(response => {
                this.fecthPartiInter(response.data.idinter)
                alert(response.data.message)
            })
             
         },
        fecthPartiInter: function(idintercambio){
            axios.post('amigosDB.php',{
                action: 'fetchparticipantes',
                IDINTERCAMBIO: idintercambio
            }).then(response => {
                this.DataPartiInter = response.data
                console.log(this.DataPartiInter)
            })
        },
        agregarAmigoToInter: function (idlogin, idintercambio){
            axios.post('amigosDB.php',{
                action: 'addToInter',
                IDLOGIN: idlogin,
                IDINTERCAMBIO: idintercambio
            }).then(response => {
                this.fecthPartiInter(response.data.idinter)
                console.log(response.data)
                alert(response.data.message + " y " + response.data.idinter)
            })
        },
        
    },
    created(){
        this.fecthAllData()
    }

})

app.mount('#app')