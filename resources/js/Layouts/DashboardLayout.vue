<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import DashboardSidebar from '@/Layouts/DashboardSidebar.vue';


const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="bg-slate-50 relative h-screen md:ps-[250px]">

       <DashboardSidebar />

        <!-- Page Content -->
        <main class="p-3 md:p-6">
            <slot />
        </main>

    </div>
</template>