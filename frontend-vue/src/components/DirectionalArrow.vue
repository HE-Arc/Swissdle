<template>
    <div id="directional-arrow-component">
        <template v-if="angleToDailyCity">
            <svg :style="{ transform: `rotate(${angleToDailyCity}deg)`, transformOrigin: 'center' }" width="28" height="18"
                viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M13.256 4.91108C13.4512 4.71582 13.4512 4.39923 13.256 4.20397L10.074 1.02199C9.87872 0.82673 9.56213 0.82673 9.36687 1.02199C9.17161 1.21725 9.17161 1.53384 9.36687 1.7291L12.1953 4.55753L9.36687 7.38595C9.17161 7.58121 9.17161 7.8978 9.36687 8.09306C9.56213 8.28832 9.87872 8.28832 10.074 8.09306L13.256 4.91108ZM0.902405 5.05753L12.9024 5.05753V4.05753L0.902405 4.05753V5.05753Z"
                    fill="black" />
            </svg>
        </template>
        <template v-else>
            <svg :style="{ transform: `rotate(${ populationDiff == -1 ? -90 : 90 }deg)`, transformOrigin: 'center' }" width="28" height="18"
                viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M13.256 4.91108C13.4512 4.71582 13.4512 4.39923 13.256 4.20397L10.074 1.02199C9.87872 0.82673 9.56213 0.82673 9.36687 1.02199C9.17161 1.21725 9.17161 1.53384 9.36687 1.7291L12.1953 4.55753L9.36687 7.38595C9.17161 7.58121 9.17161 7.8978 9.36687 8.09306C9.56213 8.28832 9.87872 8.28832 10.074 8.09306L13.256 4.91108ZM0.902405 5.05753L12.9024 5.05753V4.05753L0.902405 4.05753V5.05753Z"
                    fill="black" />
            </svg>
        </template>
    </div>
</template>
<script>

export default {
    name: "DirectionalArrow",
    data() {
        return {
        };
    },
    props: {
        angleToDailyCity: {
            type: Number
        },
        populationDiff: {
            type: Number
        }
    },
    methods: {
    },
    computed: {
    },
    mounted() { }
}
</script>
<style scoped>
svg {
    margin-left: 15px;
}
</style>