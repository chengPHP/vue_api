<template>
  <div id="app">
    <app-header></app-header>
    <transition enter-active-class="animated jello">
      <router-view></router-view>
    </transition>
  </div>
</template>

<script>
    import Header from './components/Header'
    export default {
        name: 'App',
        components:{
            "app-header":Header
        }
    }
</script>

<style>
  #app {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }
</style>
