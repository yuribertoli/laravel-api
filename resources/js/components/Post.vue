<template>

    <div class="card">
        <div class="card-body">

            <img :src="post.cover" :alt='post.title'> 
            <h5 class="card-title">{{ post.title }}</h5>
            <p class="card-text">{{ truncateTXT(post.content) }}</p>

            <router-link class="btn btn-primary" :to="{name: 'single-post', params: {slug: post.slug}}">Vedi articolo completo</router-link>

        </div>
    </div>

</template>

<script>
export default {
    name: 'Post',
    props: {
        'post': Object
    },
    methods: {

        truncateTXT(text){

            const lengthTXT = 50;

            if (text.length > lengthTXT) {
                return text.substring(0, lengthTXT) + '...';
            } else {
                return text;
            }
        }
    }
}
</script>

<style>

</style>