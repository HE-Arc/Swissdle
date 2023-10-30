<template>
    <div>
        <img :src="imgDailyCity" alt="Ville du jour">
    </div>
</template>
<script>
import axios from "axios";

export default {
    name: "DailyCity",
    data() {
        return {
            imgDailyCity: "",
            apiGetDailyCity: "/api/ville/today"
        };
    },
    methods: {
        getCity() {
            try {
                axios.get(window.location.origin.replace(/:\d+$/, '') + this.apiGetDailyCity).then((response) => {
                    (this.imgDailyCity = response.data.img)
                })
            } catch (err) {
                alert(err);
                console.log(err);
            }
        }
    },
    mounted() {
        this.getCity();
    }
}
</script>
<style scoped>
img {
    width: 70%;
    height: 65vh;
    object-fit: cover;
}
</style>