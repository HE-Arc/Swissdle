<template>
  <div class="container">
    <h1>Swissdle</h1>
    <p>Guess the City!</p>
    <DailyCity />
    <SearchInput />
  </div>
</template>

<script>
import axios from "axios";
import CityService from "./services/CityService";

import DailyCity from './components/DailyCity.vue'
import SearchInput from './components/SearchInput.vue';

export default {
  name: 'App',
  data() {
    return {
      apiBaseUrl: "http://localhost/api/",
      apiGetDailyCity: "ville/today"
    };
  },
  components: {
    DailyCity,
    SearchInput,
  },
  methods: {
    setDailyCity() {
      try {
        axios.get(this.apiBaseUrl + this.apiGetDailyCity).then((response) => {
          (CityService.setDailyCity(response.data))
        })
      } catch (err) {
        alert(err);
        console.log(err);
      }
    }
  },
  mounted() {
    this.setDailyCity();
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
