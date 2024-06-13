<script setup>
const props = defineProps({
    show: Boolean,
    title: String,
    message: String,
});

const emits = defineEmits(['close', 'confirm']);

const closeModal = () => {
    emits('close');
};

const confirmAction = () => {
    emits('confirm');
};
</script>

<template>
    <div
        v-if="show"
        class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50"
    >
        <div class="bg-white rounded-lg p-6 w-1/2">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold">{{ title }}</h3>
                <button
                    @click="closeModal"
                    class="text-gray-500 hover:text-gray-800"
                >
                    &times;
                </button>
            </div>
            <div class="mb-4">
                <p>{{ message }}</p>
            </div>
            <div class="flex justify-end space-x-4">
                <button
                    @click="confirmAction"
                    class="bg-green-500 text-white px-4 py-2 rounded"
                >
                    Yes
                </button>
                <button
                    @click="closeModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded"
                >
                    Cancel
                </button>
            </div>
        </div>
    </div>
</template>
