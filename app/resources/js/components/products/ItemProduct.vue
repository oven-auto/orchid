<template>
    <div class="card pb-5 w-100">
        <div class="position-relative">
            <div class="position-relative product-image">

                <img :src="imageUrl" class="card-img-top">

                <div class="product-info">
                    <div class="novelty" v-if="product.newest">
                        Новинка
                    </div>

                    <div class="leader" v-if="product.hitable">
                        Хит
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body  my-0 py-0">
            <div class="card-title d-flex align-items-center">
                <span class="d-flex">{{ product.name }}</span>
            </div>

            <p class="card-text text-secondary product-content">
                <span>
                    {{ ingredients }}
                </span>
            </p>

        </div>

        <div class="container pt-4">
            <div class="row ">
                <div class="col  d-flex">
                    <span class="product-price align-items-center d-flex">от {{ product.price }} руб.</span>
                </div>
                <div class="col text-end">
                    <button class="product-append" @click="appendToCard">В корзину</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        product: {
            type: Object,
            default: {
                id: Number,
                name: String,
                ingredients: Array,
                newest: String,
                hitable: String
            },
        }
    },
    computed: {
        imageUrl() {
            return this.product.image;
        },

        ingredients() {
            return this.product.ingredients.join(', ')
        },

        appendToCard() {
            this.$card.value.append(this.product.id)
        }
    }
}
</script>
