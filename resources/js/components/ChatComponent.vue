<template>
    <div class="chat">
        <div class="chat-content">
            <div class="message" v-for="(message, index) in messages" :key="index">
                <div class="message-head">
                    <div class="message-avatar">
                        <img :src="message.user.avatar">
                    </div>
                    <div class="message-user-info">
                        <div class="name">{{message.user.name}}</div>
                        <div class="id">@{{message.user.id}}</div>
                    </div>
                </div>
                <div class="message-text">
                    {{message.text}}
                </div>
            </div>
        </div>
        <div class="chat-form form-inline">
            <input
                    @keyup.enter="sendMessage"
                    v-model="message"
                    type="text"
                    class="form-control"
                    placeholder="Напишите что нибудь">
            <button v-on:click="sendMessage" class="btn ml-auto float-lg-right">
                <i class="fa fa-envelope"></i>
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ChatComponent",

        data: function () {
            return {
                message: '',
                messages: [],
            }
        },

        methods: {
            sendMessage() {
                console.log('click');
            }
        }
    }
</script>

<style scoped>

</style>