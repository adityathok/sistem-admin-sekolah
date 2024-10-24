<template>
    <div class="flex items-center justify-end p-4 md:px-6">
        <Avatar class="p-overlay-badge" image="https://picsum.photos/id/200/300/300" size="large" shape="circle" @click="toggleAvatar"/>
        <Popover ref="opAvatar">
            <Menu :model="menuAvatar" />
        </Popover>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import Avatar from 'primevue/avatar';
import Popover from 'primevue/popover';
import Menu from 'primevue/menu';

const opAvatar = ref();
const toggleAvatar = (event) => {
    opAvatar.value.toggle(event);
}
const menuAvatar = ref([
    {
        label: 'Options',
        items: [
            {
                label: 'Refresh',
                icon: 'pi pi-refresh'
            },
            {
                label: 'Export',
                icon: 'pi pi-upload'
            }
        ]
    }
]);

</script>