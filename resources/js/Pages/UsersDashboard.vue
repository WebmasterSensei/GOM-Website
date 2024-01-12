<script setup>
import UserLayout from '@/Layouts/UserLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Carousel, initTE } from 'tw-elements';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

</script>

<template>
    <Head title="Users Dashboard" />

    <UserLayout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Users Dashboard</h2>
        </template> -->

            <section class="background-radial-gradient overflow-hidden">

                <!-- Navbar -->

                <!-- Navbar -->

                <!-- Jumbotron -->
                <nav style="background-color: transparent;  padding-top: 40px;"
      class="flex-no-wrap relative flex w-full items-center justify-between  py-2 dark:bg-neutral-600 dark:shadow-black/10 lg:flex-wrap lg:justify-start lg:py-4">
      <div class="flex w-full flex-wrap items-center justify-between px-3" style="width: 80%; margin: auto; ">
        <!-- Hamburger button for mobile view -->
        <button
          class="block border-0 bg-transparent px-2 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden"
          type="button" data-te-collapse-init data-te-target="#navbarSupportedContent1"
          aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
          <!-- Hamburger icon -->
          <span class="[&>svg]:w-7">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7">
              <path fill-rule="evenodd"
                d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                clip-rule="evenodd" />
            </svg>
          </span>
        </button>

        <!-- Collapsible navigation container -->
        <div class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
          id="navbarSupportedContent1" data-te-collapse-item>
          <!-- Logo -->
          <a class="mb-4 ml-2 mr-5 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0"
            href="#">
            <img src="/images/logo/gmpng.png" style="height: 40px" alt="TE Logo"
              loading="lazy" />
          </a>
          <!-- Left navigation links -->
          <ul class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row" data-te-navbar-nav-ref>
            <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
              <!-- Dashboard link -->
              <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                href="#" data-te-nav-link-ref>GOM</a>
            </li>
            <!-- Team link -->
            <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
              <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                href="#" data-te-nav-link-ref>Churchs</a>
            </li>
            <!-- Projects link -->
            <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
              <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                href="#" data-te-nav-link-ref>About</a>
            </li>
          </ul>
        </div>

        <div class="relative flex items-center" v-if="$page.props.auth.user && roles.includes('admin')">

          <div class="relative" data-te-dropdown-ref data-te-dropdown-alignment="end">

            <a :href="route('admin.dashboard')" type="button" data-te-ripple-init data-te-ripple-color="light"
              class="inline-block rounded mx-2 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal 
              text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out
               hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] 
               focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] 
               focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]
               dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] 
               dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]
                dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                Home
                </a>

          </div>
        </div>
        <div class="relative flex items-center" v-if="$page.props.auth.user">

          <div class="relative" data-te-dropdown-ref data-te-dropdown-alignment="end">

            <NavLink :href="route('logout')" method="post" as="button" type="button" data-te-ripple-init
              data-te-ripple-color="light"
              class="inline-block rounded mx-2 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
              logout
            </NavLink>


          </div>
        </div>

      </div>
    </nav>
                <div class="px-6 py-12 text-center md:px-12 lg:py-40 lg:text-left">
                    <div class="w-100 mx-auto text-neutral-800 sm:max-w-2xl md:max-w-3xl lg:max-w-5xl xl:max-w-7xl">
                        <div class="grid items-center gap-12 lg:grid-cols-2">
                            <div class="mt-12 lg:mt-0" style="z-index: 10">
                                <h1
                                    class="mt-0 mb-12 text-5xl font-bold tracking-tight md:text-6xl xl:text-7xl text-[hsl(218,81%,95%)] animate__animated animate__slideInLeft animate__slow typewriter-text">
                                    God's Oracle <br />
                                </h1>
                                <span class="mt-0 mb-12 text-5xl font-bold tracking-tight md:text-6xl xl:text-7xl text-yellow text-[hsl(218,81%,75%)] animate__animated animate__fadeInUp animate__slow">Ministries</span>
                                <p
                                    class="opacity-70 text-[hsl(218,81%,85%)] animate__animated animate__zoomIn animate__slow">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Temporibus, expedita iusto veniam atque, magni tempora
                                    mollitia dolorum consequatur nulla, neque debitis eos
                                    reprehenderit quasi ab ipsum nisi dolorem modi. Quos?
                                </p>
                            </div>


                            <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
                            <div id="carouselExampleIndicators" class="relative rounded" data-te-carousel-init
                                data-te-ride="carousel">
                                <!--Carousel indicators-->
                                <div class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
                                    data-te-carousel-indicators>
                                    <button type="button" data-te-target="#carouselExampleIndicators" data-te-slide-to="0"
                                        data-te-carousel-active
                                        class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                                        aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-te-target="#carouselExampleIndicators" data-te-slide-to="1"
                                        class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-te-target="#carouselExampleIndicators" data-te-slide-to="2"
                                        class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                                        aria-label="Slide 3"></button>
                                </div>

                                <!--Carousel items-->
                                <div
                                    class="relative w-full overflow-hidden after:clear-both after:block after:content-[''] rounded">
                                    <!--First item-->
                                    <div class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                                        data-te-carousel-item data-te-carousel-active>
                                        <img src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp" class="block w-full"
                                            alt="Wild Landscape" />
                                    </div>
                                    <!--Second item-->
                                    <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                                        data-te-carousel-item>
                                        <img src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp" class="block w-full"
                                            alt="Camera" />
                                    </div>

                                    <!--Third item-->
                                    <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                                        data-te-carousel-item>
                                        <img src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp" class="block w-full"
                                            alt="Exotic Fruits" />
                                    </div>
                                </div>

                                <!--Carousel controls - prev item-->
                                <button
                                    class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                                    type="button" data-te-target="#carouselExampleIndicators" data-te-slide="prev">
                                    <span class="inline-block h-8 w-8">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 19.5L8.25 12l7.5-7.5" />
                                        </svg>
                                    </span>
                                    <span
                                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
                                </button>
                                <!--Carousel controls - next item-->
                                <button
                                    class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                                    type="button" data-te-target="#carouselExampleIndicators" data-te-slide="next">
                                    <span class="inline-block h-8 w-8">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>
                                    </span>
                                    <span
                                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
                                </button>
                            </div>

                            <!-- end of carousel -->
                        </div>
                    </div>


                </div>
                <!-- Jumbotron -->


                <div class="flex items-center justify-center pb-20">
                    <button type="button" v-if="$page.props.auth.user"
                        class="rounded animate-pulse
                        border-2 border-neutral-50 px-[46px] 
                        pt-[14px] pb-[12px] text-sm font-medium uppercase leading-normal 
                        text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 
                        hover:bg-neutral-100 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 
                        focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200" data-te-ripple-init
                        data-te-ripple-color="light">
                        Get started
                    </button>
                    <a v-if="!$page.props.auth.user"
                        class="rounded animate-pulse
                        border-2 border-neutral-50 px-[46px] 
                        pt-[14px] pb-[12px] text-sm font-medium uppercase leading-normal 
                        text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 
                        hover:bg-neutral-100 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 
                        focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200"
                        data-te-ripple-init data-te-ripple-color="light" :href="route('login')" role="button"
                        style="color: rgb(71, 135, 255);">Login
                    </a>
                </div>
                <div>

                </div>

            </section>


            <section class="px-6 py-16 text-center md:px-12 lg:py-16 lg:text-left container-app" ref="revealContainer" >
                <div class="md:container  reveal mx-auto p-4" >

                    <div class="flex justify-center">


                        <div class="text">
                            <div class="wrapper">
                                <div id="L" class="letter">V</div>

                            </div>
                            <div class="wrapper">
                                <div id="I" class="letter">M</div>
                            </div>
                            <div class="wrapper">
                                <div id="I" class="letter">G</div>
                            </div>
                        </div>


                    </div>
                    <div class="  grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <div class=" p-4">
                            <main class="l-card">
                                <section class="l-card__text">
                                    <p>
                                        This is a comment card appearing above a dotted background, and that's really cool!
                                    </p>
                                </section>
                                <section class="l-card__user">
                                    <div class="l-card__userImage">
                                        <img src="https://avatars.githubusercontent.com/u/20525486?v=4" alt="Naruto">
                                    </div>


                                    <div class="l-card__userInfo">
                                        <span>Naruto Uzumaki</span>
                                        <span>Seventh Hokage</span>
                                    </div>
                                </section>
                            </main>

                        </div>

                        <div class="p-4">
                            <main class="l-card">
                                <section class="l-card__text">
                                    <p>
                                        This is a comment card appearing above a dotted background, and that's really cool!
                                    </p>
                                </section>
                                <section class="l-card__user">
                                    <div class="l-card__userImage">
                                        <img src="https://avatars.githubusercontent.com/u/20525486?v=4" alt="Naruto">
                                    </div>
                                    <div class="l-card__userInfo">
                                        <span>Naruto Uzumaki</span>
                                        <span>Seventh Hokage</span>
                                    </div>
                                </section>
                            </main>
                        </div>


                        <div class="p-4 ">
                            <main class="l-card">
                                <section class="l-card__text">
                                    <p>
                                        This is a comment card appearing above a dotted background, and that's really cool!
                                    </p>
                                </section>
                                <section class="l-card__user">
                                    <div class="l-card__userImage">
                                        <img src="https://avatars.githubusercontent.com/u/20525486?v=4" alt="Naruto">
                                    </div>
                                    <div class="l-card__userInfo">
                                        <span>Naruto Uzumaki</span>
                                        <span>Seventh Hokage</span>
                                    </div>
                                </section>
                            </main>

                        </div>
                    </div>



                    <p class="pb-10 p-6 pt-10 reveal">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem mollitia animi deleniti tempore!
                        Porro ipsam enim,
                        praesentium voluptates hic atque et vitae! Reiciendis, unde sit. Sunt ipsa impedit sed perspiciatis!
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto vero officiis repudiandae animi
                        eligendi optio excepturi
                        minima debitis rerum aliquam! Odit, unde optio voluptatibus fugiat aut totam obcaecati quae itaque?
                        <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor nihil, repellat fugit rem
                        voluptas doloremque nobis enim nisi ea, id incidunt atque, harum veniam blanditiis alias dolores
                        nemo? Reiciendis, laboriosam?
                        <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel dolor rerum ipsum expedita impedit
                        accusantium
                        necessitatibus, velit iure laborum distinctio similique dolores odio eveniet animi est nihil ad
                        provident consectetur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint iure ipsa hic
                        nobis
                        , perspiciatis eligendi voluptatibus quidem corporis quisquam minus dignissimos possimus aut nostrum
                        vitae temporibus pariatur deleniti quod adipisci.


                    </p>
                </div>

            </section>

            <section class="lg:text-left container-app" ref="revealContainer2">
                <div class="md:container reveal mx-auto" >

                 <div class="flex justify-center">


                        <div class="text animate-pulse" >
                            <div class="wrapper">
                                <div id="L" class="letter">E</div>

                            </div>
                            <div class="wrapper">
                                <div id="I" class="letter">V</div>
                            </div>
                            <div class="wrapper">
                                <div id="I" class="letter">E</div>
                            </div>
                            <div class="wrapper">
                                <div id="I" class="letter">N</div>
                            </div>
                            <div class="wrapper">
                                <div id="I" class="letter">T</div>
                            </div>
                            <div class="wrapper">
                                <div id="I" class="letter">S</div>
                            </div>
                        </div>


                    </div>

                    <div class="flex justify-center">
                        <h1 class="text-2xl mb-10">
                            Previous Events
                        </h1>
                    </div>
                    <div class="reveal" v-for="prev in prevEvent" :key="prev.id" >
                          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-1 mb-4" >
                             <div class="p-4">
                                <div class="overflow-y-auto" style="height: 330px;">
                                      <div class="relative overflow-hidden bg-cover bg-no-repeat p-5" v-for="img in prev.image" :key="img">
                                        <img class="w-full" style="height: 300px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;"
                                            :src="'/images/events/' + img" alt="" />
                                    </div>            
                                </div>
                                <small v-if="prev.image" class="flex justify-center animate-pulse mt-2">note: scroll this image down to see more photos...</small>
                                <small v-else class="flex justify-center animate-pulse mt-2">no photos uploaded yet...</small>
                            
                            </div>

                            <!-- Column 2 -->
                            <div class="p-4" style="box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px; border: 1px solid rgb(204, 204, 204); margin-bottom: 5px; padding: 30px; border-radius: 5px;">
                              <div style="display: flex; justify-content: space-between;">
                                <h2 class="mb-0 animate-pulse" style="font-size: 20px; font-weight: 600;">{{ prev.title }}</h2>
                                <h1 class="mb-0" style="font-size: 16px; font-weight: 600; color: rgb(110, 110, 110);">
                                 {{ formattedDate(prev.date) }}
                                </h1>
                              </div>
                              <h2 >
                                {{ prev.guest_speaker }}
                              </h2>
                              <div class="flex justify-center mb-4 mt-2">
                                <h2 style="font-size: 18px; font-weight: 500; color: rgb(31, 31, 31); letter-spacing: 1px;">{{  prev.theme }}</h2>
                              </div>
                              <div class="flex justify-center mb-2 mt-2">
                                <h2 style="font-size: 17px; font-weight: 500; color: rgb(55, 55, 55); letter-spacing: 1px;">{{  prev.verse_chapter }}</h2>
                              </div>
                              <div class="w-full">
                                {{ prev.desc }}
                              </div>
                              <div class="w-full">
                                {{ prev.content }}
                              </div>
                            </div>
                            </div>

                   </div>
        <nav aria-label="Page navigation example" class="mt-10 mb-5 flex justify-center">
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

                   <div  style="border: 1px solid rgb(199, 199, 199) ; padding: 10px ; border-radius: 10px ; background: #F3F8FF" >
                  <div class="flex justify-center">
                      <h1 class="text-2xl mb-10 mt-10">
                        Upcoming Events
                    </h1>

                  </div>
                    <div  v-for="newEve in newEvent" class="w-full shrink-0 grow-0 basis-auto md:px-6 lg:w-full mb-2 reveal" >
                        <div class="mb-12 flex">
                        <div class="shrink-0">
                            <div class="rounded-md bg-[hsl(204,30%,20%)] p-4 shadow-lg dark:bg-[hsl(204,23%,30%)]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-6 w-6 text-white">
    <path stroke-linecap="round" stroke-linejoin="round"
        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17v-5h2v5h-2zm4.3-7.3l-1.4 1.4V8h-2v5.6l-1.7-1.7L7 15l5 5 5-5-1.3-1.3z" />
