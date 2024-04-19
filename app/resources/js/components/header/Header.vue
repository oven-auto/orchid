<template>
    <header>
        <Informer></Informer>

    </header>
    <Navigator></Navigator>
</template>

<script>
import Navigator from './Navigation.vue';
import Informer from './Informer.vue';

export default {
    components: { Navigator, Informer }
}
</script>
