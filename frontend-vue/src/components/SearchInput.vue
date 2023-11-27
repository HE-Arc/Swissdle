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

export default {
    name: "SearchInput",
    data() {
        return {
            cities: [],
            selectedCity: null,
            apiBaseUrl: "http://localhost/api/",
            apiGetCities: "villes",
            apiGetGuess: "ville/guess/"
        };
    },
    methods: {
        getCities() {
            try {
                axios.get(this.apiBaseUrl + this.apiGetCities).then((response) => {
                    (this.cities = response.data)
                })
            } catch (err) {
                alert(err);
                console.log(err);
            }
        },
        guess() {
            try {
                axios.get(this.apiBaseUrl + this.apiGetGuess + this.selectedCity).then((response) => {
                    (console.log(response.data))
                })
            } catch (err) {
                alert(err);
                console.log(err);
            }
        },
    },
    mounted() {
        this.getCities();
    }
}
</script>
<style scoped>
#search-input-component {
    padding-top: 30px;
}
</style>