<script setup>
import { ref, onMounted } from 'vue';
import { usePlayerStore } from '@/stores/playerStore';
import { Inertia } from '@inertiajs/inertia';
import '../../css/app.css';
import Header from "@/Components/Header.vue";
import Button from "@/Components/Button.vue";

const playerStore = usePlayerStore();
const playerInputs = ref(['']);

const handleAddPlayerClick = () => {
    playerInputs.value.push('');
};

const handleSavePlayerClick = () => {
    playerInputs.value.forEach(name => {
        if (name.trim() !== '') {
            playerStore.addPlayer(name);
        }
    });
    playerInputs.value = [''];
    console.log('Updated playerStore:', playerStore.playerNames);
};

const navigateToQuestion = () => {
    Inertia.visit('/question');
};

onMounted(() => {
    console.log('Initial playerStore:', playerStore.playerNames);
});
</script>

<template>
    <div>
        <Header title="Joueurs"/>
        <Button name="Ajouter un joueur" @click="handleAddPlayerClick"/>
        <div v-for="(input, index) in playerInputs" :key="index">
            <input type="text" v-model="playerInputs[index]" placeholder="Entrez le nom du joueur"/>
        </div>
        <Button name="Enregistrer joueur" @click="handleSavePlayerClick"/>
        <Button name="Aller à la page Question" @click="navigateToQuestion"/>
        <div v-if="playerStore.playerNames.length">
            <h2>Liste des joueurs:</h2>
            <ul>
                <li v-for="(name, index) in playerStore.playerNames" :key="index">{{ name }}</li>
            </ul>
        </div>
    </div>
</template>

<style scoped>
input {
    display: block;
    margin: 1rem auto;
    padding: 0.5rem;
    font-size: 1rem;
    color: black;
    border: 1px solid black;
    border-radius: 1rem;
}
</style>
