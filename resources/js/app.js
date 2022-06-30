/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 Vue.component('chat-messages', require('./components/ChatMessages.vue').default);
 Vue.component('chat-form', require('./components/ChatForm.vue').default);
 
 const app = new Vue({
     el: '#app',
     data: {
         messages: [],
         user_id: document.querySelector("meta[name='user_id']").getAttribute('content')
     },
     created() {
        this.fetchMessages();
        Echo.private('chat').listen('ChatMessageSent', (e) => {
                this.messages.push({
                message: e.message.message,
                user: e.user
            });
        })
     },
     methods:{
         fetchMessages(){
             axios.get('/chat_messages').then(response => {
                 this.messages = response.data;
             });
         } ,
         addMessage(message) {
             this.messages.push(message);
             axios.post('/chat_messages', message).then(response => {
               console.log(response.data);
             });
         }
     }
 });