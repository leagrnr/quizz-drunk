<script setup>
import { defineProps, onMounted } from 'vue';

const props = defineProps({
    question: {
        type: Object,
        default: () => ({
            name: 'Loading...',
            good_answer: '',
            false_answer1: '',
            false_answer2: '',
            false_answer3: ''
        })
    }
});

onMounted(() => {
    console.log('Received question prop:', props.question);
});
</script>

<template>
    <!-- Afficher un état de chargement tant que la question n'est pas définie -->
    <div v-if="question.name !== 'Loading...'">
        <div class="p-6 text-gray-900 dark:text-gray-100">{{ question.name }}</div>
        <ul>
            <li>{{ question.good_answer || 'N/A' }}</li>
            <li>{{ question.false_answer1 || 'N/A' }}</li>
            <li>{{ question.false_answer2 || 'N/A' }}</li>
            <li>{{ question.false_answer3 || 'N/A' }}</li>
        </ul>
    </div>
    <div v-else>Loading question...</div>
</template>
