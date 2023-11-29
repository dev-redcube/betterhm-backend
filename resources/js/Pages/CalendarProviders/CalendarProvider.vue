<script setup>

import {Link} from "@inertiajs/vue3";

const props = defineProps(['calendarProvider']);
</script>

<template>
    <tr>
        <td class="py-4">{{ calendarProvider.name }}</td>
        <td class="py-4">{{ calendarProvider.url }}</td>
        <td class="py-4 text-right">
            <Link :href="route('calendarProviders.destroy', calendarProvider.id)" method="delete">Löschen
            </Link>
        </td>
    </tr>
</template>
