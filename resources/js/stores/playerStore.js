// stores/playerStore.js
import { defineStore } from 'pinia';

export const usePlayerStore = defineStore('playerStore', {
    state: () => ({
        players: [],
    }),
    persist: true,
    actions: {
        addPlayer(playerName) {
            this.players.push(playerName);
        },
        removePlayer(playerName) {
            this.players = this.players.filter(player => player !== playerName);
        },
    }
});
