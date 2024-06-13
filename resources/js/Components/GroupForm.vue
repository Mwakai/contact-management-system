<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
});

const submitForm = () => {
    form.post('/groups', {
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <form @submit.prevent="submitForm">
        <div class="mb-4">
            <label
                for="name"
                class="block text-sm font-medium text-gray-700"
                >Name</label
            >
            <input
                type="text"
                id="name"
                v-model="form.name"
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
</template>
