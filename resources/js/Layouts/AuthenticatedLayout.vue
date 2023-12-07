<script setup>
import {ref} from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {Link} from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-col">
            <header
                class="flex flex-row justify-between items-center px-8 py-4 bg-white dark:bg-gray-800 shadow-b dark:border-b dark:border-gray-700">
                <div class="shrink-0 flex items-center">
                    <Link :href="route('dashboard')">
                        <ApplicationLogo
                            class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"
                        />
                    </Link>
                </div>
                <Dropdown align="right" width="48">
                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="ms-2 -me-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                    </template>

                    <template #content>
                        <DropdownLink :href="route('profile.edit')"> Profile</DropdownLink>
                        <DropdownLink :href="route('logout')" method="post" as="button">
                            Log Out
                        </DropdownLink>
                    </template>
                </Dropdown>
            </header>

            <div class="flex flex-row">
                <nav class="px-3 py-8 w-60 flex flex-col gap-8">
                    <!-- Section -->

                    <div>
                        <h3 class="w-full flex items-start p-1 rounded text-left text-gray-500 focus:outline-none focus:ring focus:ring-primary-200 dark:focus:ring-gray-600">
                            <span class="inline-block shrink-0 w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                </svg>

                            </span>
                            <span class="flex-1 flex items-center w-full px-3 text-base">Admin</span>
                        </h3>
                        <div class="mt-1 flex flex-col">
                            <div>
                                <NavLink :href="route('faculties.index')" :active="route().current('faculties.*')">Fakultäten</NavLink>
                            </div>
                        </div>
                    </div>

                    <NavLink :href="route('calendarLinks.index')" :active="route().current('calendarLinks.index')">
                        Kalender
                    </NavLink>
                </nav>
                <div class="flex-1 p-4 md:py-8 md:px-12 space-y-8">
                    <slot/>
                </div>
            </div>

        </div>
    </div>
</template>
