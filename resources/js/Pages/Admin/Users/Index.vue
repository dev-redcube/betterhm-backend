<script setup>
import {Head} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
import HeaderTitle from "@/Components/HeaderTitle.vue";
import SidebarLink from "@/Components/SidebarLink.vue";
</script>

<template>
    <Head title="Admin"/>

    <AuthenticatedLayout>
        <SidebarLayout>
            <template #header>
                <HeaderTitle>Super Admin Benutzer</HeaderTitle>
            </template>
            <template #sidebar>
                <SidebarLink :href="route('admin.faculties.index')" :active="route().current('admin.faculties.*')">Fakultäten</SidebarLink>
                <SidebarLink :href="route('admin.users.index')" :active="route().current('admin.users.*')">Benutzer</SidebarLink>
            </template>
        </SidebarLayout>
    </AuthenticatedLayout>
</template>
