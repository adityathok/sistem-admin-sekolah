<script setup>
import { computed } from 'vue';
import { Head, Link, usePage, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';

import Button from 'primevue/button';
import InputText from 'primevue/inputtext';


defineProps({
    canResetPassword: {
        type: Boolean,
    },
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

const page = usePage()
const logo_lembaga = computed(() => page.props.app_var.logo_lembaga)

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />

    <div class="relative flex justify-center items-center h-screen w-full bg-[radial-gradient(ellipse_at_top_left,_var(--tw-gradient-stops))] from-blue-700 via-blue-800 to-gray-900">
      
        <div class="text-slate-900 bg-white shadow-xl p-10 m-3 w-full md:w-[450px]">  

            <form @submit.prevent="submit" class="w-full mx-auto">
                <template v-if="logo_lembaga">
                    <img v-if="logo_lembaga" :src="logo_lembaga" class="max-h-[80px] md:max-h-[150px] mx-auto" alt="Logo">
                </template>

                <div class="mt-4 flex items-center justify-end">
                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Forgot your password?
                    </Link>

                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <InputText id="email" type="text" class="w-full" v-model="form.email" required/>
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <InputText id="password" type="password" class="w-full" v-model="form.password" required/>
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="my-4 block">
                    <label class="flex items-center">
                        <Checkbox name="remember" v-model:checked="form.remember" />
                        <span class="ms-2 text-sm text-gray-600"
                            >Remember me</span
                        >
                    </label>
                </div>

                <Button
                    type="submit" 
                    class="w-full"
                    label="Log in"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                />
            </form>

        </div>

    </div>

    

</template>
