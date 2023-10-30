<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <HelloWorld msg="Swissdle"/>
  <DailyCity></DailyCity>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'
import DailyCity from './components/DailyCity.vue'

export default {
  name: 'App',
  components: {
    HelloWorld,
    DailyCity
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
