<template>
  <Nav/>
<Login/>
<Todo/>

</template>

<script>

import Nav from './components/My-Nav.vue'
import Login from './components/Form-Login.vue'
import Todo from './components/To-Do.vue'

export default {
  name: 'App',
  components: { Nav , Login , Todo },
  data(){
    return {
  
    }
  },
  methods : {
   
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  height:100vh ;
}

</style>
