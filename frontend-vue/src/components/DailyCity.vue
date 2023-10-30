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
            apiBaseUrl: "http://localhost/api/",
            apiGetDailyCity: "ville/today"
        };
    },
    methods: {
        getCity() {
            try {
                axios.get(this.apiBaseUrl + this.apiGetDailyCity).then((response) => {
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
    width: 80%;
    height: 70%;
    object-fit: cover;
}
</style>