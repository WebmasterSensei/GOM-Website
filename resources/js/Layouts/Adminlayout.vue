<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';
import Sidebar from '@/Partials/Sidebar.vue';
import Navbar from '@/Partials/Navbar.vue';
import Footer from '@/Partials/Footer.vue';

const showingNavigationDropdown = ref(false);
</script>

<template>
     <div class="leading-normal tracking-normal" id="main-body">
    <div class="flex flex-wrap">

      <Sidebar />

      <div class="w-full bg-gray-100 pl-0 lg:pl-64 min-h-screen" :class="sideBarOpen ? 'overlay' : ''" id="main-content">

        <Navbar />

        <div class="p-6 bg-gray-100 mb-20">
          <slot />
        </div>

        <!-- <Footer /> -->

      </div>
    </div>
  </div>
</template>

<script>
import { Sidenav, initTE } from "tw-elements";

export default {
  data() {
    return {
       sidebarVisible: false,
       showTreeview: false,
       showTreeview1: false,
    }
  },
  methods:{
     toggleSidebar() {
              this.sidebarVisible = !this.sidebarVisible;
          },
      toggleTreeview() {
              this.showTreeview = !this.showTreeview;
          },
      toggleTreeview1() {
              this.showTreeview1 = !this.showTreeview1;
          }
  },
  mounted() {

   
  }
};
</script>


