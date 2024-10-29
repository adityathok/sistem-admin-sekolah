<template>
    <Head title="Pengaturan Umum" />

    <DashboardLayout>

        <Card class="mb-4 mx-auto md:max-w-xl"> 
            <template #title>
                Pengaturan Umum
            </template>
            <template #subtitle>
                Informasi profil lembaga atau yayasan
            </template>
            <template #content>
                <form @submit.prevent="submit" class="mt-3">

                    <div class="flex flex-col gap-3">
                        <div v-for="item in itemInputs">
                            <Inputs 
                                :item="item"
                                :modelValue="form[item.name]"
                                v-model="form[item.name]"
                                @input="$emit('update:form', $event.target.value)"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="logo_lembaga" class="font-bold block mb-2">
                                Logo Lembaga          
                            </label>

                            <img v-if="src" :src="src" alt="Image" class="w-full rounded mb-2 sm:w-64">
                            <FileUpload @select="onFileSelect" mode="basic" name="logo_lembaga" url="/api/upload" accept="image/*" :maxFileSize="1000000" @input="form.logo_lembaga = $event.target.files[0]" chooseLabel="Upload gambar"/>
                        </div>

                        <div class="text-end">
                            <Button type="submit" label="Simpan" />
                        </div>
                    </div>        

                </form>
            </template>
        </Card>       

        <Toast position="top-right"/>
        
    </DashboardLayout>

</template>

<script setup>
import { onUpdated,ref } from 'vue'
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head,router,useForm  } from '@inertiajs/vue3';
import Card from 'primevue/card';
import Button from 'primevue/button'
import Toast from 'primevue/toast';
import { useToast } from "primevue/usetoast";
const toast = useToast();
import Inputs from '@/Components/Form/Inputs.vue';
import FileUpload from 'primevue/fileupload';

const itemInputs = [
    {
        label: 'Nama Lembaga',
        name: 'nama_lembaga',
        type: 'text',
    },
    {
        label: 'Alamat Lembaga',
        name: 'alamat_lembaga',
        type: 'text',
    },
    {
        label: 'Kota Lembaga',
        name: 'kota_lembaga',
        type: 'text',
    },
    {
        label: 'Tahun Pelajaran',
        name: 'tahun_pelajaran',
        type: 'text',
    },
    {
        label: 'Pimpinan Lembaga',
        name: 'pimpinan_lembaga',
        type: 'text',
    }
];

const props = defineProps({
    settings: Object, 
    flash: Object
})
const form = useForm({
    nama_lembaga: props.settings.nama_lembaga || 'Nama Lembaga',
    alamat_lembaga: props.settings.alamat_lembaga || 'jl....',
    kota_lembaga: props.settings.kota_lembaga || 'Kota',
    tahun_pelajaran: props.settings.tahun_pelajaran || '2024/2025',
    pimpinan_lembaga: props.settings.pimpinan_lembaga || 'Fulan S.Pd',
    logo_lembaga: props.settings.logo_lembaga_url || null,
})

const src = ref(form['logo_lembaga'].length?form['logo_lembaga']:'');

onUpdated (() => {
    if (props.flash.success) {
        toast.add({ severity: 'success', summary: 'Sukses', detail: props.flash.success, life: 1000 });
    }
})

function submit() {
    router.post('/setting/umum', form, {
        forceFormData: true,
    })
}

function onFileSelect(event) {
    const file = event.files[0];
    const reader = new FileReader();

    reader.onload = async (e) => {
        src.value = e.target.result;
    };

    reader.readAsDataURL(file);
}

</script>