<template>
  <Head title="Blog posts" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ blog.title }}
      </h2>
      <p class="text-slate-500">door: {{ blog.user.name }}</p>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <p class="py-4">{{ blog.excerpt }}</p><br>
          <p class="text-slate-500 italic">{{ formatDate(blog.created_at) }}</p>
        </div>
      </div>
    </div>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

          <p class="py-5 text-3xl">Reacties</p>

          <form action="/comment/store" method="POST">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="blog_id" :value="blog.id">
            <label for="excerpt">plaats reactie als <b>{{blog.user.name}}</b></label><br>
            <input class="px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" type="text" id="react" name="excerpt"><br>
            <input class="px-2 py-2 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none" type="submit" value="plaatsen">
            </form><br>

            <div v-for="comment in blog.comments" :key="comment.id">
                <form @submit.prevent="editComment(comment)">
                    <p>{{comment.user.name}}</p>
                    <input class="px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" type="text" v-model="comment.excerpt"><br>
                    <span v-if="current_user == comment.user.id">
                    <a class="px-2 py-2 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none" :href="'/comment/'+comment.id+'/delete'">Verwijderen</a>
                     <button
                            type="submit"
                            class="px-2 py-2 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none"
                        >
                            Aanpasssen
                    </button>
                    </span>
                </form>
                <br>
            </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from '@inertiajs/inertia-vue3';

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
  },
  props: {
    blog: Object,
    current_user: BigInt,
  },
   data: () => ({
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        form: useForm({
            id: '',
            excerpt: ''
        })
  }),
  methods: {
      editComment(comment){
          this.form.id = comment.id
          this.form.excerpt = comment.excerpt

          this.form.put(route('comment.update',comment.id))
      },
       formatDate(dateString) {
            let date = new Date(dateString);
                // Then specify how you want your dates to be formatted
            return new Intl.DateTimeFormat('Nl', {dateStyle: 'long'}).format(date);
        }
  }
};
</script>

<style>

</style>
