// stores/playerStore.js
import { defineStore } from 'pinia';

export const usePlayerStore = defineStore('playerStore', {
    state: () => ({
        playerNames: []
    }),
    actions: {
        addPlayer(name) {
            this.playerNames.push(name);
            console.log('Player added:', name);
            console.log('Current playerNames:', this.playerNames);
        }
    }
});
