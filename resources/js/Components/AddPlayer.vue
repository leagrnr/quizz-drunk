<script setup>
import { ref } from 'vue';
import '../../css/app.css';
import Header from "@/Components/Header.vue";
import Button from "@/Components/Button.vue";

const showInput = ref(false);
const playerName = ref('');
const submittedPlayerName = ref('');

const handleAddPlayerClick = () => {
    showInput.value = true;
};

const handleSavePlayerClick = () => {
    submittedPlayerName.value = playerName.value;
    playerName.value = '';
    showInput.value = false;
};
</script>

<template>
    <div>
        <Header title="Joueurs" />
        <Button name="Ajouter un joueur" @click="handleAddPlayerClick" />
        <div v-if="showInput">
            <input type="text" v-model="playerName" placeholder="Entrez le nom du joueur" />
            <Button name="Enregistrer joueur" @click="handleSavePlayerClick" />
        </div>
        <div v-if="submittedPlayerName">
            <p>Nom du joueur: {{ submittedPlayerName }}</p>
        </div>
    </div>
</template>

<style scoped>
input {
    display: block;
    margin: 1rem 0;
    padding: 0.5rem;
    font-size: 1rem;
}
</style>
