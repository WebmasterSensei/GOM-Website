<script setup>
import Adminlayout from '@/Layouts/Adminlayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Admin Dashboard" />

  <Adminlayout>
    <div class="py-4">
      <div class="flex inline-action">
        <div class="header text-2xl flex">
          <i class="fas fa-tags"></i>&nbsp; <h1>Events</h1>
        </div>
        <div class="actions">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4" @click="showModal">
            Add Event
          </button>
        </div>
      </div>
      <a-table :data-source="events" :columns="columns" />
    </div>

    <div>
      <a-modal v-model:open="isShowModal" width="1000px" title="Add Event" :ok-button-props="{ hidden: true }"
        :cancel-button-props="{ hidden: true }">
        <form id="chatForm" @submit.prevent="submitForm">
          <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
            <!-- <input type="text" id="title" v-model="event.title" required placeholder="Title"
               class="border rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500"> -->
            <a-input v-model:value="event.title" placeholder="Title">
              <template #prefix>
                <user-outlined />
              </template>
              <template #suffix>
                <a-tooltip title="Extra information">
                  <info-circle-outlined style="color: rgba(0, 0, 0, 0.45)" />
                </a-tooltip>
              </template>
            </a-input>
          </div>
           
          <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
            <!-- <input type="date" id="title" v-model="event.date" required placeholder="Date"
               class="border rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500"> -->
            <a-input v-model:value="event.date" type="date" placeholder="Date">
              <template #prefix>
                <user-outlined />
              </template>
              <template #suffix>
                <a-tooltip title="Extra information">
                  <info-circle-outlined style="color: rgba(0, 0, 0, 0.45)" />
                </a-tooltip>
              </template>
            </a-input>
          </div>

       
          <div class="mb-4 flex justify-end">
            <span
             style="font-size: 11px; font-weight: bold; color: blue;" 
             class="animate-pulse">If thanks giving check this <i class="fas fa-arrow-right"></i> 
             </span> &nbsp;
             <a-checkbox v-on:click="isTgivBox"></a-checkbox>
          </div>

          <div class="hidd" v-if="isTGiv">
                       <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Theme:</label>
            <!-- <input type="date" id="title" v-model="event.date" required placeholder="Date"
               class="border rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500"> -->
            <a-input v-model:value="event.theme" type="text" placeholder="Theme">
              <template #prefix>
                <user-outlined />
              </template>
              <template #suffix>
                <a-tooltip title="Extra information">
                  <info-circle-outlined style="color: rgba(0, 0, 0, 0.45)" />
                </a-tooltip>
              </template>
            </a-input>
          </div>

                    <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Verse-Chapter:</label>
            <!-- <input type="date" id="title" v-model="event.date" required placeholder="Date"
               class="border rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500"> -->
            <a-input v-model:value="event.verse_chapter" type="text" placeholder="Verse Chapter">
              <template #prefix>
                <user-outlined />
              </template>
              <template #suffix>
                <a-tooltip title="Extra information">
                  <info-circle-outlined style="color: rgba(0, 0, 0, 0.45)" />
                </a-tooltip>
              </template>
            </a-input>
          </div>
                    <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Guest Speaker:</label>
            <!-- <input type="date" id="title" v-model="event.date" required placeholder="Date"
               class="border rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500"> -->
            <a-input v-model:value="event.guest_speaker" type="text" placeholder="Guest Speaker">
              <template #prefix>
                <user-outlined />
              </template>
              <template #suffix>
                <a-tooltip title="Extra information">
                  <info-circle-outlined style="color: rgba(0, 0, 0, 0.45)" />
                </a-tooltip>
              </template>
            </a-input>
          </div>
                    <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Church:</label>
            <!-- <input type="date" id="title" v-model="event.date" required placeholder="Date"
               class="border rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500"> -->
            <a-input v-model:value="event.church_name" type="text" placeholder="Church Name">
              <template #prefix>
                <user-outlined />
              </template>
              <template #suffix>
                <a-tooltip title="Extra information">
                  <info-circle-outlined style="color: rgba(0, 0, 0, 0.45)" />
                </a-tooltip>
              </template>
            </a-input>
          </div>


           <div class="mb-4">
            <label for="comments" class="block text-gray-700 text-sm font-bold mb-2">Word:</label>
            <!-- <textarea id="comments" v-model="event.desc"
                  class="border rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500"></textarea> -->
            <a-textarea v-model:value="event.content" placeholder="Description Here..." :rows="3" />
          </div>

          </div>

          <!-- <div class="mb-4">
        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
        <input type="file"  @change="handleFileChange" multiple  placeholder="Image"
               class="border rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500">
      </div> -->
          <div class="mb-4">
            <label for="comments" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
            <!-- <textarea id="comments" v-model="event.desc"
                  class="border rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500"></textarea> -->
            <a-textarea v-model:value="event.desc" placeholder="Description Here..." :rows="3" :disabled="inputIsDisabled" />
          </div>
          <div class="flex">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-0 mt-4 ml-auto"
              type="submit">
              Submit
            </button>
          </div>


        </form>

        <!-- <form @submit.prevent="submitForm">
                  <label for="title">Title:</label>
                  <input type="text" v-model="event.title" required>

                  <label for="desc">Description:</label>
                  <textarea v-model="event.desc" required></textarea>

                  <label for="date">Date:</label>
                  <input type="date" v-model="event.date" required>

                  <label for="images">Select Images:</label>
                  <input type="file" ref="fileInput" @change="handleFileChange" multiple accept="image/*">

                  <button type="submit">Submit</button>
                </form> -->

      </a-modal>
    </div>

  </Adminlayout>
