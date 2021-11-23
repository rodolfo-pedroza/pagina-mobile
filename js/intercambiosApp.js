const app = Vue.createApp({
    data(){
        return{
            // itemList: [
            //     {id: 0, text:'rodolfo', image: "images/regalos.jpg"},
            //     {id: 1, text:'arturo', image: "images/iconoregalo1.jpg"},
            //     {id: 2, text:'daniel', image: "images/iconoregalo.jpg"}
            // ],
            allData: '',
            imageList: [ 'images/regalos.jpg', 'images/iconoregalo1.jpg', 'images/iconoregalo.jpg'],
            random: parseInt(Math.random() * (3)),
        }
    },
    methods: {
        fetchAllData: function(){
            axios.post('mostrarIntercambios.php', {
                action: 'fetchall'
            }).then( response => {
                this.allData = response.data
                console.log(this.random)
                console.log(this.allData)
            })
        },
    },
    created(){
        this.fetchAllData()
    }
})


app.mount('#app')