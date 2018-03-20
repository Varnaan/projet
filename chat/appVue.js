var socket = io();

new Vue({
    el: '#app',
    data: {
        mess: "hello world",
        connectedUsers: ["a", "b"],
        messages: [],
        message: {
            "type": "",
            "action": "",
            "user": "",
            "text": "",
            "timestamp": ""
        },
        areTyping: []
    },
    created: function () {

    },
    methods: {
        send: function () {

        },
        userIsTyping: function (username) {

        },

        usersAreTyping: function () {

        },
        stoppedTyping: function () {

        },
    }
})