</template>

<script>
import { useForm, Head } from '@inertiajs/vue3';
import axios from 'axios';

export default {
  data() {
    return {
      isTGiv: false,
      isShowModal: false,
      inputIsDisabled: false,

      event: {
        title: '',
        desc: '',
        date: '',
        theme: '',
        verse_chapter: '',
        church_name: '',
        content: '',
        guest_speaker: '',
        // image: [],
      },
      columns: [
        {
          title: 'Title',
          dataIndex: 'title',
          key: 'title',
        },
        {
          title: 'Description',
          dataIndex: 'desc',
          key: 'desc',
        },
        {
          title: 'Date',
          dataIndex: 'date',
          key: 'date',
        },
      ],
    };
  },
  props: {
    events: Array,
  },
  methods: {
    isTgivBox() {
         this.isTGiv = !this.isTGiv;
         this.inputIsDisabled = this.isTGiv;
         this.event.desc = '';

    },
    handleFileChange(event) {
      const files = event.target.files;
      this.event.image = [];
      for (let i = 0; i < files.length; i++) {
        this.event.image.push(files[i]);
      }
    },
    showModal() {
      this.isShowModal = true;
      // console.log('cick')
    },
    submitForm() {
      const formData = new FormData();

      formData.append('title', this.event.title);
      formData.append('desc', this.event.desc);
      formData.append('date', this.event.date);
      formData.append('theme', this.event.theme);
      formData.append('verse_chapter', this.event.verse_chapter);
      formData.append('guest_speaker', this.event.guest_speaker);
      formData.append('church_name', this.event.church_name);
      formData.append('content', this.event.content);

      //    for (let i = 0; i < this.event.image.length; i++) {
      //   formData.append('image[]', this.event.image[i]);
      // }


      axios.post('/events/store', formData)
        .then(response => {
          // console.log(response.data);
          this.event.title = '';
          this.event.desc = '';
          this.event.date = '';
          // this.event.image = [];


          this.isShowModal = false;

          window.location.href = '/events/index';



        })
        .catch(error => {
          console.error(error);
        });
    },
  }
};
</script>

<style scoped>
.inline-action {
  display: flex;
  justify-content: space-between;
}
</style>