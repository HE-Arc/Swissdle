<template>
    <div id="win-text-container">
        <p class="montserrat" ref="winText">Good guess ! Well Done !</p>
    </div>
</template>
<script>
import { TweenMax, Power1 } from "gsap";

export default {
    name: "WinText",
    data() {
        return {
            winText: null,
        };
    },
    methods: {
        animateText() {
            TweenMax.to(this.winText, 1, {
                y: 10,
                ease: Power1.easeInOut,
                yoyo: true,
                repeat: -1,
            });
        },
    },
    mounted() {
        this.winText = this.$refs.winText;
        this.animateText();
    }
}

</script>
<style scoped>
#win-text-container {
    padding-top: 20px;
}

p {
    margin: 0;
    font-size: 24px;
    color: #83D881;
}
</style>