<template>
    <Head title="Pengaturan Umum" />

    <DashboardLayout>

        <Card class="md:max-w-xl mx-auto">
            <template #title>
                Jenjang
            </template>
            <template #subtitle>
                Jenjang pendidikan yang ada
            </template>
            <template #content>
                <div v-for="(input, index) in inputs" :key="index" class="flex mb-2">
                    <InputText 
                        type="text" 
                        v-model="inputs[index]" 
                        placeholder="Jenjang" 
                    />
                    <Button @click="removeInput(index)" icon="pi pi-times" severity="danger" />
                </div>
            </template>
        </Card>

    </DashboardLayout>

</template>

<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import Card from 'primevue/card';
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';

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
    console.log(inputs.value); // Proses data inputs
};

</script>