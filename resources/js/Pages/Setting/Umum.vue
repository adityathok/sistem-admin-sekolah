<script setup>
import { onUpdated } from 'vue'
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import Inputs from '@/Components/Form/Inputs.vue';
import { Head,router,useForm } from '@inertiajs/vue3';
import InputText from 'primevue/inputtext'
import Button from 'primevue/button'
import Toast from 'primevue/toast';
import { useToast } from "primevue/usetoast";
const toast = useToast();

const props = defineProps({ settings: Object, flash: Object })
const form = useForm({
    nama_lembaga: props.settings.nama_lembaga || 'Nama Lembaga',
    last_name: null,
    email: null,
})

onUpdated (() => {
    if (props.flash.success) {
        toast.add({ severity: 'success', summary: 'Info', detail: props.flash.success, life: 1000 });
    }
})

function submit() {
  router.post('/setting/store', form)
}

const itemInputs = [
    {
        label: 'Nama Lembaga',
        name: 'nama_lembaga',
        type: 'text',
        value: form.nama_lembaga,
    },
    {
        label: 'Alamat Lembaga',
        name: 'alamat_lembaga',
        type: 'text',
        value: '',
    }
];

</script>

<template>
    <Head title="Pengaturan Umum" />

    <DashboardLayout>

        <template #header>
            Pengaturan Umum
        </template>

        <form @submit.prevent="submit" class="mb-4 md:max-w-2xl">

            <Inputs :items="itemInputs" />

            <div class="flex flex-col gap-3">
                <!-- <div>
                    <label for="nama_lembaga" class="font-bold block mb-2"> Nama Lembaga </label>
                    <InputText class="w-full rounded-3xl" id="nama_lembaga" v-model="form.nama_lembaga" />
                </div> -->
                <div class="text-end">
                    <Button type="submit" label="Simpan" />
                </div>
            </div>            
        </form>

        <Toast position="bottom-right"/>
        
    </DashboardLayout>

</template>