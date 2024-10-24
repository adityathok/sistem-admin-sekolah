<script setup>
import { ref,onMounted,computed } from 'vue';
import { usePage,router,Link } from '@inertiajs/vue3'
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Card from 'primevue/card';
import Button from 'primevue/button';
import ScrollPanel from 'primevue/scrollpanel';
import Divider from 'primevue/divider';



const page = usePage()
const user = computed(() => page.props.auth.user)

const isOpenSidebar = ref(false);
const toggleSidebar = () => {
    isOpenSidebar.value = !isOpenSidebar.value;
};

const toggleMenu = (item) => {
    item.expanded = !item.expanded;
};
    
const isActiveMenu = (item) => {
      // Cek apakah item aktif berdasarkan URL
      return page.url && page.url === item.href;
};
onMounted(() => {
    items.value.forEach(item => {
        if (item.items) {
            item.expanded = item.items.some(items => isActiveMenu(items));
        }
    });
});

const items = ref([
    {
        label: 'Dashboard',
        icon: 'pi pi-th-large',
        href:'/dashboard',
    },
    {
        label: 'Siswa',
        icon: 'pi pi-users',
        items: [
            {
                label: 'Data Siswa',
                icon: 'pi pi-users',
                href:'/siswa',
            },
            {
                label: 'Tambah Siswa',
                icon: 'pi pi-user-plus',
                href:'/siswa/create',
            },
            {
                label: 'Naik Kelas',
                icon: 'pi pi-caret-up',
                href:'/siswa/naikkelas',
            }
        ]
    },
    {
        label: 'Pengaturan',
        icon: 'pi pi-cog',
        items: [
            {
                label: 'Umum',
                icon: 'pi pi-cog',
                href:'/setting/umum',
            },
            {
                label: 'Jenjang',
                icon: 'pi pi-building-columns',
                href:'/setting/jenjang',
            }
        ]
    },
]);

</script>

<template>

    <div class="md:hidden absolute top-0 left-0 pt-6 p-3">
        <Button icon="pi pi-bars" size="small" @click="toggleSidebar"/>
    </div>

    <div class="fixed top-0 left-0 right-0 bottom-0 bg-black opacity-15 hidden" @click="toggleSidebar" :class="{'OpenbgMobileSidebar': isOpenSidebar, 'ClosebgMobileSidebar': !isOpenSidebar}"></div>

    <div class="fixed top-0 left-0 bottom-0 p-2 md:w-[240px] w-full ease-in duration-300" :class="{'OpenMobileSidebar': isOpenSidebar, 'CloseMobileSidebar': !isOpenSidebar}">

            <Card class="h-[98vh] w-100">

                <template #content>
                    <div class="md:hidden text-end">
                        <Button icon="pi pi-times" @click="toggleSidebar"/>
                    </div>

                    <ApplicationLogo class="w-[40px] mx-auto"/>

                    <Divider />

                    <h2 class="text-center mb-4">
                        Hallo, {{ user.name }}
                    </h2>

                    <ScrollPanel style="width: 100%; height: 80vh;">  
                       
                        <ul>
                            <template v-for="item in items">
                                <li class="mb-3">
                                    <Button v-if="item.items" @click="toggleMenu(item)" :unstyled="true" class="w-full py-2 px-3 rounded bg-white hover:bg-slate-100 flex" :class="{'items-center justify-between': item.items}" severity="secondary" text >                                        
                                        <span>
                                            <i v-if="item.icon" class="pi me-2 opacity-50" :class="item.icon"></i>
                                            {{item.label}}
                                        </span>
                                        <span v-if="item.items" class="pi" :class="{'pi-angle-down': item.expanded,'pi-angle-right': !item.expanded}"></span>
                                    </Button>

                                    <Link v-if="!item.items" :href="item.href" class="py-2 px-3 rounded block bg-white hover:bg-slate-100" :class="{ 'bg-sky-100': isActiveMenu(item)}">
                                        <i v-if="item.icon" class="pi me-2 opacity-50" :class="item.icon"></i>
                                        {{item.label}}
                                    </Link>

                                    <ul v-if="item.expanded && item.items">
                                        <li v-for="child in item.items" :key="child.id">

                                            <Link :href="child.href" class="ps-10 pe-2 py-2 rounded block bg-white hover:bg-slate-100" :class="{ 'bg-sky-100': isActiveMenu(child) }">
                                                {{child.label}}
                                            </Link>
                                        </li>
                                    </ul>

                                </li>
                            </template>
                        </ul>         
                        <!-- <Menu :model="items" class="border-0 min-w-full	dashboardmenu" /> -->
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