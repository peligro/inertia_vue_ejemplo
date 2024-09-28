<template>
    <!--<header class="bg-green-500 text-white">
        <nav class="flex items-center justify-between p-4 max-w-screen-lg mx-auto">
            <div class="space-x-6">
                <Link href="/">Home</Link>
                <Link href="/about">About</Link>
                <Link :href="route('ruta_home')">Home</Link>
                <Link :href="route('ruta_about')">About</Link>
            </div>
        </nav>
    </header>-->
    <header>
        <nav>
            <div class="space-x-6">
                <!--<Link href="/">Home</Link>
                <Link href="/about">About</Link>-->
                <Link :href="route('ruta_home')" class="nav-link">Home</Link>
                <Link :href="route('ruta_about')" class="nav-link">About</Link>
                <Link :href="route('ruta_register')" class="nav-link">Register</Link>
            </div>
        </nav>
    </header>
    <main class="p-4">
        <slot />
    </main>
</template>
