<script>
import { usePlayerStore } from '@/stores/playerStore';
import Button from '@/Components/Button.vue';
import Header from "@/Components/Header.vue";

export default {
    components: {
        Header,
        Button,
    },
    data() {
        return {
            playerFields: JSON.parse(localStorage.getItem('playerFields')) || [''],
        };
    },
    computed: {
        players() {
            const playerStore = usePlayerStore();
            return playerStore.players;
        },
        allFieldsFilled() {
            return this.playerFields.every(field => field.trim() !== '');
        }
    },
    methods: {
        addNewPlayer() {
            if (!this.allFieldsFilled) {
                console.log('Not all fields are filled. Showing alert.');
                this.showAlert();
                return;
            }
            const playerStore = usePlayerStore();
            this.playerFields.forEach((player) => {
                if (player) {
                    playerStore.addPlayer(player);
                }
            });
            localStorage.setItem('playerFields', JSON.stringify(this.playerFields));
        },
        removePlayer(playerName) {
            const playerStore = usePlayerStore();
            playerStore.removePlayer(playerName);
        },
        addPlayerField() {
            this.playerFields.push('');
            localStorage.setItem('playerFields', JSON.stringify(this.playerFields));
        },
        updatePlayerField(index, value) {
            this.playerFields[index] = value;
        },
        removePlayerField(index) {
            const playerStore = usePlayerStore();
            const playerName = this.playerFields[index];
            if (playerName) {
                playerStore.removePlayer(playerName);
            }
            this.playerFields.splice(index, 1);
            localStorage.setItem('playerFields', JSON.stringify(this.playerFields));
        },
        showAlert() {
            alert('Veuillez remplir tous les champs.');
        },
        goToListMode() {
            this.$inertia.visit('/Modeliste');
        },
    },
    mounted() {
        const playerStore = usePlayerStore();
        playerStore.setPlayers(this.$page.props.players);
    },
};
</script>

<template>
    <div>
        <Header title="Joueurs"/>

        <div class="nameplayer" v-for="(playerField, index) in playerFields" :key="index">
            <input v-model="playerFields[index]" placeholder="Ajouter un joueur"
                   @input="updatePlayerField(index, $event.target.value)"/>
            <Button @click="removePlayerField(index)" name="X" margin="0 0 0 1rem" class="btn-secondary"/>
        </div>

        <Button color='secondary' @click="addPlayerField" name="Ajouter un joueur" margin="0 auto 1rem auto"/>

        <Button :disabled="!allFieldsFilled" @click="addNewPlayer(); goToListMode()" name="Commencer"/>

<!--        <ul>-->
<!--            <li v-for="player in players" :key="player" id="listplayer">-->
<!--                {{ player }}-->
<!--                <Button @click="removePlayer(player)" name="Supprimer" margin="0 0 0 1rem"/>-->
<!--            </li>-->
<!--        </ul>-->
    </div>
</template>

<style>
input {
    color: black;
    border-radius: 2rem;
    margin: 1rem 0 1rem 0;
}

#listplayer {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    margin: 1rem 0 0.5rem 0;
}

.nameplayer {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    margin: 1rem 0 0.5rem 0;
}
</style>
