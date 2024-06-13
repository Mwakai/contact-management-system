<script setup>
import { ref, watch, defineProps, defineEmits } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    group: {
        type: Object,
        default: () => ({ name: '' }),
    },
    mode: {
        type: String,
        required: true,
    },
    onClose: Function,
});

const emit = defineEmits(['saved']);

const form = useForm({
    name: props.group.name,
});

watch(
    () => props.group,
    (newGroup) => {
        form.name = newGroup.name;
    },
);

const submitForm = () => {
    const url = props.group.id ? `/groups/${props.group.id}` : '/groups';
    const method = props.group.id ? 'put' : 'post';

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
                {{ mode === 'edit' ? 'Edit Group' : 'Add Group' }}
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
