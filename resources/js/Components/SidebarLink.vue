<script setup>

import {computed} from "vue";
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    }
})

const classes = computed(() =>
    props.active
        ? "inline-flex px-2 py-1"
        : ""
);
</script>

<template>
<!--    <Link :href="href" :class="classes">-->
    <Link :href="href" class="py-2 px-4 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-indigo-700 dark:hover:text-white">
        <slot/>
    </Link>
</template>