</svg>

                            </div>
                        </div>
                        <div class="ml-4 grow">
                            <div class="" style="display: flex; justify-content: space-between">
                                 <p class="mb-1 font-bold">{{ newEve.title }}</p>
                                 <p class="mb-1" style="font-weight: 600; color: rgb(139, 139, 139); font-size: 15px">{{ formattedDate(newEve.date) }}</p>
                            </div>
                           
                            <p class="mb-1 font-bold">{{ newEve.guest_speaker }}</p>
                            <p class="mb-1 font-bold text-center">{{ newEve.theme }}</p>
                            <p class="" style="color: black;">
                            {{ newEve.content }}
                            </p>
                            <p class="" style="color: black;">
                            {{ newEve.desc }}
                            </p>
                        </div>
                        </div>
                    </div>


                   </div>
                   <nav aria-label="Page navigation example" class="mt-10 mb-2 flex justify-center">
            <ul class="list-style-none flex space-x-2">
                <li v-for="page in paginationNew.links" :key="page.label">
                    <a v-if="page.url" href="#" @click.prevent="fetchNewData(page.url)"
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
            </section>

            <section class="px-6 py-16 text-center md:px-12 lg:py-16 lg:text-left">
                <div class="container mx-auto p-4">
                     <div class="flex justify-center">


                        <div class="text animate-pulse" >
                            <div class="wrapper">
                                <div id="L" class="letter">S</div>

                            </div>
                            <div class="wrapper">
                                <div id="I" class="letter">o</div>
                            </div>
                            <div class="wrapper">
                                <div id="I" class="letter">c</div>
                            </div>
                            <div class="wrapper">
                                <div id="I" class="letter">i</div>
                            </div>
                            <div class="wrapper">
                                <div id="I" class="letter">a</div>
                            </div>
                            <div class="wrapper">
                                <div id="I" class="letter">l</div>
                            </div>
                        </div>


                    </div>

                    <div class="flex flex-wrap"  >

                        <div class="w-full md:w-1/3 p-4">
                            <h1 class="text-md font-bold opacity-70">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere quisquam perspiciatis
                                repudiandae vero assumenda placeat? Odit suscipit nesciunt temporibus accusantium tempore!
                                Tenetur inventore laborum veritatis quam perferendis dolor provident harum!
                                <br>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error aliquam, debitis quia autem
                                ipsam
                                voluptate qui. Non corrupti, dolore eos ducimus illo ratione nulla? Vitae maiores aliquid
                                architecto voluptatibus repellat!
                            </h1>
                        </div>

                        <div class="w-full md:w-2/3 p-4" ref="revealContainer4">
                            <div class="w-full md:flex linksyt reveal" v-for="link in links" :key="link.id" >
                                <!-- Use flex for better responsiveness on larger screens -->
                                <div class="md:w-1/2 pr-2"> <!-- Adjust the width for larger screens -->
                                    <iframe class=" rounded"
                                        style="height: 150px; width: 85%; margin: 0 auto; margin-bottom: 20px; margin-top: 20px;"
                                        :src="link.links" allowfullscreen="" data-gtm-yt-inspected-2340190_699="true"
                                        id="240632615"></iframe>
                                </div>

                                <div class="md:w-full descyt">
                                    <h1 class="mb-3 mt-5 text-2lg font-bold">{{ link.title }}</h1>
                                    <p>
                                      {{ link.desc }}
                                    </p>
                              
                                </div>
                            </div>
                               <nav aria-label="Page navigation example" class="mt-10 mb-2 flex justify-center">
            <ul class="list-style-none flex space-x-2">
                <li v-for="page in paginationYt.links" :key="page.label">
                    <a v-if="page.url" href="#" @click.prevent="fetchYtLinks(page.url)"
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

            </section>




   
    </UserLayout>
