<template>
    <div>
        <img :src="imgDailyCity" alt="Ville du jour">
    </div>
</template>
<script>
import CityService from "@/services/CityService";

export default {
    name: "DailyCity",
    data() { return {}; },
    computed: {
        imgDailyCity() {
            return CityService.getDailyCity() ? CityService.getDailyCity().img : "";
        },
    },
}
</script>
<style scoped>
img {
    width: 55%;
    height: 55vh;
    object-fit: cover;
    border-radius: 5px;
}
</style>