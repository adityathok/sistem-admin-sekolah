<template>
    
    <div class="mb-3">

        <label :for="item.name" class="font-bold block mb-2">
            {{ item.label }}            
        </label>

        <InputText
            class="w-full"
            :for="item.name"
            :name="item.name"
            :value="modelValue"
            @input="emit('update:modelValue', $event.target.value)"
        />

    </div>

</template>

<script setup>
import InputText from 'primevue/inputtext'
defineProps({
    item: {
        type: Object,
    },
    modelValue: {
        type: String
    }
});
const emit = defineEmits(['update:modelValue'])

</script>