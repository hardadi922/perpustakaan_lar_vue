<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import TextInput from '@/Components/TextInput.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import {useForm} from '@inertiajs/vue3'
    
    const form = useForm({
        judul_buku: '',
    });

    const storeBuku = () => {
        form.post(route('buku.store'),{
            preserveScroll : true,
            onSuccess : () => form.reset(),
        });
    };

    

</script>

<template>
    <head title="Buku" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Buku</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="storeBuku">
                           
                            <InputLabel for="judul_buku" value="Judul Buku"/>
                            <TextInput id="judul_buku" type="text" v-model="form.judul_buku"/>
                            <InputError :message="form.errors.judul_buku"/>
                            <PrimaryButton :disabled="form.processing">Simpan</PrimaryButton>
                            <p v-if="form.recentlySuccessful">Berhasil Disimpan.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>