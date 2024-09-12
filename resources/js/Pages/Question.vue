<template>
    <div>
        <h1>Liste des joueurs</h1>
        <ul>
            <li v-for="player in players" :key="player">
                {{ player }}
            </li>
        </ul>
    </div>
</template>

<script>
import { usePlayerStore } from '@/stores/playerStore';

export default {
    computed: {
        players() {
            const playerStore = usePlayerStore();  // Accéder au store Pinia
            return playerStore.players;  // Récupérer les joueurs stockés dans Pinia
        },
    },
    mounted() {
        const playerStore = usePlayerStore();
        // Si tu veux récupérer les joueurs du backend au chargement de la page
        if (playerStore.players.length === 0) {
            playerStore.setPlayers(this.$page.props.players);  // Charger les joueurs injectés par Inertia
        }
    },
};
</script>
