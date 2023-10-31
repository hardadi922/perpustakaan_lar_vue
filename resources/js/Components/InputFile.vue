<script setup>
    import { ref } from 'vue';

    const props = defineProps({
        items:String
    });

    // const items = ref(null);

    // function onFileChange(e){
    //     items.value = e.target.files;
    // }
</script>
<template>
    <div class="my-2 p-2 bg-slate-100 relative h-32 w-1/2  ">
        <div class="p-10 h-full border-dashed border-2 border-red-200">
                <p class="font-light text-sm text-gray-500 text-center">Drop your file(s) here or click to browse</p>
            </div>
        <input type="file" multiple
        
            class="bg-red-400 w-full h-full absolute top-0 opacity-0 z-50 border-blue-100">
    </div>
    <p class="text-sm text-gray-700">
        <ol>
            <!-- <li v-for="item in items">{{ item.name }}</li> -->
        </ol>
    </p>
</template>