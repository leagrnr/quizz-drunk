<script>
import Button from '@/Components/Button.vue';

export default {
    components: {
        Button
    },
    methods: {
        goToMode1() {
            this.$inertia.visit('/Mode1');
        }, 
        goToMode2() {
            this.$inertia.visit('/Mode2');
        },
        goToMode3() {
            this.$inertia.visit('/Mode3');
        }
    }
};
</script>

<template>
    <h1>Choisissez un mode de jeu</h1>
    <hr>
    <div>
        <Button :name="'Mode Classique'" @click="goToMode1">Mode Classique</Button>
    </div>
    <div>
        <Button :name="'Mode bourré'" @click="goToMode2">Mode bourré</Button>
    </div>
    <div>
        <Button :name="'Mode blackout'" @click="goToMode3">Mode blackout</Button>
    </div>
</template>

<style scoped>
/* Ajoutez vos styles ici */
</style>