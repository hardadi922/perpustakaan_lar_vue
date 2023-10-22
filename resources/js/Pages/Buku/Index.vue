<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import {Head, Link, useForm} from '@inertiajs/vue3';
    import Modal from '@/Components/Modal.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import SecondaryButton from '@/Components/SecondaryButton.vue';
    import DangerButton from '@/Components/DangerButton.vue';
    import {ref} from 'vue';
    
    const confirmingBukuDeletion = ref(false);
    const idBuku = ref(null);

    defineProps({
        bukus:Object,
    });

    const confirmBukuDeletion = (id) => {
        confirmingBukuDeletion.value = true;
        idBuku.value = id;
    }

    const form = useForm({
        // 'id': confirmBukuDeletion.idBuku
    });

    const deleteBuku = (idBuku) => {
        form.delete(route('buku.destroy', idBuku),{
            preserveScroll:true,
            onSuccess: () => closeModal(),
        });
    };

    const closeModal = () => {
        confirmingBukuDeletion.value = false;
    };

    

   

</script>

<template>
    <head title="Buku" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Buku</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div>
                            <Link
                    :href="route('buku.create')" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Tambah Buku</Link>
                        </div>
                        <table class="table-fixed">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>JUDUL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="buku in bukus" :key="buku.id">
                                    <td>{{ buku.id }}</td>
                                    <td>{{ buku.judul_buku }}</td>
                                    <td>
                                        <Link :href="route('buku.edit', buku.id)">Edit</Link> | 
                                        <!-- <Link :href="route('buku.destroy', buku.id)" method="delete">Hapus</Link> | -->
                                        <PrimaryButton @click="confirmBukuDeletion(buku.id)">delete</PrimaryButton>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <Modal :show="confirmingBukuDeletion" @close="closeModal">
            <div class="p-6">
                <p>Delete Buku:  {{ idBuku }}?</p>
                <div class="mt-6 flex justify-end">
                    <SecondaryButton class="mr-6" @click="closeModal">Cancel</SecondaryButton>
                    <!-- <Link :href="route('buku.destroy', idBuku)" method="delete" as="button">Hapus</Link> -->

                    <!-- <form @submit.prevent=""> -->
                        <DangerButton @click="deleteBuku(idBuku)">Delete</DangerButton>
                    <!-- </form> -->
                </div>
            </div>
        </Modal>
    </AuthenticatedLayout>
</template>