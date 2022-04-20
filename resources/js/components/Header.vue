<template>
  <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
              <li class="nav-item">
                <!-- <a class="nav-link" href="/">Home</a> -->
                <router-link class="nav-link" :to="{name: 'home'}">Home</router-link>
              </li>

              <li class="nav-item">
                <!-- <a class="nav-link" href="/chi-siamo">Chi siamo</a> -->
                <router-link class="nav-link" :to="{name: 'about'}">Chi siamo</router-link>
              </li>

              <li class="nav-item">
                <!-- <a class="nav-link" href="/contatti">Contatti</a> -->
                <router-link class="nav-link" :to="{name: 'contacts'}">Contatti</router-link>
              </li>

              <li class="nav-item">
                <!-- <a class="nav-link" href="/contatti">Contatti</a> -->
                <router-link class="nav-link" :to="{name: 'blog'}">Articoli</router-link>
              </li>
           
            </ul>

            <ul>
              <li class="nav-item">
                <a class="nav-link" href="/admin">Admin</a>
              </li>
            </ul>
            
        </div>
      </nav>
  </header>
</template>

<script>
export default {
    name: "Header"
}
</script>

<style>
  .router-link-exact-active{
    border-bottom: 1px solid black;
  }
</style>