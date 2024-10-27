<template>
    
    <div v-for="item in items" class="mb-3">

        <label :for="item.name" class="font-bold block mb-2">
            {{ item.label }}            
        </label>

        <div v-if="item.type==='number'">

        </div>

        <div v-else>
            <InputText class="w-full" :for="item.name" :name="item.name" v-model="item.value"/>
        </div>


    </div>

</template>

<script setup>
import { defineComponent } from 'vue';
import InputText from 'primevue/inputtext'
defineProps({
    items: {
        type: Object,
    },
});
</script>