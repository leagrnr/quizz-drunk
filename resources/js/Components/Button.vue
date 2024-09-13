<script setup>
import { defineProps, defineEmits } from 'vue';

const props = defineProps({
    name: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: 'button',
    },
    color: {
        type: String,
        default: 'primary',
    },
    size: {
        type: String,
        default: 'md',
    },
    display: {
        type: String,
        default: 'block',
    },
    margin: {
        type: String,
        default: 'auto',
    },
    selected: {
        type: Boolean,
        default: false,
    },
    isCorrect: {
        type: Boolean,
        default: false,
    },
    width: {
        type: String,
        default: 'auto',
    }
});

const emit = defineEmits(['click', 'navigate']);
</script>

<template>
    <button :type="type" :class="['btn', `btn-${color}`, `btn-${size}`, { 'btn-selected': selected, 'btn-incorrect': !isCorrect && selected }]" :style="{ display: display, margin: margin }"
            @click="$emit('click'); $emit('navigate')">
        {{ name }}
    </button>
</template>

<style scoped>
.btn {
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 0.25rem;
    cursor: pointer;
    font-size: 1rem;
}

.btn-primary {
    background-color: #e1d506;
    color: black;
}

.btn-secondary {
    background-color: #950075;
    color: white;
}

.btn-md {
    font-size: 1rem;
}

.btn-lg {
    font-size: 1.25rem;
}

.btn-sm {
    font-size: 0.875rem;
}

.btn-selected {
    background-color: #950075;
    color: white;
}

.btn-incorrect {
    background-color: white;
    color: black;
}
</style>
