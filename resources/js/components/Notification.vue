<template>
    <div></div>
</template>
<script>
export default {
    mounted() {
        this.listen();
    },
    methods: {
        listen() {
            Pusher.logToConsole = true;

            var pusher = new Pusher(process.env.MIX_PUSHER_APP_KEY, {
                cluster: 'mt1'
            });

            //Subscribe to the channel I created special for this appplication
            let channel = pusher.subscribe('aloware-comment')

            channel.bind('new-comment', (data) => {
                this.$store.commit('pushPost', data.post);
            });
        }
    }
}
</script>
