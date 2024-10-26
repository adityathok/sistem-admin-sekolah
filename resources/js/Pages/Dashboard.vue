<template>
    <Head title="Dashboard" />

    <DashboardLayout>

        <template #header>
            Dashboard
        </template>        

        <InfoCard />

        <div class="my-9">
            <ChartTagihan />
        </div>
        
        
    </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import InfoCard from '@/Pages/Dashboard/InfoCard.vue';
import ChartTagihan from '@/Pages/Dashboard/ChartTagihan.vue';
import { Head } from '@inertiajs/vue3';
</script>