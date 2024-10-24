<script setup>
import { ref } from 'vue';
import { computed } from 'vue'
import { usePage,router } from '@inertiajs/vue3'
import Card from 'primevue/card';
import Menu from 'primevue/menu';
import Button from 'primevue/button';
import ScrollPanel from 'primevue/scrollpanel';


const page = usePage()
const user = computed(() => page.props.auth.user)

const isOpenSidebar = ref(false);
const toggleSidebar = () => {
    isOpenSidebar.value = !isOpenSidebar.value;
};

const items = ref([
    {
        label: 'Dashboard',
        icon: 'pi pi-th-large',
        command: () => router.visit('/dashboard') 
    },
    {
        label: 'Siswa',
        items: [
            {
                label: 'Data Siswa',
                icon: 'pi pi-users',
                command: () => router.visit('/siswa') 
            },
            {
                label: 'Tambah Siswa',
                icon: 'pi pi-user-plus',
                command: () => router.visit('/siswa/create')
            },
            {
                label: 'Naik Kelas',
                icon: 'pi pi-caret-up',
                command: () => router.visit('/siswa/naikkelas')
            }
        ]
    },
    {
        label: 'Pengaturan',
        items: [
            {
                label: 'Umum',
                icon: 'pi pi-cog',
                command: () => router.visit('/setting/umum') 
            },
            {
                label: 'Jenjang',
                icon: 'pi pi-building-columns',
                command: () => router.visit('/setting/jenjang')
            }
        ]
    },
    {
        label: 'Siswa',
        items: [
            {
                label: 'Data Siswa',
                icon: 'pi pi-users',
                command: () => router.visit('/siswa') 
            },
            {
                label: 'Tambah Siswa',
                icon: 'pi pi-user-plus',
                command: () => router.visit('/siswa/create')
            },
            {
                label: 'Naik Kelas',
                icon: 'pi pi-caret-up',
                command: () => router.visit('/siswa/naikkelas')
            }
        ]
    },
    {
        label: 'Siswa',
        items: [
            {
                label: 'Data Siswa',
                icon: 'pi pi-users',
                command: () => router.visit('/siswa') 
            },
            {
                label: 'Tambah Siswa',
                icon: 'pi pi-user-plus',
                command: () => router.visit('/siswa/create')
            },
            {
                label: 'Naik Kelas',
                icon: 'pi pi-caret-up',
                command: () => router.visit('/siswa/naikkelas')
            }
        ]
    },
    {
        label: 'Siswa',
        items: [
            {
                label: 'Data Siswa',
                icon: 'pi pi-users',
                command: () => router.visit('/siswa') 
            },
            {
                label: 'Tambah Siswa',
                icon: 'pi pi-user-plus',
                command: () => router.visit('/siswa/create')
            },
            {
                label: 'Naik Kelas',
                icon: 'pi pi-caret-up',
                command: () => router.visit('/siswa/naikkelas')
            }
        ]
    },
    {
        label: 'Siswa',
        items: [
            {
                label: 'Data Siswa',
                icon: 'pi pi-users',
                command: () => router.visit('/siswa') 
            },
            {
                label: 'Tambah Siswa',
                icon: 'pi pi-user-plus',
                command: () => router.visit('/siswa/create')
            },
            {
                label: 'Naik Kelas',
                icon: 'pi pi-caret-up',
                command: () => router.visit('/siswa/naikkelas')
            }
        ]
    },
    {
        label: 'Siswa',
        items: [
            {
                label: 'Data Siswa',
                icon: 'pi pi-users',
                command: () => router.visit('/siswa') 
            },
            {
                label: 'Tambah Siswa',
                icon: 'pi pi-user-plus',
                command: () => router.visit('/siswa/create')
            },
            {
                label: 'Naik Kelas',
                icon: 'pi pi-caret-up',
                command: () => router.visit('/siswa/naikkelas')
            }
        ]
    },
    {
        label: 'Siswa',
        items: [
            {
                label: 'Data Siswa',
                icon: 'pi pi-users',
                command: () => router.visit('/siswa') 
            },
            {
                label: 'Tambah Siswa',
                icon: 'pi pi-user-plus',
                command: () => router.visit('/siswa/create')
            },
            {
                label: 'Naik Kelas',
                icon: 'pi pi-caret-up',
                command: () => router.visit('/siswa/naikkelas')
            }
        ]
    },
]);

</script>

<template>

    <div class="md:hidden text-end p-2">
        <Button icon="pi pi-bars" size="small" @click="toggleSidebar"/>
    </div>

    <div class="fixed top-0 left-0 right-0 bottom-0 bg-black opacity-15 hidden" @click="toggleSidebar" :class="{'OpenbgMobileSidebar': isOpenSidebar, 'ClosebgMobileSidebar': !isOpenSidebar}"></div>

    <div class="fixed top-0 left-0 bottom-0 p-2 md:w-[240px] w-[90%] ease-in duration-300" :class="{'OpenMobileSidebar': isOpenSidebar, 'CloseMobileSidebar': !isOpenSidebar}">

            <Card class="h-[98vh] w-100">

                <template #content>
                    <div class="md:hidden text-end">
                        <Button icon="pi pi-times" @click="toggleSidebar"/>
                    </div>

                    <h2 class="text-center mb-4">
                        Hallo, {{ user.name }}
                    </h2>

                    <ScrollPanel style="width: 100%; height: 80vh;">                        
                        <Menu :model="items" class="border-0 min-w-full	dashboardmenu" />
                    </ScrollPanel>

                </template>

            </Card>

    </div>
</template>

<style>
    .dashboardmenu {
        border: none !important;
        min-width: 100% !important;
    }
    @media(max-width: 768px){
        .CloseMobileSidebar {
            left: -100% !important;
        }
        .OpenbgMobileSidebar {
            display: block !important;
        }
    }
</style>