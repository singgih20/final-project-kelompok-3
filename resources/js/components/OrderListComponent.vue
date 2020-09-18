<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">History Order</div>

                    <div class="card-body">
                        <div
                            class="card"
                            v-for="order in orders"
                            v-bind:key="order.id"
                            style="margin-bottom: 50px;"
                        >
                            <div class="card-header">
                                Judul Buku: {{ order.book.title }}
                            </div>
                            <div class="card-body">
                                Atas Nama: {{ order.user.name }}
                                <br />
                                Dikirim ke: {{ order.user.address }}
                                <br />
                                Total Harga Rp.{{ order.total_price }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            orders: []
        };
    },
    mounted() {
        this.getBooks();
    },
    methods: {
        async getBooks() {
            let response = await axios.get("/api/history");
            if (response.status == 200) {
                this.orders = response.data.data;
                console.log(this.orders);
            }
        }
    }
};
</script>
