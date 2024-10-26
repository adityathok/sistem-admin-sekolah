<script setup>
import { onMounted } from 'vue'
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head,router,useForm } from '@inertiajs/vue3';
import InputText from 'primevue/inputtext'
import Button from 'primevue/button'
import Toast from 'primevue/toast';
import { useToast } from "primevue/usetoast";
const toast = useToast();

const props = defineProps({ settings: Object, message: String })
const form = useForm({
    nama_lembaga: props.settings.nama_lembaga || 'Nama',
    last_name: null,
    email: null,
})

onMounted (() => {
    console.log(props.message)
    if (props.message) {
        toast.add({ severity: 'success', summary: 'Info', detail: props.message, life: 1000 });
    }
})

function submit() {
  router.post('/setting/umum', form)
}


</script>

<template>
    <Head title="Pengaturan Umum" />

    <DashboardLayout>

        <template #header>
            Pengaturan Umum
        </template>

        <form @submit.prevent="submit">
            <div class="flex flex-col gap-3 mb-4 md:max-w-2xl">
                <div>
                    <label for="nama_lembaga" class="font-bold block mb-2"> Nama Lembaga </label>
                    <InputText class="w-full rounded-3xl" id="nama_lembaga" v-model="form.nama_lembaga" />
                </div>
                <div class="text-end">
                    <Button type="submit" label="Simpan" />
                </div>
            </div>            
        </form>

        <Toast position="bottom-right"/>
        
    </DashboardLayout>

</template>