</template>
<script>
import VueObserveVisibility from 'vue-observe-visibility';
import { Carousel, initTE } from 'tw-elements';
// import { onMounted } from 'vue';

export default {
    directives: {
        'observe-visibility': VueObserveVisibility.directive,
    },
    data() {
        return {
            prevEvent: [],
            newEvent: [],
            links: [],
            pagination: [],
            paginationNew: [],
            paginationYt: [],
            isActive: false,
            roles: [],

        }
    },
    mounted() {

        initTE({ Carousel });
        this.fetchData('/prev-event-getter?page=1');
        this.fetchNewData('/new-event-getter?page=1');
        this.fetchYtLinks('/get_yt_links?page=1');

        // window.addEventListener("scroll", this.reveal);
        // this.reveal()
        window.addEventListener('scroll', this.handleScroll);
        this.fetchUserData()


    },
    beforeDestroy() {
        // window.removeEventListener("scroll", this.reveal);
        window.removeEventListener('scroll', this.handleScroll);
    },
    props: {
        event: Array,
        // links: Array,
    },
    methods: {
         fetchUserData() {
      axios.get('/api/user-data')
        .then(response => {
          // this.user = response.data.user;
          this.roles = response.data.roles;
          // this.permissions = response.data.permissions;
        })
        .catch(error => {
          console.error('Error fetching user data', error);
        });
    },

         handleScroll() {
      const revealContainer = this.$refs.revealContainer;
      const revealContainer2 = this.$refs.revealContainer2;
      const revealContainer4 = this.$refs.revealContainer4;
      const revealElements = revealContainer.querySelectorAll('.reveal');
      const revealElements2 = revealContainer2.querySelectorAll('.reveal');
      const revealElements4 = revealContainer4.querySelectorAll('.reveal');

      for (let i = 0; i < revealElements.length; i++) {
        const elementTop = revealElements[i].getBoundingClientRect().top;
        const elementVisible = 150;
        const isVisible = elementTop < window.innerHeight - elementVisible;

        if (isVisible) {
          revealElements[i].classList.add('active');
        } else {
          revealElements[i].classList.remove('active');
        }
      }
      for (let i = 0; i < revealElements2.length; i++) {
        const elementTop = revealElements2[i].getBoundingClientRect().top;
        const elementVisible = 150;
        const isVisible = elementTop < window.innerHeight - elementVisible;

        if (isVisible) {
          revealElements2[i].classList.add('active');
        } else {
          revealElements2[i].classList.remove('active');
        }
      }
      for (let i = 0; i < revealElements4.length; i++) {
        const elementTop = revealElements4[i].getBoundingClientRect().top;
        const elementVisible = 150;
        const isVisible = elementTop < window.innerHeight - elementVisible;

        if (isVisible) {
          revealElements4[i].classList.add('active');
        } else {
          revealElements4[i].classList.remove('active');
        }
      }
    },

        toggleLike(postId) {
            axios.put('/likes/' + postId).then(response => {
                console.log('success')
            })
        },

        formattedDate(event) {
            const date = new Date(event);
            const options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
            };
            return date.toLocaleDateString('en-US', options);
        },
        fetchData(url) {
            axios.get(url)
                .then(response => {
                    this.prevEvent = response.data.data;
                    this.pagination = response.data;
                })
        },
        fetchNewData(url) {
            axios.get(url)
                .then(response => {
                    this.newEvent = response.data.data;
                    this.paginationNew = response.data;
                })
        },
        fetchYtLinks(url) {
            axios.get(url)
                .then(response => {
                    this.links = response.data.data;
                    this.paginationYt = response.data;
                })
        },

    },
};

