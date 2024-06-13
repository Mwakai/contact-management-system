<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    phone: '',
    address: '',
});

const submitForm = () => {
    form.post(route('/contacts'));
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Contacts</h2>
        </template>
        <div class="py-12">
            <div class="max-w-3xl py-12 mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative py-12 overflow-x-auto shadow-md sm:rounded-lg">
                        <form
                            @submit.prevent="submitForm"
                            class="max-w-md mx-auto"
                        >
                            <div class="mb-4">
                                <label
                                    for="name"
                                    class="block text-sm font-medium text-gray-700"
                                    >Full Name</label
                                >
                                <input
                                    type="text"
                                    id="name"
                                    v-model="form.name"
                                    required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                />
                            </div>
                            <div class="mb-4">
                                <label
                                    for="email"
                                    class="block text-sm font-medium text-gray-700"
                                    >Email</label
                                >
                                <input
                                    type="email"
                                    id="email"
                                    v-model="form.email"
                                    required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                />
                            </div>
                            <div class="mb-4">
                                <label
                                    for="phone"
                                    class="block text-sm font-medium text-gray-700"
                                    >Phone</label
                                >
                                <input
                                    type="tel"
                                    id="phone"
                                    v-model="form.phone"
                                    required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                />
                            </div>
                            <div class="mb-4">
                                <label
                                    for="phone"
                                    class="block text-sm font-medium text-gray-700"
                                    >Address</label
                                >
                                <input
                                    type="text"
                                    id="address"
                                    v-model="form.address"
                                    required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                />
                            </div>
                            <div class="flex justify-end">
                                <button
                                    type="submit"
                                    class="bg-blue-500 text-white px-4 py-2 rounded"
                                >
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
