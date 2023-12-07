<script setup>
import {Head, Link} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DataTableField from "@/Components/DataTable/DataTableField.vue";

defineProps({
    faculties: Array,
})
defineOptions({
    layout: AuthenticatedLayout,
})

</script>

<template>
    <Head title="Admin"/>
    <h1 class="font-normal text-xl mb-3 flex items-center">Fakultäten</h1>
    <div class="flex gap-2 mb-6">
        <Link
            class="ml-auto h-9 px-4 focus:outline-none ring-primary-200 dark:ring-gray-600 focus:ring text-white dark:text-gray-800 inline-flex items-center font-bold shadow rounded bg-primary-500 hover:bg-primary-400 active:bg-primary-600 text-sm">
            Fakultät erstellen
        </Link>
    </div>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
        <!-- TODO header -->
        <div>
            <table class="w-full divide-y divide-gray-100 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th class="td-fit uppercase text-xxs text-gray-500 tracking-wide pl-5 pr-2 py-2"><span
                        class="sr-only">Selected Resources</span></th>
                    <th class="text-left px-2 whitespace-nowrap uppercase text-gray-500 text-xxs tracking-wide py-2">
                        <span>Id</span></th>
                    <th class="text-left px-2 whitespace-nowrap uppercase text-gray-500 text-xxs tracking-wide py-2">
                        <span>Name</span></th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                <tr v-for="faculty in faculties" class="group">
                    <td></td>
                    <DataTableField>
                        <Link class="link-default" :href="route('faculties.show', faculty)">
                            {{ faculty.id }}
                        </Link>
                    </DataTableField>
                    <DataTableField>{{ faculty.name }}</DataTableField>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
