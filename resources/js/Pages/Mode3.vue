<script>
import Button from '@/Components/Button.vue';
import axios from 'axios';
import { Inertia } from '@inertiajs/inertia';

export default {
    components: {
        Button
    },
    data() {
        return {
            questions: []
        };
    },
    mounted() {
        axios.get('/questions_mode3')
            .then(response => {
                this.questions = response.data;
            })
            .catch(error => {
                console.error('There was an error fetching the questions:', error);
            });
    },
    methods: {
        handleGoodAnswerClick() {
            Inertia.visit('/goodreponse');
        }
    }
};
</script>

<template>
    <div>
        <div v-for="question in questions" :key="question.id">
            <h1>{{ question.name }}</h1>
            <hr>
            <Button :name="question.good_answer" @click="handleGoodAnswerClick">{{ question.good_answer }}</Button>
            <Button :name="question.false_answer1">{{ question.false_answer1 }}</Button>
            <Button :name="question.false_answer2">{{ question.false_answer2 }}</Button>
            <Button :name="question.false_answer3">{{ question.false_answer3 }}</Button>
            <hr>
        </div>
    </div>
</template>

<style scoped>
/* Ajoutez vos styles ici */
</style>