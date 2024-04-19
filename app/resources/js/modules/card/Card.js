import { ref } from 'vue';

import CardClass from './CardClass'

const obj = ref(new CardClass());

export default
{
    install(app)
    {
        app.config.globalProperties.$card = obj
    }
}

