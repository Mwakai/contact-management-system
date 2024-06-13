<script setup>
import { ref, defineProps, watch, defineEmits } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    contact: {
        type: Object,
        default: () => ({
            name: '',
            email: '',
            phone: '',
            address: '',
            group_id: null,
        }),
    },
    groups: Array,
    onClose: Function,
});

const emit = defineEmits(['saved']);

const form = useForm({
    name: props.contact.name,
    email: props.contact.email,
    phone: props.contact.phone,
    address: props.contact.address,
    group_id: props.contact.group_id,
});

watch(
    () => props.contact,
    (newContact) => {
        form.name = newContact.name;
        form.email = newContact.email;
        form.phone = newContact.phone;
        form.address = newContact.address;
        form.group_id = newContact.group_id;
    },
);

const submitForm = () => {
    const url = props.contact.id ? `/contacts/${props.contact.id}` : '/contacts';
    const method = props.contact.id ? 'put' : 'post';

    form[method](url, {
        onSuccess: () => {
            form.reset();
            props.onClose();
            emit('saved');
        },
    });
};
</script>

<template>
    <div class="max-w-3xl py-12 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ props.contact.id ? 'Edit Contact' : 'Add Contact' }}
            </h2>
            <br />
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
                        type="text"
                        id="phone"
                        v-model="form.phone"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    />
                </div>
                <div class="mb-4">
                    <label
                        for="address"
                        class="block text-sm font-medium text-gray-700"
                        >Address</label
                    >
                    <input
                        type="text"
                        id="address"
                        v-model="form.address"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    />
                </div>
                <div class="mb-4">
                    <label
                        for="group"
                        class="block text-sm font-medium text-gray-700"
                        >Group</label
                    >
                    <select
                        id="group"
                        v-model="form.group_id"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    >
                        <option value="">Select Group</option>
                        <option
                            v-for="group in groups"
                            :value="group.id"
                            :key="group.id"
                        >
                            {{ group.name }}
                        </option>
                    </select>
                </div>
                <div class="flex justify-end space-x-2">
                    <button
                        type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded"
                    >
                        Save
                    </button>
                    <button
                        type="button"
                        @click="props.onClose"
                        class="bg-red-500 text-white px-4 py-2 rounded"
                    >
                        Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
