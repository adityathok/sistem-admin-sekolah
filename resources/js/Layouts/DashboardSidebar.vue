<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import Card from 'primevue/card';
import Menu from 'primevue/menu';

const items = ref([
    {
        label: 'Home',
        items: [
            {
                label: 'New',
                icon: 'pi pi-plus',
                url: '/dashboard'
            },
            {
                label: 'Search',
                icon: 'pi pi-search'
            }
        ]
    },
    {
        label: 'Pengaturan',
        items: [
            {
                label: 'Umum',
                icon: 'pi pi-cog',
                url: '/setting/general'
            },
            {
                label: 'Jenjang',
                icon: 'pi pi-sign-out',
                url: '/setting/jenjang'
            }
        ]
    }
]);

</script>

<template>
    <div class="fixed top-0 left-0 bottom-0 p-2 md:w-[240px] w-[90%]">

        <Card class="h-screen w-100">

            <template #content>
                <Menu :model="items" class="border-0 dashboardmenu" />   
            </template>

        </Card>    


    </div>
</template>

<style>
    .dashboardmenu {
        border: none !important;
    }
</style>