<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import SidebarLink from "@/Components/SidebarLink.vue";
</script>

<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <SidebarLayout>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <template #sidebar>
            <SidebarLink href="#">Hello</SidebarLink>
            <SidebarLink href="#" active>Another one</SidebarLink>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">You're logged in!</div>
                </div>
            </div>
        </div>

        </SidebarLayout>
    </AuthenticatedLayout>
</template>
