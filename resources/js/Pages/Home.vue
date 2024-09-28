<script setup>
//se puede importar ésto también desde el app.js
//import {  Head } from '@inertiajs/vue3';


//import Layout from '../Layout/Layout.vue';
//defineOptions({layout: Layout});
import Demo from '../Layout/Demo.vue';
//defineOptions({layout: Demo});


//datos de usuarios y paginación
import PaginationLinks from "./Components/PaginationLinks.vue";
const props =defineProps({
    users:Object,
    searchTerm: String,
    can: Object,
});
//buscador
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import { debounce } from "lodash";//npm i --save lodash
const search = ref(props.searchTerm);

watch(
  search,
  debounce((q) => router.get(route('ruta_home'), { search: q }, { preserveState: true }), 500)
);
// Format date
const getDate = (date) =>
  new Date(date).toLocaleDateString("es-es", {
    year: "numeric",
    month: "long",
    day: "numeric",
  });
</script>
<!--
también el title se puede generar así
<Head title="prueba" />
-->
<template>
    <!--
<Head>
<title>Home</title>
</Head>
-->
<Head :title="` | ${$page.component}`" />
 <h1 class="title">Hola desde Laravel 11 + Intertia + Vue 3</h1>
 <!--
 <h1>{{ $page }}</h1>
 <h2>{{ $page.component }}</h2>
 <h2>recibir props con Shared data (App\Http\Middleware/HandleInertiaRequests): {{ $page.props.auth.user }}</h2>
 -->
 <!--
 <Link class="mt-[1400px] block" :href="route('ruta_home')" preserve-scroll>Refresh</Link>
 -->

 <div>
    <!--buscador-->
    <div class="flex justify-end mb-4">
      <div class="w-1/4">
        <input type="search" placeholder="Search" v-model="search" />
      </div>
    </div>
    <!--//buscador-->
    <table>
        <thead>
            <tr class="bg-slate-300">
                <th>ID</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Email</th>
                <th>Registration Date</th>
                <th v-if="can.delete_user">Delete</th>

            </tr>
        </thead>
        <tbody>
            <tr v-for="(user, index) in users.data" :key="index">
                <td>{{ user.id }}</td>
                <td>
                    <img :src="user.avatar ? ('storage/'+user.avatar) : 'img/default.png'" :alt="user.name" class="avatar" />
                </td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ getDate(user.created_at) }}</td>
                <td v-if="can.delete_user">
                    <button class="bg-red-500 w-6 h-6 rounded-full"></button>
                </td>
            </tr>
        </tbody>
    </table>
    <!--paginación-->
    <PaginationLinks :paginator="users" />
    <!--fin paginación-->
    <!--<Link
    v-for="link in users.links"
    :key="link.label"
    v-html="link.label"
    :href="link.url"
    class="p-1 mx-1"
    :class="{'text-slate-300' : !link.url, 'text-blue-500 font-medium': link.active}" />
    <p class="text-skate-600 text-sm">Mostrando de {{ users.from }} al {{ users.to }} de {{ users.total }}...resultados</p>-->
 </div>
</template>
<!--
<template>
    <Layout>
 <h1>Hola desde Laravel 11 + Intertia + Vue 3 (en el caso de que no se use defineOptions({layout: Layout});)</h1>
</Layout>
</template>
-->
