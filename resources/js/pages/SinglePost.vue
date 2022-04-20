<template>
  <div v-if="post"> <!-- se post è definito, diverso da null, quindi già con la chiamata axios effettuata -->
  
    <h1>{{post.title}}</h1>
    <p v-if="post.category">{{post.content}}</p>
    <h2>{{post.category.name}}</h2>

    <ul>
      <li v-for="tag in post.tags" :key="tag.id">

        {{tag.name}}

      </li>
    </ul>
          
  </div>
</template>

<script>
export default {
    name: 'SinglePost',

    data(){
      return{
        post:null
      }
    },

    mounted() {

      const slug = this.$route.params.slug;

      axios.get('/api/posts/' + slug).then(response => {
        console.log(response);

        if (response.data.success == false) {
          this.$router.push({name: 'not-found'})
        } else {
          this.post = response.data.result;
        }
      });
    }
}
</script>

<style>

</style>