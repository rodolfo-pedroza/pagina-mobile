const app = Vue.createApp({
    data(){
        return{
            allData: '',
            imageList: [ 'images/regalos.jpg', 'images/iconoregalo1.jpg', 'images/iconoregalo.jpg'],
            random: parseInt(Math.random() * (3))
        }
    },
    methods: {
        fetchAllData: function(){
            axios.post('mostrarIntercambios.php', {
                action: 'fetchall'
            }).then( response => {
                this.allData = response.data
                console.log(this.allData)
            })
        },
        detalles: function(clave){
            axios.post('mostrarIntercambios.php', {
                action: 'intercambio',
                intercambio: clave    
            }).then(response => {
                window.location = "infoInter.php"
                // console.log(response.data.clave)
            })
        }
    },
    created(){
        this.fetchAllData()
    }
})


app.mount('#app')