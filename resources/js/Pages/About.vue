<script setup>
defineProps({
    user:String
});
</script>

<template>
    <Head title="About" />
 <h1>Sobre nosotros {{ user }}</h1>
 <h2>recibir props con Shared data: {{ $page.props.user }}</h2>
</template>
