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
                        <a :href="'/blogs/'+blog.id">Lees</a>
                        <a :href="'/blogs/'+blog.id+'/edit'">Aanpassen</a>
                        <a :href="'/blogs/'+blog.id+'/delete'">Verwijderen</a>
                        </tr>
                    </tbody>
                    </table>
                </div>
               <a href="../blogs/create">Nieuwe blog maken</a>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
        props: {
        blogs: Object,
    },
}
</script>

<style>

</style>
