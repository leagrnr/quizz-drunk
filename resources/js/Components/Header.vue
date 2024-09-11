<script setup>
import '../../css/app.css';

const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    margin: {
        type: String,
        default: '0 0 2rem 0',
    },
});
</script>

<template>
    <div>
        <h1 :style="{ margin: margin }">{{ title }}</h1>
    </div>
</template>

<style scoped>

</style>
