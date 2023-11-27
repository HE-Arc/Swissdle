// CityService.js
import { ref } from 'vue';

const CityService = {
  villeDuJour: ref(null),
  
  setDailyCity(ville) {
    this.villeDuJour.value = ville;
  },
  
  getDailyCity() {
    return this.villeDuJour.value;
  },
};

export default CityService;
