<template>
      <Head title="Blog posts" />

          <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{blog.title}}
            </h2>

        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <label class="">door: {{blog.user.name}}</label><br>
                    <p>{{blog.excerpt}}</p>
                    <p>{{blog.created_at}}</p>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';

export default {
        components: {
        BreezeAuthenticatedLayout,
        Head,
    },
props: {
        blog: Object,
    },
}
</script>

<style>

</style>
