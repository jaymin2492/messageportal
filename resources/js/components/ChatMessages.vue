<template>
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages">
            
            <div class="chat-body clearfix" v-bind:class="[(message.user.id === user_id) ? 'right' : '']" >
                <div class="header">
                    <strong class="primary-font">
                        {{ message.user.name }}
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </li>
    </ul>
</template>

<script>
  export default {
    props: ['messages','user_id']
  };
</script>