</script>


<style scoped>
.text {
    font-family: system-ui;
    font-size: 30px;
    font-weight: 500;
    display: flex;
    /* transform: translateX(-50%); */
    user-select: none;
    padding-bottom: 50px;

    .wrapper {
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 10px;

        .letter {
            transition: ease-out 1s;
            transform: translateY(40%);
        }

        &:hover {
            .letter {
                transform: translateY(-200%);
            }

        }
    }
}

img {
    width: 100%;
    height: auto;
}

.l-card {
    width: auto;
    min-width: 100%;
    max-width: 100%;
    border-radius: 5px;
    height: auto;
    background: #f5f5f5;
    color: #272727;
    padding: 50px;
    box-shadow: 0px 7px 24px rgba(100, 100, 100, 0.4);
}

.l-card__text p {
    font-size: 30px;
    font-family: "Vollkorn", serif;
    font-weight: 400;
    color: #3f3f55;
    text-align: left;
}

.l-card__text p::after {
    content: "\201D";
    display: inline;
    color: #999;
}

.l-card__text p::before {
    content: "\201C";
    display: inline;
    color: #999;
}

.l-card__user {
    display: flex;
    flex-direction: row;
    padding-top: 24px;
    margin-top: 12px;
    /* border-top: 1px solid #c1c1c1; */
    align-items: center;
}

