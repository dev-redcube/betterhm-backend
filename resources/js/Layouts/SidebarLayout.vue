<script setup>

</script>

<template>
    <div class="flex-1 flex flex-row">
        <!-- sidebar -->
        <div class="bg-white dark:bg-gray-800 px-4 pt-16 text-gray-800 dark:text-gray-200 flex flex-col gap-y-1 border-r border-gray-100 dark:border-gray-700" v-if="$slots.sidebar">
            <slot name="sidebar"/>
        </div>

        <div class="flex-1">
            <!-- Page Heading -->
            <header class="bg-white dark:bg-gray-800 shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header"/>
                </div>
            </header>

            <!-- content -->
            <div class="flex-1">
                <slot/>
            </div>
        </div>
    </div>
</template>
