<script setup>
import { ref } from 'vue';
import DashboardHeader from '@/Layouts/DashboardHeader.vue';
import AppSidebar from '@/Layouts/AppSidebar.vue';
</script>

<template>

    <div class="flex min-h-svh w-full">
        
       <AppSidebar />

       <main class="relative flex min-h-svh flex-1 flex-col bg-background ml-2">

        <div class="h-full p-4 md:px-8">

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
        
        </div>

       </main>

    </div>

</template>