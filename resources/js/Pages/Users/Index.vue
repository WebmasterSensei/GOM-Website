<script setup>
import AuthenticatedLayout from '@/Layouts/Adminlayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
              <a-table :data-source="users" :columns="columns" />
        </div>
    </AuthenticatedLayout>
</template>
<script>
  export default {
    props: {
        users: Array
    },
    data() {
      return {

        columns: [
          {
            title: 'Name',
            dataIndex: 'name',
            key: 'name',
          },
          {
            title: 'Email Address',
            dataIndex: 'email',
            key: 'email',
          },
        ],
      };
    },
  };
</script>