<template>
    <main>
        <div class="container">
            <h1>Elenco dei post</h1>

            <div class="row">
                <div class="col-6" v-for="post in posts" :key="post.id">
                    <Post :post='post'/>
                </div>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!-- Al click cambio il valore della pagina corrente, se è uguale ad 1 o all'ultima pagina disponibile assegno la classe
                    disabled che in Bootstrap disabilita il click -->
                    <li class="page-item" :class="(currentPage == 1)?'disabled':''" ><span class="page-link" @click="getAxios(currentPage - 1)">Precedente</span></li>
                    <li class="page-item" :class="(currentPage == lastPage)?'disabled':''"><span class="page-link" @click="getAxios(currentPage + 1)">Successivo</span></li>
                </ul>
            </nav>

        </div>
    </main>
</template>

<script>
import Post from '../components/Post.vue';

export default {
    name: 'Posts',
    components: {
        Post
    },
    data() {
        return {
            posts: [],
            currentPage: 1,
            lastPage: null
        }
    },

    methods: {

        getAxios(paginaCorrente){
            axios.get('/api/posts', {
                params: {
                    'page': paginaCorrente  //page rappresenta la pagina corrente e viene rilevato automaticamente dalla funzione paginate() nel controller API
                }                           //passandolo poi come argomento del metodo getAxios posso andare a modificarne il valore
            })
            .then((response) => {

                console.log(response);

                this.posts = response.data.results.data; //salvo dentro la variabile i risultati della chiamata axios
                this.currentPage = response.data.results.current_page; //setto la pagina corrente, derivante dalla paginate() nel controller API
                this.lastPage = response.data.results.last_page;    //setto l'ultima pagina disponibile, dato sempre derivante dalla paginate()
            })
        }
    },

    created() {
        this.getAxios();
    }
}
</script>

<style>

</style>