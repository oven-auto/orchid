<template>
    <div class="container showcase">
        <div class="container-title my-5" :id="ankorLink()">
            {{ groupName }}
        </div>

        <div class="row d-flex row-flex">
            <div class="col-12 col-md-4 col-lg-3 d-flex" v-for="(product, key) in products"
                :key="'product' + product.id + key">
                <ItemProduct :product="product"></ItemProduct>
            </div>
        </div>
    </div>
</template>

<script>
import ItemProduct from './ItemProduct.vue';

export default {
    components: { ItemProduct },

    props: ['groupId', 'groupName'],

    data() {
        return {
            title: ['Пицца', 'Пироженки', 'Бургеры'],
            products: [],
        }
    },

    mounted() {
        this.loadProduct()
    },

    methods: {
        ankorLink() {
            return productAnkor + this.groupId
        },

        loadProduct() {
            let url = makeUrl('products')

            let data = {
                headers: {},
                params: this.params()
            }

            this.axios.get(url, data, axiosConfig())
                .then(response => {
                    this.products = response.data.data
                }).catch(errors => {
                    console.log(errors)
                }).finally(() => {

                })
        },

        params() {
            return { product_group_id: this.groupId }
        },
    }
}
</script>
