<template>
    <div id="hints-display-component">
        <div class="hint-titles">
            <div class="city-title title">
                <p>City</p>
            </div>
            <div class="lang-title title">
                <p>Lang</p>
            </div>
            <div class="canton-title title">
                <p>Canton</p>
            </div>
            <div class="population-title title">
                <p>Population</p>
            </div>
            <div class="distance-title title">
                <p>Distance</p>
            </div>
        </div>
        <template v-for="guess in guesses.slice().reverse()" :key="guess.city.id">
            <div class="hint">
                <div class="city" :class="'hint-' + (Object.keys(guess).length > 1 ? '1' : '0')">
                    <p>{{ guess.city.name }}</p>
                </div>
                <div class="lang">
                    <p>{{ guess.city.langues }}</p>
                </div>
                <div class="canton" :class="'hint-' + (guess.canton_diff ? '0' : '1')">
                    <p>{{ guess.city.canton.name }}</p>
                </div>
                <div class="population">
                    <p> {{ guess.city.population }}</p>
                </div>
                <div class="distane">
                    <p>{{ guess.city.coord }}</p>
                </div>
            </div>
        </template>
    </div>
</template>
<script>
import CityService from "@/services/CityService";

export default {
    name: "HintsDisplay",
    data() {
        return {
        };
    },
    methods: {
    },
    computed: {
        guesses() {
            return CityService.getGuesses() ? CityService.getGuesses() : "";
        },
    },
    mounted() { }
}
</script>
<style scoped>
#hints-display-component {
    padding-top: 30px;
}

.hint, .hint-titles {
    display: flex;
}

.hint div, .hint-titles div {
    flex: 1;
    border: 1px solid black;
    padding: 10px 5px;
    margin: 10px 5px;
}

.hint div p, .hint-titles div p {
    margin: 0;
}

.hint-1 {
    background-color: #FD9696;
}

.hint-0 {
    background-color: #83D881;
}

.hint-orange {
    background-color: #FAB16E;
}

.hint-yellow {
    background-color: #FAE46E;
}
</style>