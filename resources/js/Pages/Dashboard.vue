<script setup>
import { ref, onMounted } from 'vue';
import { usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const { props } = usePage();
const contacts = ref(props.contacts);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
                        <a
                            href="/create-contact"
                            class="mx-3 bg-green-500 hover:bg-green-700 text-white mb-2 w-42 font-bold py-2 px-4 rounded-full float-right"
                        >
                            Create Contact
                        </a>

                        <table class="w-full text-sm text-left text-gray-500 dark:text-white">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                                <tr>
                                    <th
                                        scope="col"
                                        class="px-6 py-3"
                                    >
                                        id
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3"
                                    >
                                        Name
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3"
                                    >
                                        Email
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3"
                                    >
                                        Phone
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3"
                                    >
                                        Address
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3"
                                    >
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(contact, index) in contacts"
                                    :key="index"
                                    class="bg-white border-b dark:bg-gray-900 dark:border-gray-700"
                                >
                                    <td class="px-6 py-4">{{ index + 1 }}</td>
                                    <td class="px-6 py-4">{{ contact.name }}</td>
                                    <td class="px-6 py-4">{{ contact.email }}</td>
                                    <td class="px-6 py-4">{{ contact.phone }}</td>
                                    <td class="px-6 py-4">{{ contact.address }}</td>
                                    <td class="px-6 py-4">
                                        <Link
                                            :href=""
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-1"
                                            >Edit</Link
                                        >
                                        <Link
                                            :href=""
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline mx-1"
                                            >Delete</Link
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
