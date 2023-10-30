<template>
  <div class="container">
    <h1>Swissdle</h1>
    <DailyCity></DailyCity>
  </div>
</template>

<script>
import DailyCity from './components/DailyCity.vue'

export default {
  name: 'App',
  components: {
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
