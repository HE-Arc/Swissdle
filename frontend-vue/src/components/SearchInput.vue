<template>
    <div id="search-input-component">
        <select v-if="cities.length > 0" v-model="selectedCity">
            <option v-for="city in cities" :key="city.id" :value="city.id">
                {{ city.name }}
            </option>
        </select>
        <button @click="guess">Guess</button>
    </div>
</template>
<script>
import axios from "axios";
import CityService from "@/services/CityService";

export default {
    name: "SearchInput",
    data() {
        return {
            selectedCity: null,
            apiBaseUrl: "http://localhost/api/",
            apiGetGuess: "ville/guess/"
        };
    },
    methods: {
        guess() {
            try {
                axios.get(this.apiBaseUrl + this.apiGetGuess + this.selectedCity).then((response) => {
                    (CityService.addGuesses(response.data))
                })
            } catch (err) {
                alert(err);
                console.log(err);
            }
        },
    },
    computed: {
        cities() {
            return CityService.getCities() ? CityService.getCities() : "";
        },
    },
    mounted() { }
}
</script>
<style scoped>
#search-input-component {
    padding-top: 30px;
}
</style>