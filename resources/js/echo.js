import BusEvent from './bus'

Echo.join('chat-channel')
    .here(users=>{
        BusEvent.$emit('chat-here', users)
    })
    .joining(users=>{
        BusEvent.$emit('chat-joining', users)
    })
    .leaving(users=>{
        BusEvent.$emit('chat-leaving', users)
    })
    .listen('ChatStoredEvent', (e) => {
        BusEvent.$emit('chat-sent', e.data)
    });