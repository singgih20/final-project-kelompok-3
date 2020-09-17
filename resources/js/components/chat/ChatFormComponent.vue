<template>
    <div>
        <form class="my-2">
            <div class="form-action">
                <textarea rows="2" placeholder="Ketik disini lalu tekan enter"
                    class="form-control"
                    v-model="body"
                    @keydown.enter="handleInput">
                </textarea>
            </div>
        </form>
    </div>
</template>

<script>
import moment from 'moment'
import BusEvent from '../../bus'
export default {
    data(){
        return {
            body: ''
        }
    },
    methods: {
        handleInput(e){
            if(e.keyCode == 13 && !e.shiftKey){
                e.preventDefault()
                this.submit()
            }
        },
        submit(){
            let bodyInput = this.body.trim()
            if(bodyInput == '')
            {
                return
            }
            let newChat = {
                message: bodyInput,
                created_at: moment().utc(0).format('YY-MM-DD HH:mm:ss'),
                username: Laravel.user.username
            }

            axios.post('/chat/store', {message: bodyInput}).then(response => {
                BusEvent.$emit('chat-sent', newChat)
                this.body = ''
            })

        }
    }
}
</script>