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
            newPlayer: '',
        };
    },
    computed: {
        players() {
            const playerStore = usePlayerStore();
            return playerStore.players;
        },
    },
    methods: {
        addNewPlayer() {
            const playerStore = usePlayerStore();
            if (this.newPlayer) {
                playerStore.addPlayer(this.newPlayer);
                this.newPlayer = '';
            }
        },
        removePlayer(playerName) {
            const playerStore = usePlayerStore();
            playerStore.removePlayer(playerName);
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

            <input v-model="newPlayer" placeholder="Ajouter un joueur" />
            <Button @click="addNewPlayer" name="Ajouter" />

        <ul>
            <li v-for="player in players" :key="player" id="listplayer">
                {{ player }}
                <Button @click="removePlayer(player)" name="Supprimer" margin="0 0 0 1rem"/>
            </li>
        </ul>
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
    margin: 1rem 0 0.5rem 0;;
}

</style>
