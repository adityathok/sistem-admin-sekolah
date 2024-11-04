<script setup>
import { computed } from 'vue';
import { Head, Link, usePage, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
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

    <div class="relative h-screen flex-col items-center justify-center md:grid lg:max-w-none lg:grid-cols-2 lg:px-0">

        <div class="relative hidden h-full flex-col bg-muted p-10 text-white lg:flex dark:border-r bg-blue-900">

            <div class="relative z-20 flex justify-start">
                <template v-if="logo_lembaga">
                        <img v-if="logo_lembaga" :src="logo_lembaga" class="max-h-[80px] md:max-h-[80px]" alt="Logo">
                </template>
            </div>

        </div>

        <div class="flex h-full items-center p-4 lg:p-8">

            <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                
                <h1 class="text-2xl font-semibold tracking-tight">Login</h1>

                <form @submit.prevent="submit" class="w-full mx-auto">

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

    </div>
    

</template>
