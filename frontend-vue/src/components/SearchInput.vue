<template>
    <div id="search-input-component">

        <div class="search-container">
            <input class="montserrat" v-model="selectedCity" placeholder="City..."
                @input="showDropdown = (selectedCity.length > 0 ? true : false)" @keyup.enter="onEnterPressed"
                @blur="showDropdown = false" />

            <ul v-show="showDropdown" class="dropdown">
                <li class="lato" v-for="(city, key) in filteredCities" :key="city.id" @mousedown="selectCity(city)" :class="key == 0 ? 'hovered' : ''">
                    {{ city.name }}
                </li>
                <li class="lato" v-show="filteredCities.length == 0">
                    No city found
                </li>
            </ul>
        </div>

        <button class="montserrat" @click="guess">Guess !</button>
    </div>
</template>
<script>
import axios from "axios";
import CityService from "@/services/CityService";
export default {
    name: "SearchInput",
    data() {
        return {
            selectedCity: "",
            apiBaseUrl: "http://localhost/api/",
            apiGetGuess: "ville/guess/",
            showDropdown: false,
        };
    },
    methods: {
        guess() {
            const cityId = this.filteredCities.find(city => city.name.toLowerCase() === this.selectedCity.toLowerCase()).id;
            CityService.removeCity(cityId);
            this.selectedCity = "";

            try {
                axios.get(this.apiBaseUrl + this.apiGetGuess + cityId).then((response) => {
                    (CityService.addGuesses(response.data))
                })
            } catch (err) {
                alert(err);
                console.log(err);
            }
        },
        selectCity(selectedCity) {
            this.selectedCity = selectedCity.name;
        },
        onEnterPressed() {
            if (this.filteredCities.length > 0 && this.selectCity.length > 0) {
                this.selectedCity = this.filteredCities[0].name;
                const cityExists = this.cities.some(city => city.name.toLowerCase() === this.selectedCity.toLowerCase());
                this.showDropdown = false;

                if (cityExists) {
                    this.guess();
                }
            }

        },
    },
    computed: {
        cities() {
            return CityService.getCities() ? CityService.getCities() : "";
        },
        filteredCities() {
            const inputValue = this.selectedCity.toLowerCase();
            return this.cities ? this.cities.filter((city) =>
                city.name.toLowerCase().startsWith(inputValue)
            ) : "No cities found";
        },
    },
    mounted() { }
}
</script>
<style scoped>
#search-input-component {
    padding-top: 30px;
    position: relative;
}

.search-container {
    position: relative;
    display: inline-block;
}

input {
    padding: 5px 15px;
    width: 250px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 18px;
    border-radius: 25px;
}

.dropdown {
    list-style: none;
    padding: 0;
    margin: 10px 0 0 0;
    position: absolute;
    top: 100%;
    left: 0;
    background: #fff;
    border: 1px solid #ccc;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 250px;
    z-index: 1;
}

li {
    font-size: 16px;
    padding: 8px;
    cursor: pointer;
}

li:hover {
    background-color: #f0f0f0;
}

li.hovered {
    background-color: #f0f0f0;
}

button {
    font-size: 18px;
    border-radius: 25px;
    padding: 5px 15px;
    background-color: #83D881;
    border: none;
    color: white;
    margin-left: 30px;
    border: 2px solid #83D881;
    transition: all ease 0.2s;
}

button:hover {
    border: 2px solid #097707;
    color: #097707;
    background-color: transparent;
    transition: all ease 0.2s;
}
</style>