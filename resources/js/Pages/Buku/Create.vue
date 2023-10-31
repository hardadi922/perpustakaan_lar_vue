<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import TextInput from '@/Components/TextInput.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import {useForm} from '@inertiajs/vue3'
import InputFile from '@/Components/InputFile.vue';
import InputFilex from '@/Components/InputFilex.vue';
    
    const form = useForm({
        judul_buku: '',
        file_upload: null,
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
                        <form @submit.prevent="storeBuku" enctype="multipart/form-data">
                           <div class="py-2">
                               <InputLabel for="judul_buku" value="Judul Buku"/>
                               <TextInput id="judul_buku" type="text" v-model="form.judul_buku"/>
                               <InputError :message="form.errors.judul_buku"/>
                           </div>
                            
                            <div>
                                <!-- <InputFile :items="form.file_upload" @input="form.file_upload = $event.target.files"/> -->
                            </div>
                            <div>
                                <input type="file" @input="form.file_upload = $event.target.files" multiple/>
                                <ul>
                                    <li v-for="item in form.file_upload">
                                        {{ item.name }}
                                    </li>
                                </ul>
                            </div>
                            <!-- <div>
                                <InputFilex />
                            </div> -->
                            <div class="py-2">
                                <PrimaryButton :disabled="form.processing">Simpan</PrimaryButton>
                                <p v-if="form.recentlySuccessful">Berhasil Disimpan.</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>