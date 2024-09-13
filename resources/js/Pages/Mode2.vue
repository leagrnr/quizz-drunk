<script>
import Button from '@/Components/Button.vue';
import axios from 'axios';

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
        axios.get('/questions_mode2')
            .then(response => {
                this.questions = response.data;
            })
            .catch(error => {
                console.error('There was an error fetching the questions:', error);
            });
    }
};
</script>
<template >
    <div>
        <div v-for="question in questions" :key="question.id">
            <h1>{{ question.name }}</h1>
            <hr>
            <Button :name="question.good_answer" margin="1rem auto 1rem auto">{{ question.good_answer }}</Button>
            <Button :name="question.false_answer1" margin="1rem auto 1rem auto">{{ question.false_answer1 }}</Button>
            <Button :name="question.false_answer2" margin="1rem auto 1rem auto" width="50vw">{{ question.false_answer2 }}</Button>
            <Button :name="question.false_answer3" margin="1rem auto 1rem auto" width="50vw">{{ question.false_answer3 }}</Button>
        </div>
    </div>
</template>



<style scoped>

</style>
