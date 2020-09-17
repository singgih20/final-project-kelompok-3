<template>
    <div>
        <div v-if="hasChat" class="chat-list">
            <div class="messages card mb-2" v-for="(chat, index) in chats" :key="index">
                <div class="card-body py-2 px-3">
                    <div class="user">
                        <strong>{{chat.username}}</strong>
                    </div>
                    <div class="message">
                        <pre class="mb-0">{{chat.message}}</pre>
                    </div>
                    <div class="time small text-muted">
                        {{chat.created_at}}
                    </div>
                </div>
            </div>
            <!-- <div class="messages card bg-info mb-3">
                <div class="card-body text-right">
                    <div class="user">
                        <strong>Dedi</strong>
                    </div>
                    <div class="message">
                        pesan dari dedi
                    </div>
                    <div class="time small text-muted">
                        2020-08-07 23:59
                    </div>
                </div>
            </div> -->
        </div>
    
        <div v-else>
            <div class="messages card bg-warning mb-3">
                <div class="card-body">
                    Belum ada chat
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BusEvent from '../../bus'

export default {
    data(){
        return {
            chats: [],
            hasChat: false,
            fromOthers: false,
        }
    },
    mounted(){
        this.getAllChats()
        BusEvent.$on('chat-sent', (newChat)=>{
            // console.log(newChat.user.username)
            this.chats.push(newChat)
            this.hasChat= true
            this.scrollToBottom()
        })
    },
    methods: {
        getAllChats(){
            axios.get('/chat/get-all').then(response =>{
                this.chats = response.data.reverse()
                this.hasChat= true
                this.scrollToBottom()
            })
        },
        scrollToBottom(){
            setTimeout(function(){
                let chatList = document.getElementsByClassName('chat-list')[0];
                chatList.scrollTop = chatList.scrollHeight
            }, 1)

        }
    }
}
</script>
<style lang="scss">
    .chat-list{
        max-height: 400px;
        overflow-y: scroll;
        padding-right: 3px;
    }
    .chat-list::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.5);
        border-radius: 6px;
        background-color: #F5F5F5;
    }

    .chat-list::-webkit-scrollbar
    {
        width: 8px;
        background-color: #F5F5F5;
    }

    .chat-list::-webkit-scrollbar-thumb
    {
        border-radius: 6px;
        -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,.5);
        background-color: #555;
    }
</style>