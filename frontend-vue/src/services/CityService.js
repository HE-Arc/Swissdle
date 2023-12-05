// CityService.js
import { ref } from "vue";

const CityService = {
  dailyCity: ref(null),
  cities: ref(null),
  guesses: ref([]),

  setDailyCity(city) {
    this.dailyCity.value = city;
  },

  setCities(cities) {
    this.cities.value = cities;
  },

  addGuesses(guess) {
    const cityName = guess.city.name;

    const isCityExist = this.guesses.value.some(
      (existingGuess) => existingGuess.city.name === cityName
    );

    if (!isCityExist) {
      this.guesses.value.push(guess);
      console.log(this.guesses.value);
    } else {
      console.log(`La ville ${cityName} existe déjà dans les suppositions.`);
    }
  },

  getDailyCity() {
    return this.dailyCity.value;
  },

  getCities() {
    return this.cities.value;
  },

  getGuesses() {
    return this.guesses.value;
  },
};

export default CityService;
