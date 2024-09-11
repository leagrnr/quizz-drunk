<template>
    <div>
        <div v-for="question in questions" :key="question.id">
            <p>Nom: {{ question.name }}</p>
            <p>Bonne réponse: {{ question.good_answer }}</p>
            <p>Fausse réponse 1: {{ question.false_answer1 }}</p>
            <p>Fausse réponse 2: {{ question.false_answer2 }}</p>
            <p>Fausse réponse 3: {{ question.false_answer3 }}</p>
            <hr>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            questions: []
        };
    },
    mounted() {
        axios.get('/questions')
            .then(response => {
                this.questions = response.data;
            })
            .catch(error => {
                console.error('There was an error fetching the questions:', error);
            });
    }
};
</script>
