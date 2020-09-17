<template>
    <div>
        <div class="card">
            <div class="card-header bg-dark text-white">
                User Online : <span class="badge badge-light float-right">{{ users.length }}</span>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item" v-for="user in users" :key="user.id">{{user.username}}</li>
            </ul>
        </div>
    </div>
</template>

<script>
import BusEvent from '../../bus'

export default {
    data(){
        return {
            users: []
        }
    },
    mounted(){
        BusEvent.$on('chat-here', users=>{
            this.users = users
        }).$on('chat-joining', user=>{
            this.users.push(user)
        }).$on('chat-leaving', user=>{
            this.users = this.users.filter(u=>{
                return u.username !== user.username
            })
        })
    }
}
</script>