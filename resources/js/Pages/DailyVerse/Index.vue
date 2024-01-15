<script setup>
import AdminLayout from '@/Layouts/Adminlayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
</script>

<template>
    <Head title="Dashboard" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">DailyVerse</h2>
        </template>
        <div class="flex justify-end">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" v-on:click="openModalVerse">
               <i class="fas fa-plus"></i>add verse
            </button>
        </div>
        <div class="py-12">
            <a-table :data-source="dverseSource" :columns="columns" />
        </div>

        <a-modal :ok-button-props="{ hidden: true }"
        :cancel-button-props="{ hidden: true }"
      v-model:open="isShowModal"
      title="20px to Top"
      style="top: 20px"
      @ok="setModal1Visible(false)"
    >
    <a-input v-model:value="dverse.verse" placeholder="Verse">
      <template #prefix>
        <user-outlined />
      </template>
      <template #suffix>
        <a-tooltip title="Extra information">
          <info-circle-outlined style="color: rgba(0, 0, 0, 0.45)" />
        </a-tooltip>
      </template>
    </a-input>

      <a-textarea v-model:value="dverse.words" class="mt-5" placeholder="Word" :rows="4" />

              <div class="flex justify-end mt-5">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded " v-on:click="submitForm">
               <i class="fas fa-save"></i> submit
            </button>
        </div>
    </a-modal>
    </AdminLayout>
</template>
<script>
export default {
    data() {
        return {
            dataSource: [],
            isShowModal: false,
            dverse: {
                verse: '',
                words: ''
            },
            columns: [
                {
                    title: 'Verse',
                    dataIndex: 'verse',
                    key: 'verse',
                },
                {
                    title: 'Word',
                    dataIndex: 'words',
                    key: 'words',
                },
            ],
        };
    },
    props: {
        dverseSource: Array,
    },
    methods: {
        openModalVerse(){
            this.isShowModal = true;
        },
        submitForm(){
            const formData =  new FormData();

            formData.append('verse', this.dverse.verse);
            formData.append('words', this.dverse.words);

            axios.post('/d-verse/store', formData)
            .then(response => {
                this.dverse.verse = '';
                this.dverse.words = '';

                this.isShowModal = false;

                this.$inertia.visit('/d-verse');
            })
        }

    }
};
</script>
