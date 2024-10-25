<script setup>
import { ref } from 'vue';
import DashboardHeader from '@/Layouts/DashboardHeader.vue';
import DashboardSidebar from '@/Layouts/DashboardSidebar.vue';
</script>

<template>
    <div class="relative h-screen md:ps-[250px]">

       <DashboardSidebar />

       <DashboardHeader />

        <!-- Page Content -->
        <main class="p-5 md:pt-0 md:p-6">
            
            <!-- Page Heading -->
            <header v-if="$slots.header" class="mb-5">
                <h1 class="text-2xl font-bold tracking-tight">
                    <slot name="header" />
                </h1>
            </header>

            <slot />
        </main>

    </div>
</template>