<script setup>

import {Link} from "@inertiajs/vue3";

const props = defineProps(['link']);
</script>

<template>
    <tr class="dark:text-slate-100">
        <td class="py-4">{{ link.name }}</td>
        <td class="py-4">{{ link.url }}</td>
        <td class="py-4 text-right text-rose-600 dark:text-rose-500">
            <Link :href="route('calendarLinks.destroy', link.id)" method="delete">Löschen
            </Link>
        </td>
    </tr>
</template>
