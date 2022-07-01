<template>
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages">

            <div class="chat-body clearfix right-body" v-if="message.is_current_user_message" style="background:url('https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png') right top no-repeat;">
                <div class="header">
                    <strong class="primary-font">
                        {{ message.user.name }}
                    </strong>
                </div>
                <p class="text-3xl font-bold underline">
                    {{ message.message }}
                    <div class="delete_message">
                        <a href="javascript:void(0);" :id="message.id"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShL4w3gmrhC5QTqdKBgFIB7ONm3MZ95IE_gQ&usqp=CAU" alt=""></a>
                    </div>
                </p>
            </div>

            <div class="chat-body clearfix" v-else  style="background:url('https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png') left top no-repeat;">
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
