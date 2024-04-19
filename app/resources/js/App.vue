<template>
<header>
    <Header></Header>
    <div class="container">
        <router-view> </router-view>
    </div>
</header>
</template>

<script>
    import Header from './components/header/Header.vue';

    export default {
        components: {Header}
    }
</script>