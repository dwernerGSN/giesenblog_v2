<template>
  <Head title="Blog posts" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ blog.title }}
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <label class="">door: {{ blog.user.name }}</label
          ><br />
          <p>{{ blog.excerpt }}</p>
          <p>{{ blog.created_at }}</p>
        </div>
      </div>
    </div>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

          <form action="/comment/store" method="POST">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="blog_id" :value="blog.id">
            <label for="excerpt">plaats reactie als <b>{{blog.user.name}}</b></label><br>
            <input type="text" id="react" name="excerpt"><br>
            <input type="submit" value="plaatsen">
            </form><br>

          <h1>Reacties</h1>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div v-for="comment in blog.comments" :key="comment.id">
                <form @submit.prevent="editComment(comment)">
                    <p>{{comment.user.name}}</p>
                    <input type="text" v-model="comment.excerpt">
                    <span v-if="current_user == comment.user.id">
                    <a :href="'/comment/'+comment.id+'/delete'">Verwijderen</a>
                     <button
                            type="submit"
                            class="w-full px-2 py-4 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none"
                        >
                            Aanpasssen
                    </button>
                    </span>
                </form>
                <br>
            </div>
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
      }
  }
};
</script>

<style>

</style>
