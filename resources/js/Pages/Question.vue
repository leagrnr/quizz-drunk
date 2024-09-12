<script setup>
import { usePlayerStore } from '@/stores/playerStore';
import Header from "@/Components/Header.vue";

const playerStore = usePlayerStore();
console.log('Loaded playerStore in Question.vue:', playerStore.playerNames);
</script>

<template>
    <div>
        <Header title="Question"/>
        <div v-if="playerStore.playerNames.length">
            <h2>Liste des joueurs:</h2>
            <ul>
                <li v-for="(name, index) in playerStore.playerNames" :key="index">{{ name }}</li>
            </ul>
        </div>
        <div v-else>
            <p>Aucun joueur ajouté pour l'instant.</p>
        </div>
    </div>
</template>

<style scoped>
ul {
    list-style-type: none;
    padding: 0;
}
li {
    padding: 0.5rem 0;
}
</style>
