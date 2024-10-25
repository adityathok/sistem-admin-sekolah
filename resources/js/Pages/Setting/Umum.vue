<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head } from '@inertiajs/vue3';
import Card from 'primevue/card';
</script>

<template>
    <Head title="Pengaturan Umum" />

    <DashboardLayout>

        <template #header>
            Pengaturan
        </template>

        <Card>
            <template #title>Simple Card</template>
            <template #content>
                <p class="m-0">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore sed consequuntur error repudiandae numquam deserunt quisquam repellat libero asperiores earum nam nobis, culpa ratione quam perferendis esse, cupiditate neque
                    quas!
                </p>
            </template>
        </Card>
        
    </DashboardLayout>

</template>