<template>
  <div class="container">
    <h1 class="montserrat">Swissdle</h1>
    <p class="lato guess-text">Guess the City!</p>
    <DailyCity />
    <SearchInput v-show="!win" />
    <WinText v-show="win" />
    <HintsDisplay />
  </div>
</template>

<script>
import axios from "axios";
import CityService from "./services/CityService";

import DailyCity from './components/DailyCity.vue'
import SearchInput from './components/SearchInput.vue';
import HintsDisplay from './components/HintsDisplay.vue';
import WinText from './components/WinText.vue';

export default {
  name: 'App',
  data() {
    return {
      apiBaseUrl: process.env.VUE_APP_API_ENDPOINT,
      apiGetDailyCity: "ville/today",
      apiGetCities: "villes",
    };
  },
  components: {
    DailyCity,
    SearchInput,
    HintsDisplay,
    WinText
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
    },
    setCities() {
      try {
        axios.get(this.apiBaseUrl + this.apiGetCities).then((response) => {
          (CityService.setCities(response.data))
        })
      } catch (err) {
        alert(err);
        console.log(err);
      }
    }
  },
  computed: {
    win() {
      return CityService.getWin() ? CityService.getWin() : false;
    },
  },
  mounted() {
    CityService.setWin(false);
    this.setDailyCity();
    this.setCities();
  }
}
</script>

<style>
@import 'styles/main.css';

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 30px;
}

h1 {
  margin: 0 !important;
}

.guess-text {
  font-style: italic;
}
</style>
