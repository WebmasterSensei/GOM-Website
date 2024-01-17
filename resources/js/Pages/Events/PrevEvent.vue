<script setup>
import Adminlayout from '@/Layouts/Adminlayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
</script>

<template>
    <Head title="Admin Dashboard" />

    <Adminlayout>


        <div class="py-12">
                         <div class="header text-2xl flex mb-10">
          <i class="fas fa-tags"></i>&nbsp; <h1>Previous Events</h1>
        </div>
            <div class="mx-auto sm:px-6 lg:px-8">
                <div v-if="prev_event.length > 0">
                <div v-for="event in prevEvent" :key="event.id">
                    <div class="flex justify-end px-2"
                        style="border: 1px solid rgb(218, 218, 218); margin-bottom: 5px; border-radius: 10px; background: #dcdcdc;">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mb-2 mt-2" v-if="!event.image"
                            v-on:click="openUpImage(event.id)">
                            Upload image here
                        </button>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mb-2 mt-2" v-else
                            v-on:click="openUpImage(event.id)">
                            Update image here
                        </button>
                    </div>
                    <div
                        class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] white:bg-neutral-700 mb-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Column 1 -->
                            <div class="relative overflow-hidden bg-cover bg-no-repeat p-5" v-for="img in event.image" :key="img">
                                <img class="rounded-lg w-full"
                                    :src="'/images/events/' + img"
                                    style="height: 100px; width: 90%; margin: 0 auto;" alt="" />
                            </div>

                            <!-- Column 2 -->
                        </div>


                        <div class="p-6">
                            <div class="pb-5">
                                <h2 class="text-2xl font-bold">
                                    Previous Events:
                                    {{ event.title }}
                                </h2>
                            </div>
                            <h5 class="mb-6 animate-pulse" v-if="event.guest_speaker"
                                style="font-size: 18px; font-weight: bold; letter-spacing: 1px;">
                                Speaker: {{ event.guest_speaker }}
                            </h5>

                            <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-880"
                                v-if="event.theme">
                                Theme: {{ event.theme }}
                            </h5>
                            <p class="flex justify-end p-5 font-bold" v-if="event.verse_chapter">
                                {{ event.verse_chapter }}
                            </p>

                            <p class="mb-10"
                                style="border: 1px solid rgb(195, 195, 195); padding: 20px; border-radius: 10px;"
                                v-if="event.content">
                                {{ event.content }}
                            </p>
                            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-800">
                                {{ event.desc }}
                            </p>
                            <p class="text-base text-neutral-600 white:text-neutral-800">
                                <small class="text-neutral-800 dark:text-neutral-800 flex justify-end p-2"
                                    style="font-size: 18px; font-weight: bold;">{{ formattedDate }}</small>
                            </p>
                        </div>
                    </div>
                </div>
</div>
 <div>
      <div class="nav" style="border: 1px solid rgb(183, 183, 183); margin-bottom: 10px; border-radius: 10px;">      
 <nav aria-label="Page navigation example" class="mt-2 mb-2 flex justify-center">
            <ul class="list-style-none flex space-x-2">
                <li v-for="page in pagination.links" :key="page.label">
                    <a v-if="page.url" href="#" @click.prevent="fetchData(page.url)"
                       class="relative block rounded bg-transparent px-3 py-1.5 text-sm transition-all duration-300 
                              dark:text-black dark:hover:bg-neutral-700 dark:hover:text-black"
                       :class="{ 'text-neutral-600 hover:bg-neutral-100': !page.active, 'font-bold bg-neutral-100': page.active }"
                       v-html="page.label"
                    ></a>
                    <span v-else class="relative block rounded bg-transparent px-3 py-1.5 text-sm
                              dark:text-black dark:hover:bg-neutral-700 dark:hover:text-black"
                          :class="{ 'text-neutral-600': !page.active, 'font-bold': page.active }"
                          v-html="page.label"
                    ></span>
                </li>
            </ul>
        </nav>
    </div>

        </div>
            </div>
        </div>



        <a-modal v-model:open="open" title="Uplaod an image">
            <template #footer>

            </template>
            <form @submit.prevent="uploadimage">
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                    <input type="file" @change="handleFileChange" multiple placeholder="Image"
                        class="border rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500">
                </div>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mb-2 mt-2"
                    type="submit">
                    Upload
                </button>
            </form>

        </a-modal>
        <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com --> 

    </Adminlayout>
</template>

<script>
export default {
    data() {
        return {
            open: false,
            upImage: {
                image: []
            },
            upId: null,
            // decodedImages: [],
            prevEvent: [],
            pagination: [],
        }
    },
    props: {
        prev_event: Array,
    },
      mounted() {
     this.fetchData('http://127.0.0.1:8000/prev-event-getter?page=1'); 
  },
    methods: {
        fetchData(url){
            axios.get(url)
            .then(response => {
                this.prevEvent = response.data.data;
                this.pagination =  response.data;
            })
        },
        openUpImage(id) {
            // console.log(id)
            this.upImage.image = [];
            this.upId = id;
            this.open = true;
        },
        handleFileChange(event) {
            const files = event.target.files;
            this.upImage.image = [];
            for (let i = 0; i < files.length; i++) {
                this.upImage.image.push(files[i]);
            }
        },
        uploadimage() {

               if (this.upImage.image.length === 0) {
                    console.log("No images selected");
                    return;
                }


            const formData = new FormData();
                for (let i = 0; i < this.upImage.image.length; i++) {
                formData.append('image[]', this.upImage.image[i]);
            }

            axios.post(`/up-image/${this.upId}`, formData)
                .then(response => {

                    this.open = false;

                    window.location.href = '/events/prev-event';



                })
                .catch(error => {
                    console.error(error);
                });

        }
    }
}
</script>