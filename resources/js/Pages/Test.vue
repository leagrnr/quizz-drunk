<script setup>
import { ref } from 'vue';
import '../../css/app.css';
import Header from "@/Components/Header.vue";
import Button from "@/Components/Button.vue";

const playerNames = ref([]);
const playerInputs = ref(['']);

const handleAddPlayerClick = () => {
    playerInputs.value.push('');
};

const handleSavePlayerClick = () => {
    playerNames.value = playerInputs.value.filter(name => name.trim() !== '');
    playerInputs.value = [''];
};
</script>

<template>
    <div>
        <Header title="Joueurs" />
        <Button name="Ajouter un joueur" @click="handleAddPlayerClick" />
        <div v-for="(input, index) in playerInputs" :key="index">
            <input type="text" v-model="playerInputs[index]" placeholder="Entrez le nom du joueur" />
        </div>
        <Button name="Enregistrer joueur" @click="handleSavePlayerClick" />
        <div v-if="playerNames.length">
            <h2>Liste des joueurs:</h2>
            <ul>
                <li v-for="(name, index) in playerNames" :key="index">{{ name }}</li>
            </ul>
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
