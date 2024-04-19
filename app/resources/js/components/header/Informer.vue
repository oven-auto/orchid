<template>
    <div class="container">
        <div class="d-flex row">
            <div class="col-2 d-flex">
                <img src="images/logo.png">
            </div>

            <div class="col d-flex flex-column">
                <div class="">
                    <TopMenu></TopMenu>
                </div>
                <div class="d-flex h-100 ">
                    <div class="d-flex align-items-center w-100">
                        <div class="container">
                            <div class="row">
                                <div class="col d-flex align-items-center">
                                    <div class="text-start">
                                        <div class="h3">
                                            Доставка пиццы <span class="text-danger">Москва</span>
                                        </div>
                                        <div class="col text-secondary">
                                            <span class="">Пн - Вск</span>  c 12:00 - 03:00
                                        </div>
                                    </div>
                                </div>
                                <div class="col align-items-center d-flex justify-content-end">
                                    <div class="text-end">
                                        <div class="h3">
                                            <a class="phone" href="tel: +74951234567">8 (800) 555-35-35</a>
                                        </div>
                                        <div class="col text-secondary">
                                            Время доставки 40 минут
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import TopMenu from './TopMenu.vue';

    export default{
        components: {TopMenu}
    }
</script>


<style>
.phone{
    text-decoration: none;
    color: #333;
}
</style>