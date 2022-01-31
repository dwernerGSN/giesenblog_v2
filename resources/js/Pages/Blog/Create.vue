<template>
      <Head title="Nieuwe blog" />

          <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Maak nieuwe blog
            </h2>

        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="container mx-auto">
                <div class="max-w-xl p-5 mx-auto my-10 bg-white rounded-md shadow-sm">
                    <div class="text-center">
                    <h1 class="my-3 text-3xl font-semibold text-gray-700">Nieuwe post</h1>
                    <p class="text-gray-400">plaats een nieuw bericht op Giesenblog</p>
                    </div>
                    <div>
                    <form action="../blogs/store" method="POST">
                <input type="hidden" name="_token" :value="csrf">

                        <div class="mb-6">
                        </div>
                        <div class="mb-6">
                        <label for="title" class="text-sm text-gray-600">Titel</label>
                        <input
                            type="text"
                            name="title"
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
                            name="excerpt"
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

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
      data: () => ({
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          }),
}
</script>

<style>

</style>