.l-card__userImage {
    width: 42px;
    height: 42px;
    overflow: hidden;
    border-radius: 10%;
}

.l-card__userImage img {
    width: 100%;
    height: 100%;
    object-filt: cover;
}

.l-card__userInfo {
    display: flex;
    flex-direction: column;
    margin-left: 16px;
}

.l-card__userInfo span:nth-child(1) {
    font-weight: bold;
    font-family: sans-serif;
    font-size: 14px;
    color: #3f3f55;
}

.l-card__userInfo span:nth-child(2) {
    color: #adada6;
    font-family: sans-serif;
    font-size: 12px;
    margin-top: 2px;
}

.reveal {
    position: relative;
    transform: translateY(150px);
    opacity: 0;
    transition: 1.5s all ease;
}

.reveal.active {
    opacity: 1;
    transform: translateY(0);
}

.comments {
    display: flex;
    justify-content: space-between;
}

.unique-card {
    position: relative;
    width: 100%;
    height: 270px;
    overflow: hidden;
    border-radius: 8px;
    /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); */
    box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    transition: transform 0.3s, box-shadow 0.3s;
    background: #265073;
}

.unique-card:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
}

.card-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: #ffffff;
    z-index: 2;
    transition: color 0.3s;
}

.unique-card:hover .card-content {
    color: #000000;
}

