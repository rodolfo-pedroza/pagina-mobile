const app = Vue.createApp({
    data(){
        return{
            nombre: '',
            email: '',
            amigos: [
                {id: 1, nombre: 'rodo', correo: 'ejemplo@gmail.com'},
                {id: 2, nombre: 'arturo', correo: 'ejemplo1@gmail.com'},
                {id: 3, nombre: 'rodrigo', correo: 'ejemplo2@gmail.com'},
                {id: 4, nombre: 'melissa', correo: 'ejemplo3@gmail.com'},
                {id: 5, nombre: 'andrea', correo: 'ejemplo4@gmail.com'},
                {id: 6, nombre: 'daniel', correo: 'ejemplo5@gmail.com'}
            ]
        }
    },
    methods: {
        agregarAmigo: function (nombre,email){
            // if(this.amigos.length==0){
            //     lastId = 0
            // }else{
            //     last = this.amigos[this.amigos.length -1]
            //     lastId = last.id
            // }
            // this.amigos.push({id: lastId+=1, nombre: nombre, correo: email})
            // this.nombre= ''
            // this.email= ''
            axios.post('amigosDB.php',{
                action: 'check',
                nombreAmigo: nombre,
                correoAmigo: email
            }).then(function(response){
                alert(response.data.id)
            })
        },
        eliminarAmigo: function(numero){
            numero -= 1
            this.amigos.splice(numero,1)
            for (var i = numero; i < this.amigos.length; i++) {
                if(i <= this.amigos[i].id){ 
                    this.amigos[i].id-=1
                }         
            }
            
        }
    }
})

app.mount('#app')