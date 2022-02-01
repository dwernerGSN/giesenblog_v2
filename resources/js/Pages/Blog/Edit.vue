<template>
      <Head title="Blog aanpassen" />

          <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Aanpassen
            </h2>

        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="container mx-auto">
                <div class="max-w-xl p-5 mx-auto my-10 bg-white rounded-md shadow-sm">
                    <div class="text-center">
                    <h1 class="my-3 text-3xl font-semibold text-gray-700">Wijzigen {{blog.title}}</h1>
                    </div>
                    <div>
                    <form @submit.prevent="form.put(route('blog.update', blog.id))">
                    <input type="hidden" name="_token" :value="csrf">
                        <div class="mb-6">
                        </div>
                        <div class="mb-6">
                        <label for="title" class="text-sm text-gray-600">Titel</label>
                        <input
                            type="text"
                            v-model="form.title"
                            placeholder="Titel"

                            required
                            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                        />
                        </div>
                        <div class="mb-6">
                        <label for="message" class="block mb-2 text-sm text-gray-600"
                            >Uw bericht</label
                        >

                        <textarea
                            rows="5"
                            v-model="form.excerpt"
                            placeholder="Uw bericht"
                            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                            required
                        ></textarea>
                        </div>
                        <div class="mb-6">
                        <button
                            type="submit"
                            class="w-full px-2 py-4 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none"
                        >
                            Plaats
                        </button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>

                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import Button from '@/Components/Button.vue';
import { useForm } from '@inertiajs/inertia-vue3';

export default {
    setup(props){
        console.log(props)
        const form = useForm({
            title: props.blog.title,
            excerpt: props.blog.excerpt,
        })
        return {form}
    },
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
    props: {
        blog: Object,
    },
    data: () => ({
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          }),
}
</script>

<style>

</style>
