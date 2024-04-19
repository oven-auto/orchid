<template>
    <div class="navbar-container" ref="header_navbar" :class="{ 'navbar-background': scrollStatus }">
        <div class="container my-2 ">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Переключатель навигации">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <li class="nav-item" v-for="itemMenu in menus">
                                <a class="nav-link" :href="menuAnkor(itemMenu.id)">
                                    {{ itemMenu.name }}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-danger" href="#">Акции</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav me-0 mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="cart bg-danger">
                                    <span>Корзина</span>
                                    <span style=" padding-left: 5px; margin-left: 5px; border-left: solid 1px #fff;">
                                        {{ countCard() }}
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            menus: [],
            scrollStatus: false,
        }
    },

    mounted() {
        this.loadMenu()
    },

    created() {
        window.addEventListener('scroll', this.handleScroll);
    },
    unmounted() {
        window.removeEventListener('scroll', this.handleScroll);
    },

    methods: {
        countCard() {
            return this.$card.value.getCount()
        },

        top() {
            return this.$refs.header_navbar.getBoundingClientRect().top
        },

        handleScroll(event) {
            this.scrollStatus = this.top() === 0 ? 1 : 0;
        },

        menuAnkor(key) {
            return '#' + productAnkor + key
        },

        loadMenu() {
            let url = makeUrl('productgroups')

            this.axios.get(url, axiosConfig())
                .then(response => {
                    this.menus = response.data.data
                }).catch(error => {
                    console.log(error)
                }).finally(() => {

                })
        }
    }
}
</script>

<style>
.navbar .nav-link {
    font-size: 1.1rem;
    border-radius: 5px;
    color: #000;
}

.navbar .cart {
    display: inline-block;
    border-radius: 15px;
    font-size: 1.1rem;
    text-decoration: none;
    color: #fff;
    padding: 5px 10px;
}

.navbar-container {
    position: sticky;
    top: 0;
    z-index: 999;
    background-color: #fff;
}

.navbar-background {
    background-color: rgba(255, 255, 255, 0.9);
    border-bottom: 1px solid #eee;
}
</style>