.background-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgb(255, 255, 255);
    border-radius: 8px;
    opacity: 0;
    transition: opacity 0.3s;
}

.unique-card:hover .background-overlay {
    opacity: 1;
}

.card-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
}

.card-description {
    font-size: 16px;
}

.background-radial-gradient {
    /* background-color: hsl(219, 41%, 31%);
    background-image: radial-gradient(650px circle at 0% 0%,
            hsl(218, 41%, 35%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(219, 45%, 35%) 75%,
            hsl(218, 42%, 35%) 80%,
            transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
            hsl(218, 41%, 45%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(219, 65%, 19%) 75%,
            hsl(218, 36%, 43%) 80%,
            transparent 100%); */

    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
        url('https://media.istockphoto.com/id/1386672432/photo/man-worship-pray-for-god-blessing-to-wishing-have-a-better-life-man-hands-holding-praying-to.jpg?s=612x612&w=0&k=20&c=fPGZ2THpqJS4ejnH2KwOd7rhaYbcFR71Et3QLrFj60I=');
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    height: auto;

}

#radius-shape-1 {
    height: 220px;
    width: 220px;
    top: -60px;
    left: -130px;
    background: radial-gradient(#44006b, #ad1fff);
    overflow: hidden;
}

#radius-shape-2 {
    border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
    bottom: -60px;
    right: -110px;
    width: 300px;
    height: 300px;
    background: radial-gradient(#44006b, #ad1fff);
    overflow: hidden;
}


