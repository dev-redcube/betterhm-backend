<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'w-full flex min-h-8 p-1 rounded text-left text-primary-500 font-bold focus:outline-none focus:ring focus:ring-primary-200 dark:focus:ring-gray-600 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-800'
        : 'w-full flex min-h-8 p-1 rounded text-left text-gray-500 focus:outline-none focus:ring focus:ring-primary-200 dark:focus:ring-gray-600 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-800'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <span class="inline-block shrink-0 w-6 h-6"></span>
        <span class="flex-1 flex items-center w-full px-3 text-sm"><slot /></span>
    </Link>
</template>
