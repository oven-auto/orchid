export default class CardClass
{
    /**
     * Данные, массив объектов {id: Number, count: Number}...
     */
    data = []

    storageName = 'card'

    constructor()
    {
        if(CardClass._instance)
            return CardClass._instance

        CardClass._instance = this
        this.init()
    }

    /**
     * Инициализация корзины
     */
    init()
    {
        let storage = window.localStorage.getItem(this.storageName);

        if(storage)
           this.data = JSON.parse(storage);
    }

    /**
     * Записать данные корзины в localStorage
     */
    toStorage()
    {
        window.localStorage.setItem(this.storageName, JSON.stringify(this.data))
    }

    /**
     * Получить все данные
     */
    getAll()
    {
        return this.data
    }

    /**
     * Получить общее количество товаров в корзине
     */
    getCount()
    {
        let count = 0;

        this.data.forEach(product => {
            count+=product.count;
        });

        return count;
    }

    /**
     * Добавить в корзину
     * @param {Number} id
     */
    append(id)
    {
        const index = this.data.findIndex(item => item.id === id);

        if(index === -1)
            this.data.push({
                id: id,
                count: 1
            });
        else
            this.data[index].count++

        this.toStorage()

    }

    /**
     * Удалить из корзины
     * @param {Number} id
     */
    delete(id)
    {
        const index = this.data.findIndex(item => item.id === id);
        if(index >= 0)
            this.data.splice(index, 1)

        this.toStorage()
    }
}