* {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-rendering: optimizelegibility;
    letter-spacing: -0.25px;
}

ol {
    padding-left: 50px;
}

.imgages-p {
    display: inline-block;
}

.desc {
    display: inline-block;
}

.main1 {
    display: block;
    margin: 0 auto;
    max-width: 40rem;
    padding: 1rem;
}



ol.gradient-list>li {
    background: white;
    border-radius: 0 0.5rem 0.5rem 0.5rem;
    counter-increment: gradient-counter;
    margin-top: 1rem;
    min-height: 3rem;
    padding: 1rem 1rem 1rem 3rem;
    position: relative;
}

ol.gradient-list>li::before,
ol.gradient-list>li::after {
    background: linear-gradient(135deg, #83e4e2 0%, #a2ed56 100%);
    border-radius: 1rem 1rem 0 1rem;
    content: "";
    height: 3rem;
    left: -1rem;
    overflow: hidden;
    position: absolute;
    top: -1rem;
    width: 3rem;
}

ol.gradient-list>li::before {
    align-items: flex-end;
    color: #1d1f20;
    display: flex;
    font: 900 1.5em/1 "Montserrat";
    justify-content: flex-end;
    padding: 0.125em 0.25em;
    z-index: 1;
}


ol.gradient-list>li+li {
    margin-top: 2rem;


}

@media screen and (max-width: 768px) {
    .unique-card {
        height: 170px;
    }

    .l-card__text p {
        font-size: 19px;
        font-family: "Vollkorn", serif;
        font-weight: 400;
        color: #3f3f55;
        text-align: left;
    }
    .ds{
        width: 19px
    }

}

 .typewriter-text {
            overflow: hidden; /* Hide overflow to create typing effect */
            border-right: .15em solid orange; /* Cursor blinking effect */
            white-space: nowrap; /* Keep text on a single line */
            margin: 0 auto;
            letter-spacing: .15em; /* Adjust letter spacing for a cleaner look */
             animation: typing 5s steps(40, end), blink-caret .75s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
        }

        @keyframes blink-caret {
            from,
            to {
                border-color: transparent;
            }
            50% {
                border-color: orange;
            }
        }

</style>
