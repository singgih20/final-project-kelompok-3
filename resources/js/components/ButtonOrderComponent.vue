<template>
  <button @click="orderBook" class="btn btn-primary btn-beli">Order</button>
</template>

 
<script>
    export default {
        props: ['book', 'user'],
        data(){
            return{
                form: {
                    user_id: this.user.id,
                    book_id: this.book.id,
                    quantity: 1
                },
                data_midtrans: {
                    'transaction_details' : {
                            'order_id' : "order/" + this.book.id +  "2",
                            'gross_amount': this.book.price
                            },
                            'customer_details' : {
                                'first_name' : this.user.name,
                                'last_name' : '',
                                'email' : this.user.email,
                                'phone' : this.user.phone
                            }
                        }
            }
        },
        mounted() {
            
        },

        methods: {
            async orderBook(){ 
          
            await axios.post("/api/order", this.form).then(response => { 
                this.generateMidtrans();
            })
            .catch(error => {
                
            })
           
           
            },

            async generateMidtrans(){
                 await axios.post('/api/generate', {data: this.data_midtrans}).then(response => {
                        snap.pay(response.data.data.token)
                    }, response => {
                        console.log('error : ' + response)
                    })
            }

        }
    }
</script>
