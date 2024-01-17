<script setup>
import Adminlayout from '@/Layouts/Adminlayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<template>
  <div>

    <Head title="youtube links" />
    <Adminlayout>
      <div class="py-12">
         <div class="header text-2xl flex">
          <i class="fas fa-play"></i>&nbsp; <h1>Links</h1>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="mb-5 flex justify-end">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" v-on:click="modalOpen">
              Add Links
            </button>
          </div>
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="overflow-x-auto">
              <a-table class="min-w-full" :data-source="links" :columns="columns" />
            </div>
          </div>
        </div>
      </div>
      <a-modal v-model:open="open" title="Add Youtube Links" :ok-button-props="{ hidden: true }"
        :cancel-button-props="{ hidden: true }">
        <form @submit.prevent="submitForm">
          <a-input v-model:value="link.title" placeholder="Title.." class="mt-4">
            <template #prefix>
              <user-outlined />
            </template>
            <template #suffix>
              <a-tooltip title="Extra information">
                <info-circle-outlined style="color: rgba(0, 0, 0, 0.45)" />
              </a-tooltip>
            </template>
          </a-input>
          <a-input v-model:value="link.links" placeholder="Links here...." class="mt-5 mb-5">
            <template #prefix>
              <user-outlined />
            </template>
            <template #suffix>
              <a-tooltip title="Extra information">
                <info-circle-outlined style="color: rgba(0, 0, 0, 0.45)" />
              </a-tooltip>
            </template>
          </a-input>
          <a-textarea v-model:value="link.desc" placeholder="Description Here..." :rows="3" />
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4" type="submit">
            Submit
          </button>
        </form>
      </a-modal>
    </Adminlayout>
  </div>
</template>
<script>



export default {
  data() {
    return {
      open: false,
      link: {
        title: '',
        links: '',
        desc: '',
      },

      columns: [
        {
          title: 'Title',
          dataIndex: 'title',
          key: 'title',
        },
        {
          title: 'Links',
          dataIndex: 'links',
          key: 'links',
        },
        {
          title: 'Description',
          dataIndex: 'desc',
          key: 'desc',
        },
      ],
    };
  },

  props: {
    links: Array
  },

  methods: {
    modalOpen() {
      this.open = true;
    },
    submitForm() {
      const formData1 = new FormData();
      
      formData1.append('title', this.link.title);
      formData1.append('links', this.link.links);
      formData1.append('desc', this.link.desc);
      
      axios.post('/youtube-store', formData1)
        .then(response => {
          this.link.title = '';
          this.link.links = '';
          this.link.desc = '';
          this.open = false;
          window.location.href = '/youtubelinks';
        })
        .catch(error => {
          console.error(error);
        });
    }
  }
};
</script>
