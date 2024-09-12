<script setup>
import { defineProps, defineEmits } from 'vue';

const props = defineProps({
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
        default: 'inline-block',
    },
    margin: {
        type: String,
        default: 'auto',
    },
    name: {
        type: String,
        required: true,
    },
});

const emit = defineEmits(['click']);
</script>

<template>
    <button :type="type" :class="['btn', `btn-${color}`, `btn-${size}`]" :style="{ display: display, margin: margin }"
            @click="$emit('click')">
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
    background-color: #007bff;
    color: white;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
}

/* Add more color classes as needed */
</style>