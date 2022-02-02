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
                    <table class="min-w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Auteur</th>
                        <th class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Titel</th>
                        <th class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Datum</th>
                        <th scope="col" class="relative py-3 px-6">
                            <span class="sr-only">Read</span>
                         </th>
                            <th scope="col" class="relative py-3 px-6">
                            <span class="sr-only">Edit</span>
                         </th>
                            <th scope="col" class="relative py-3 px-6">
                            <span class="sr-only">Delete</span>
                         </th>
                        </tr>
                    </thead>
                    <tbody v-for="blog in blogs.data" :key="blog.id">
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td>{{blog.user.name}}</td>
                        <td>{{blog.title}}</td>
                        <td>{{formatDate(blog.created_at)}}</td>
                        <td>
                            <a class="text-blue-800 hover:text-blue-600" :href="'/blogs/'+blog.id">Lees</a>
                        </td>
                        <span v-if="blog.user.id == current_user">
                        <td>
                        <a class="text-green-800 hover:text-green-600" :href="'/blogs/'+blog.id+'/edit'">Aanpassen</a>
                        </td>
                        <td>
                        <a class="text-red-800 hover:text-red-600" :href="'/blogs/'+blog.id+'/delete'">Verwijderen</a>
                        </td>
                        </span>
                        </tr>
                    </tbody>
                    </table>
                </div>
                <div class="py-6">
                  <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="../blogs/create">Nieuwe blog maken</a>
                </div>
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
        current_user: BigInt,
    },
        methods: {
        formatDate(dateString) {
            let date = new Date(dateString);
                // Then specify how you want your dates to be formatted
            return new Intl.DateTimeFormat('Nl', {dateStyle: 'long'}).format(date);
        }
    },
}
</script>

<style>

</style>
