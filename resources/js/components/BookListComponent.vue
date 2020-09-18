<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Buku</div>

                    <div class="card-body">
                        <div
                            class="card col-md-5 card-isi"
                            v-for="book in books"
                            v-bind:key="book.title"
                            style="height:270px;"
                        >
                            <div class="card-header">
                                <h2>{{ book.title }}</h2>
                            </div>
                            <div class="card-body" v-if="book.stock != 0">
                                {{ book.description }}
                                <br />
                                Penulis: {{ book.author }}
                                <br />
                                Publisher: {{ book.publisher }}
                                <br />
                                Stock: {{ book.stock }}
                                <br />
                                Rp.{{ book.price }}
                                <br />
                                <button-order :book="book" :user="user" />
                            </div>
                            <div class="card-body" v-else>
                                {{ book.description }}
                                <br />
                                Penulis: {{ book.author }}
                                <br />
                                Publisher: {{ book.publisher }} <br />Stock
                                habis
                                <br />
                                Rp.{{ book.price }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import buttonOrder from "./ButtonOrderComponent";
export default {
    components: {
        buttonOrder: buttonOrder
    },
    data() {
        return {
            books: [],

            form: {
                book_id: "",
                quantity: ""
            }
        };
    },
    props: ["user"],

    mounted() {
        this.getBooks();
    },

    methods: {
        async getBooks() {
            let response = await axios.get("/api/book");
            if (response.status == 200) {
                this.books = response.data.data;
            }
        }
    }
};
</script>

<style scoped>
.card-isi {
    display: inline-block;
    margin-left: 45px;
    margin-right: 10px;
    margin-top: 30px;
}

.btn-beli {
    float: right;
}
</style>
