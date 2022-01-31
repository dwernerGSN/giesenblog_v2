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
            <label for="excerpt">plaats reactie</label><br>
            <input type="text" id="react" name="excerpt"><br>
            <input type="submit" value="Submit">
            </form>

          <h1>Reacties</h1>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div v-for="comments in blog.comments">
                <p>{{comments.user.name}}</p>
                <p>{{comments.excerpt}}</p>
                <a :href="'/comment/'+comments.id+'/delete'">Verwijderen</a>
                <a href="">Aanpassen</a>
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

export default {
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
};
</script>

<style>

</style>
