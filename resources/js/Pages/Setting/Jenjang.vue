<template>
    <Head title="Pengaturan Umum" />

    <DashboardLayout>

        <template #title>
            Jenjang
        </template>
        <template #subtitle>
            Jenjang pendidikan yang ada
        </template>
        
        <div class="max-w-xl">
                
            <div v-for="(input, index) in inputs" :key="index" class="flex my-2">

                <InputGroup>
                    <InputText v-model="inputs[index]" placeholder="Jenjang" />
                    <Button @click="removeInput(index)" icon="pi pi-times" severity="danger" outlined/>
                </InputGroup>

            </div>

            <div class="text-end mt-3">
                <Button @click="addInput()" type="button" label="Tambah" class="me-2" severity="secondary" outlined/>
                <Button @click="submit()" type="submit" label="Simpan" />
            </div>

        </div>    

        <Toast position="top-right"/>

    </DashboardLayout>

</template>

<script setup>
import { ref,onUpdated } from 'vue';
import { Head,router } from '@inertiajs/vue3';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import Card from 'primevue/card';
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';
import InputGroup from 'primevue/inputgroup';
import Toast from 'primevue/toast';
import { useToast } from "primevue/usetoast";
const toast = useToast();

const props = defineProps({
    settings: Object, 
    flash: Object
})

const inputs = ref(props.settings || ['']);
const addInput = () => {
    inputs.value.push(''); // Tambahkan input baru
};
const removeInput = (index) => {
    inputs.value.splice(index, 1); // Hapus input pada index yang ditentukan
};

const submit = () => {
    router.post('/setting/jenjang', {jenjang : inputs.value})
};

onUpdated (() => {
    if (props.flash.success) {
        toast.add({ severity: 'success', summary: 'Sukses', detail: props.flash.success, life: 1000 });
    }
})

</script>