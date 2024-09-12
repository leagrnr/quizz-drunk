
<template>
    <div>
        <button @click="goToMode2">Mode 2</button>
    </div>
    <div>
        <button @click="goToMode1">Mode 1</button>
    </div>
</template>

<script>
import Button from '@/Components/Button.vue';
export default {
    methods: {
        goToMode1() {
            this.$inertia.visit('/Mode1');
        }, 
        goToMode2() {
            this.$inertia.visit('/Mode2');
        }
    }
    
};
</script>

<style scoped>
button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>