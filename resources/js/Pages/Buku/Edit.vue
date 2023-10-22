<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import TextInput from '@/Components/TextInput.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import {useForm} from '@inertiajs/vue3';
    
    const props = defineProps({
        id:Object,
        buku:Object
    });

    // const bukus = defineProps.buku;
    const form = useForm({
        'id' : props.buku.id,
        'judul_buku' : props.buku.judul_buku
    });

    

</script>
<template>
    <head title="Buku" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Buku</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="form.put(route('buku.update', form.id))">
                            <InputLabel for="judul_buku" value="Judul Buku"/>
                            <TextInput id="judul_buku" type="text" v-model="form.judul_buku"/>
                            <InputError :message="form.errors.judul_buku"/>
                            <PrimaryButton :disabled="form.processing">Simpan</PrimaryButton>
                            <p v-if="form.recentlySuccessful">Berhasil Diupdate.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>