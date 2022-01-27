<template>
      <Head title="Blog posts" />

          <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Blog posts
            </h2>

        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="table-auto">
                    <thead>
                        <tr>
                        <th>Auteur</th>
                        <th>Titel</th>
                        <th>Datum</th>
                        </tr>
                    </thead>
                    <tbody v-for="blog in blogs.data" :key="blog.id">
                        <tr>
                        <td>{{blog.user.name}}</td>
                        <td>{{blog.title}}</td>
                        <td>{{blog.created_at}}</td>
                        <Button @click="destroy(blogs.id)">verwijderen</Button>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import Button from '@/Components/Button.vue';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
        props: {
        blogs: Object,
    },
    methods: {
        destroy(id){
            this.$inertia.delete(route("blogs.destroy", id));
        }
    }
}
</script>

<style>

</style>
