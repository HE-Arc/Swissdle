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
            <div class="hint" :class="(guess.city.name == nameDailyCity ?'good-guess' : 'bad-guess')">
                <div class="city">
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
                    <DirectionalArrow :populationDiff="guess.pop_diff" v-if="guess.pop_diff != 0"/>
                </div>
                <div class="distance">
                    <p>~{{ Math.round(guess.position_diff.distance) }}km</p>
                    <DirectionalArrow :angleToDailyCity="guess.position_diff.direction" v-if="guess.position_diff.distance != 0" />
                </div>
            </div>
        </template>
    </div>
</template>
<script>
// components
import DirectionalArrow from '@/components/DirectionalArrow.vue';

// services
import CityService from "@/services/CityService";

export default {
    name: "HintsDisplay",
    data() {
        return {
        };
    },
    components: {
        DirectionalArrow
    },
    methods: {
    },
    computed: {
        guesses() {
            return CityService.getGuesses() ? CityService.getGuesses() : "";
        },
        nameDailyCity() {
            return CityService.getDailyCity() ? CityService.getDailyCity().name : "";
        },
    },
    mounted() { }
}
</script>
<style scoped>
#hints-display-component {
    padding-top: 30px;
}

.hint,
.hint-titles {
    display: flex;
}

.hint > div {
    flex: 1;
    border: 1px solid black;
    padding: 10px 5px;
    margin: 10px 5px;
}

.hint-titles > div {
    flex: 1;
    padding: 10px 5px;
    margin: 10px 5px;
    border-bottom: 1px solid black;
}

.hint.bad-guess div.city {
    background-color: #FD9696;
}

.hint.good-guess > div {
    background-color: #83D881;
}

.hint div p,
.hint-titles div p {
    margin: 0;
}

.distance, .population {
    display: flex;
    justify-content: center;
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
}</style>