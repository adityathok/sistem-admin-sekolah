<template>
    <div class="hidden md:block bg-zinc-100">
        <div class="relative h-svh md:w-[250px] p-3 overflow-y-auto duration-200 ease-linear">

            <Link href="/dashboard">
                <ApplicationLogo v-if="!logo_lembaga" class="max-h-[80px] mx-auto"/>
                <img v-if="logo_lembaga" :src="logo_lembaga" class="max-h-[80px] mx-auto" alt="Logo">
            </Link>

            <PanelMenu
                :model="items"
                class="w-full border-none rounded-none"
                v-model:expandedKeys="expandedKeys"
                :pt="{
                    panel: (options) => ({
                        class: [
                            '!border-none',
                            '!bg-transparent'
                        ]
                    }),
                    rootList: (options) => ({
                        class: [
                            '!ps-0',
                        ]
                    }),
                    itemContent: (options) => ({
                        class: [
                            '!bg-transparent'
                        ]
                    }),
                    headerContent: (options) => ({
                        class: [
                            '!bg-transparent'
                        ]
                    })
                }"
            >
                <template #item="{ item }">

                    <Link v-if="item.href" :href="item.href" :class="[classLink,{'bg-blue-200 hover:bg-blue-300 shadow' : isActive(item.href)}]">
                        <span class="flex items-center">
                            <Icon v-if="item.icon" :icon="item.icon" class="mr-2"/>
                            <span>{{ item.label }}</span>
                        </span>
                    </Link>

                    <button v-else :class="classLink">
                        <span class="flex items-center">
                            <Icon v-if="item.icon" :icon="item.icon" class="mr-2"/>
                            <span>{{ item.label }}</span>
                        </span>
                        <Icon v-if="item.items" icon="lucide:chevron-down" />
                    </button>

                </template>
            </PanelMenu>       

        </div>
    </div>
</template>

<script setup>
import { ref,onMounted,computed } from 'vue';
import { usePage,Link } from '@inertiajs/vue3'
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Button from 'primevue/button';
import ScrollPanel from 'primevue/scrollpanel';

import { Icon } from '@iconify/vue';
import PanelMenu from 'primevue/panelmenu';

const page = usePage()
const logo_lembaga = computed(() => page.props.app_var.logo_lembaga)

const isActive = (path) => {
  return page.url && page.url === path
}

//expand menu
const expandedKeys = ref({});
const expandNode = (node) => {
    if (node.items && node.items.length) {
        expandedKeys.value[node.key] = true;

        for (let child of node.items) {
            expandNode(child);
        }
    }
};

onMounted(() => {
    //expand menu active
    for (let node of items.value) {
        if(node.items){
            for (let child of node.items) {                
                if(child.href && route.path === child.href){   
                    expandedKeys.value[node.key] = true;
                }
            }
        }
    }
})

//class untuk tombol menu
const classLink = 'w-full flex items-center justify-between px-4 py-2 rounded-lg text-zinc-700 hover:bg-zinc-300';

const items = ref([
    {
        key: '0',
        label: 'Dashboard',
        icon: 'lucide:layout-dashboard',
        href:'/dashboard',
    },
    {
        key: 'siswa',
        label: 'Siswa',
        icon: 'lucide:users',
        items: [
            {
                key: 'siswa_0',
                label: 'Data Siswa',
                href:'/siswa',
            },
            {
                key: 'siswa_1',
                label: 'Tambah Siswa',
                href:'/siswa/create',
            },
            {
                key: 'siswa_2',
                label: 'Naik Kelas',
                href:'/siswa/naikkelas',
            }
        ]
    },
    {
        key: 'unit',
        label: 'Unit Sekolah',
        icon: 'lucide:school',
        href:'',
        items: [
            {
                key: 'unit_0',
                label: 'Tambah Unit',
                href:'/unitsekolah/create',
            },
            {
                key: 'unit_1',
                label: 'Daftar Unit',
                href:'/unitsekolah',
            },
            {
                key: 'unit_2',
                label: 'Naik Kelas',
                href:'/siswa/naikkelas',
            }
        ]
    },
    {
        key: 'setting',
        label: 'Pengaturan',
        icon: 'lucide:settings',
        href:'',
        items: [
            {
                key: 'ssetting_0',
                label: 'Umum',
                href:'/setting/umum',
            },
            {
                key: 'setting_1',
                label: 'Jenjang',
                href:'/setting/jenjang',
            }
        ]
    },
]);

</script>