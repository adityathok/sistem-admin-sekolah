<script setup>
import { ref } from 'vue';
import DashboardHeader from '@/Layouts/DashboardHeader.vue';
import DashboardSidebar from '@/Layouts/DashboardSidebar.vue';
</script>

<template>
    <div class="relative h-full min-h-[100vh] md:ps-[250px]">

       <DashboardSidebar />

        <!-- Page Content -->
        <main class="p-5 md:pt-4 md:p-6">

            <DashboardHeader />
            
            <!-- Page Heading -->
            <header v-if="$slots.title" class="mb-10">
                <h1 class="text-2xl font-bold tracking-tight">
                    <slot name="title" />
                </h1>
                <div v-if="$slots.subtitle" class="mt-2">
                    <slot name="subtitle" />
                </div>
            </header>

            <slot />
        </main>

    </div>
</template>