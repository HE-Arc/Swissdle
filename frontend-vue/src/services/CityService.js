// CityService.js
import { ref } from "vue";

const CityService = {
  dailyCity: ref(null),
  cities: ref(null),
  guesses: ref([]),
  win: ref(Boolean),

  setDailyCity(city) {
    this.dailyCity.value = city;
  },

  setWin(win) {
    this.win.value = win;
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

  getWin() {
    return this.win.value;
  },

  getCities() {
    return this.cities.value;
  },

  removeCity(cityId) {
    const index = this.cities.value.findIndex((city) => city.id === cityId);
    if (index !== -1) {
      this.cities.value.splice(index, 1);
    } else {
      console.warn(
        `La ville avec l'ID ${cityId} n'a pas été trouvée dans la liste.`
      );
    }
  },

  getGuesses() {
    return this.guesses.value;
  },
};

export default CityService;
