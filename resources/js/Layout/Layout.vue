<script setup>
//se puede importar ésto también desde el app.js
//import { Link, Head } from '@inertiajs/vue3';
import { Link, Head } from '@inertiajs/vue3';
</script>
<template>
    <Head>
        <title>Mi app</title>
        <meta name="descripcion" content="prueba intertia" />
    </Head>
    <header>
        <nav>
            <div class="space-x-6">
                <!--<Link href="/">Home</Link>
                <Link href="/about">About</Link>-->
                <Link :href="route('ruta_home')" class="nav-link" :class="{ 'bg-slate-700': $page.component === 'Home' }">Home</Link>
                <Link :href="route('ruta_about')" class="nav-link" :class="{ 'bg-slate-700': $page.component === 'About' }">About</Link>

            </div>
            <div v-if="$page.props.auth.user"  class="space-x-6 flex">
                <img :src="$page.props.auth.user.avatar ? `storage/${$page.props.auth.user.avatar}` : ('img/default.png')" class="avatar" alt="" />
                <Link :href="route('ruta_dashboard')" class="nav-link" :class="{ 'bg-slate-700': $page.component === 'Dashboard' }">Dashboard</Link>
                <Link :href="route('ruta_logout_post')" method="post" as="button" type="button" class="nav-link">Logout</Link>
            </div>
            <div v-else class="space-x-6">
                <Link :href="route('ruta_register')" class="nav-link"  :class="{ 'bg-slate-700': $page.component === 'Register' }">Register</Link>
                <Link :href="route('ruta_login')" class="nav-link" :class="{ 'bg-slate-700': $page.component === 'Login' }">Login</Link>
            </div>
        </nav>
    </header>
    <main class="p-4">
        <slot />
    </main>
</template>
