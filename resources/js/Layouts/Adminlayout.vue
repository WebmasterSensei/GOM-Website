<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>

      
    <!-- Navbar -->
    <nav class="bg-black border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700 p-2 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Burger menu icon -->
            <button @click="toggleSidebar" class="md:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
            <a href="#" class="mx-auto">
                <img class="w-auto h-6 sm:h-7" src="#" alt="">
            </a>
                          <NavLink 
                :href="route('logout')" method="post" as="button">
                <i class="fas fa-power-off"></i>

                <span class="mx-4 font-medium">Logout</span>
            </NavLink>
        </div>
        <div>

</div>
    </nav>
    <!-- Content Area -->
    <div class="container-fluid flex flex-col md:flex-row">

        <!-- Sidebar -->
       <aside :class="{ 'hidden': !sidebarVisible }"
         class="md:w-64  px-4 py-8 overflow-y-auto bg-white border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700 md:block" style="height: auto;" >
        <div class="flex flex-col items-center mt-6 -mx-2">
            <img class="object-cover w-24 h-24 mx-2 rounded-full"
                src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80"
                alt="avatar">
            <h4 class="mx-2 mt-2 font-medium text-gray-800 dark:text-gray-200">{{ $page.props.auth.user.name }}</h4>
            <p class="mx-2 mt-1 text-sm font-medium text-gray-600 dark:text-gray-400">{{ $page.props.auth.user.email }}</p>
        </div>

        <div class="flex flex-col justify-between flex-1 mt-6">
            <nav>
                <a class="flex items-center px-4 py-2 text-gray-700 bg-gray-100 rounded-lg dark:bg-gray-800 dark:text-gray-200"
                    href="#">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="mx-4 font-medium">Dashboard</span>
                </a>

  
         <a @click="toggleTreeview" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                    href="#">
                    <i class="fas fa-tags"></i>

                    &nbsp;<span class="mx-4 font-medium">Events</span>
          </a>

    

            <!-- Treeview (Dynamic Visibility) -->
            <div v-if="showTreeview">
                <ul>
                    <li class="mb-1">
                        <ul class="pl-4">
                            <li class="mb-1">
                                <ul class="pl-1">
                                    <li>
                                        <a class="flex items-center px-3 py-1 mt-1 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                                            href="/events/index">
                                            <i class="fas fa-list-alt"></i>

                                            <span class="mx-4 font-medium">Event List</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="flex items-center px-3 py-1 mt-1 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                                            href="/events/new-event">
                                            <i class="fas fa-calendar"> </i>

                                        &nbsp;<span class="mx-4 font-medium"> New Events</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="flex items-center px-3 py-1 mt-1 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                                            href="/events/prev-event">
                                            <i class="fas fa-calendar-week"></i>

                                            &nbsp;<span class="mx-4 font-medium">Prev Events</span>
                                        </a>
                                    </li>
                                    <li>
                                       <a class="flex items-center px-3 py-1 mt-1 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                                            href="#">
                                           <i class="fas fa-bullhorn"></i>
                                            <span class="mx-4 font-medium">Announcments</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Add more nested items as needed -->
                        </ul>
                    </li>
                </ul>
            </div>





                <a  class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                    href="#">
                   <i class="fas fa-home"></i>

                    <span class="mx-4 font-medium">Churchs</span>
                </a>

                <a class="flex items-center px-5 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                    href="/youtubelinks">
                    <i class="fas fa-play"></i>

                   &nbsp; <span class="mx-4 font-medium">Links</span>
                </a>

                <a @click="toggleTreeview1" class="flex items-center px-4  py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                    href="#">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.3246 4.31731C10.751 2.5609 13.249 2.5609 13.6754 4.31731C13.9508 5.45193 15.2507 5.99038 16.2478 5.38285C17.7913 4.44239 19.5576 6.2087 18.6172 7.75218C18.0096 8.74925 18.5481 10.0492 19.6827 10.3246C21.4391 10.751 21.4391 13.249 19.6827 13.6754C18.5481 13.9508 18.0096 15.2507 18.6172 16.2478C19.5576 17.7913 17.7913 19.5576 16.2478 18.6172C15.2507 18.0096 13.9508 18.5481 13.6754 19.6827C13.249 21.4391 10.751 21.4391 10.3246 19.6827C10.0492 18.5481 8.74926 18.0096 7.75219 18.6172C6.2087 19.5576 4.44239 17.7913 5.38285 16.2478C5.99038 15.2507 5.45193 13.9508 4.31731 13.6754C2.5609 13.249 2.5609 10.751 4.31731 10.3246C5.45193 10.0492 5.99037 8.74926 5.38285 7.75218C4.44239 6.2087 6.2087 4.44239 7.75219 5.38285C8.74926 5.99037 10.0492 5.45193 10.3246 4.31731Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="mx-4 font-medium" >Settings</span>
                </a>
                   <div v-if="showTreeview1">
                <ul>
                    <li class="mb-1">
                        <ul class="pl-4">
                            <li class="mb-1">
                                <ul class="pl-1">
                                    <li>
                                        <a class="flex items-center px-3 py-1 mt-1 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                                            href="/events/index">
                                            <i class="fas fa-list-alt"></i>

                                            <span class="mx-4 font-medium">Event List</span>
                                        </a>
                                    </li>                                 
                                </ul>
                            </li>
                            <!-- Add more nested items as needed -->
                        </ul>
                    </li>
                </ul>
            </div>



                 <a style="margin-bottom: 120px" class="flex mb-20 items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                    href="/dashboard">
                   <i class="fas fa-globe"></i>

                    <span class="mx-4 font-medium">Website</span>
                </a>
            </nav>
        </div>



      


    </aside>

        <!-- Main Content -->
        <main class="md:w-full p-8">
              <slot/>
   
        </main>

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


