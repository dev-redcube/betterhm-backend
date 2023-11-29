<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import CalendarProvider from "@/Pages/CalendarProviders/CalendarProvider.vue";

defineProps(['calendarProviders']);

const form = useForm({
    name: '',
    url: '',
});
</script>

<template>
    <Head title="Kalender"/>
    <AuthenticatedLayout>
        <div class="max-w-5xl mx-auto p-4 sm:p-6 lg:p-8">
            <form
                @submit.prevent="form.post(route('calendarProviders.store'), { onSuccess: () => form.reset() })"
                class="max-w-2xl mx-auto dark:text-slate-100">
                <input
                    type="text"
                    v-model="form.name"
                    placeholder="Name"
                    class="block w-full border-gray-300 dark:border-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-800"/>
                <InputError :message="form.errors.name" class="mt-2"/>
                <input
                    type="url"
                    v-model="form.url"
                    placeholder="Url"
                    class="mt-2 block w-full border-gray-300 dark:border-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-800"/>
                <InputError :message="form.errors.url" class="mt-2"/>
                <PrimaryButton class="mt-4 dark:bg-gray-300">Speichern</PrimaryButton>
            </form>

            <div class="overflow-x-auto w-full mt-8 dark:text-slate-100">
                <table class="w-full">
                    <thead class="border-b-2 dark:border-b-slate-500">
                    <tr>
                        <th class="py-0 text-left">Name</th>
                        <th class="py-4 text-left">Url</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y dark:divide-slate-500">
                    <CalendarProvider
                        v-for="calendarProvider in calendarProviders"
                        :key="calendarProvider.id"
                        :calendarProvider="calendarProvider"/>
                    </tbody>
                </table>
            </div>

        </div>
    </AuthenticatedLayout>
</template>
