<script setup>
import Adminlayout from '@/Layouts/Adminlayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Up Comming events" />

    <Adminlayout>


        <div class="py-12">
             <div class="header text-2xl flex mb-10">
          <i class="fas fa-tags"></i>&nbsp; <h1>New Events</h1>
        </div>
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div>
                        <div v-for="upEvent in firstEvent" :key="upEvent.id"
                        class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] white:bg-neutral-700 mb-5">
                        <div class="relative overflow-hidden bg-cover bg-no-repeat">
                            <img
                            class="rounded-t-lg"
                            src="https://st2.depositphotos.com/1635204/7654/i/450/depositphotos_76549817-stock-photo-word-events-on-colorful-wooden.jpg" style="height: 150px; width: 100%;"
                            alt="" />
                        </div>
                        <div class="p-6">
                            <div class="pb-5">
                                <h2 class="text-2xl font-bold">
                                    Up Comming event:
                                    {{ upEvent.title }}
                                </h2>
                            </div>
                            <h5
                            class="mb-6 animate-pulse" v-if="upEvent.guest_speaker" style="font-size: 18px; font-weight: bold; letter-spacing: 1px;" >
                            Speaker: {{ upEvent.guest_speaker }}
                            </h5>   
                            <h5 v-if="upEvent.theme"
                            class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-880">
                           Theme: {{ upEvent.theme }}
                            </h5>
            

                            <p class="flex justify-end p-5 font-bold" v-if="upEvent.verse_chapter">
                                {{ upEvent.verse_chapter }}
                            </p>

                            <p class="mb-10" style="border: 1px solid rgb(195, 195, 195); padding: 20px; border-radius: 10px;" v-if="upEvent.content">
                                {{ upEvent.content }}
                            </p>
                            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-800">
                            {{ upEvent.desc }}
                            </p>
                            <p class="text-base text-neutral-600 white:text-neutral-800">
                            <small class="text-neutral-800 dark:text-neutral-800 flex justify-end p-2" style="font-size: 18px; font-weight: bold;">{{ formattedDate(upEvent.date) }}</small>
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Adminlayout>
</template>

<script>

export default {

    props: {
        firstEvent: Array,
    },

    methods: {
        formattedDate(event) {
        const date = new Date(event);
        const options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
        };
        return date.toLocaleDateString('en-US', options);
        },
    },

}

</script>