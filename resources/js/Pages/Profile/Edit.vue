<script setup>
import { ref } from 'vue';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import Tabs from 'primevue/tabs';
import TabList from 'primevue/tablist';
import Tab from 'primevue/tab';
import TabPanels from 'primevue/tabpanels';
import TabPanel from 'primevue/tabpanel';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

</script>

<template>
    <Head title="Profile" />

    <DashboardLayout>

        <template #title>
            Profile
        </template>

        <Tabs value="0" class="max-w-[600px]">
            <TabList class="text-sm">
                <Tab value="0">Information</Tab>
                <Tab value="1">Password</Tab>
                <Tab value="2">Account</Tab>
            </TabList>
            <TabPanels>
                <TabPanel value="0">                    
                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                        class="max-w-xl"
                    />
                </TabPanel>
                <TabPanel value="1">                    
                    <UpdatePasswordForm class="max-w-xl" />
                </TabPanel>
                <TabPanel value="2">
                    <DeleteUserForm class="max-w-xl" />
                </TabPanel>
            </TabPanels>
        </Tabs>

    </DashboardLayout>
</template>
