<script setup>
import { ref } from 'vue';
import DashboardHeader from '@/Layouts/DashboardHeader.vue';
import DashboardSidebar from '@/Layouts/DashboardSidebar.vue';
</script>

<template>
    <div class="bg-slate-50 relative h-screen md:ps-[250px]">

       <DashboardSidebar />

       <DashboardHeader />

        <!-- Page Content -->
        <main class="p-3 md:p-6">
            <slot />
        </main>

    </div>
</template>