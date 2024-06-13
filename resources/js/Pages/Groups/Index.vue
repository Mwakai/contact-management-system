<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, usePage, Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import Modal from '@/Components/Modal.vue';
import GroupForm from '@/Components/GroupForm.vue';

const { props } = usePage();
const groups = props.groups;
const showModal = ref(false);
const editingGroup = ref(null);

const closeModal = () => {
    showModal.value = false;
    editingGroup.value = null;
};

const openModal = (group = null) => {
    editingGroup.value = group || { name: '' };
    showModal.value = true;
};
</script>

<template>
    <Head title="Groups" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Groups</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
                        <button
                            @click="openModal"
                            class="bg-blue-500 hover:bg-blue-700 text-white mb-2 w-42 font-bold py-2 px-4 rounded-full float-right"
                        >
                            Create Group
                        </button>

                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                            >
                                <tr>
                                    <th
                                        scope="col"
                                        class="px-6 py-3"
                                    >
                                        ID
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3"
                                    >
                                        Group Name
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3"
                                    >
                                        Total Contacts
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
                                    v-for="(group, index) in groups"
                                    :key="group.id"
                                    class="bg-white border-b dark:bg-gray-900 dark:border-gray-700"
                                >
                                    <th
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                    >
                                        {{ group.id }}
                                    </th>
                                    <td class="px-6 py-4">{{ group.name }}</td>
                                    <td class="px-6 py-4">{{ group.contacts_count }}</td>
                                    <td class="px-6 py-4">
                                        <button
                                            @click="openModal(group)"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-1"
                                        >
                                            Edit
                                        </button>
                                        <Link
                                            :href="route('groups.destroy', group.id)"
                                            method="delete"
                                            as="button"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline mx-1"
                                            onclick="return confirm('Are you sure you want to delete this group?')"
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

    <!-- Modal for Creating/Editing Group -->
    <Modal
        :show="showModal"
        title="Create/Edit Group"
        @close="closeModal"
    >
        <GroupForm
            :group="editingGroup"
            @close="closeModal"
        ></GroupForm>
    </Modal>
</template>
