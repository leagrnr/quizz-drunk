<template>
    <div>
        <div v-for="question in questions" :key="question.id">
            <p>Nom: {{ question.name }}</p>
            <button class="btn">Bonne réponse: {{ question.good_answer }}</button>
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
        axios.get('/questions_mode1')
            .then(response => {
                this.questions = response.data;
            })
            .catch(error => {
                console.error('There was an error fetching the questions:', error);
            });
    }
};
</script>

<style scoped>
.btn {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>