const app = Vue.createApp({
    data(){
        return {
            books : [
                {title : "titre 1" , author : "jp" , release : 2023 , cover : 'assets/cover1.jpg' , isFav : true},
                {title : "titre 2" , author : "jean" , release : 2012 , cover : 'assets/cover2.jpg' , isFav : false},
                {title : "titre 3" , author : "pierre" , release : 1968 , cover : 'assets/cover3.jpg' , isFav : true},
            ],
            afficher:true,
            showBooks:true,
             // title  : 'titre 4',
             // author : 'moi',
             // age: 87,
            x:0,
            y:0,
        }
    },
    methods:{
        changeTitle(abc){
            // this.title = "something else"
        this.title = abc
        },

        afficherLivres(){
            this.afficher = !this.afficher
        },

        favorite(book){
            book.isFav = !book.isFav
        },

        // e est un object qui contient tout les paramettre du client
        handleEvent(e , data){
            console.log(e , e.type)
            if(data) {
                console.log(data)
            }
        },
        handleMouseMove(e){
    this.x = e.offsetX
    this.y = e.offsetY
        }

    }
})

app.mount('#app')