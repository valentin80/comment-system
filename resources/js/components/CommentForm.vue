<template>
    <div class="p-2">
        <div>Reply to <strong>{{ comment.author }}</strong></div>

        <div class="col-md-12">
            <input type="text" class="form-control" v-model="author" placeholder="author...">
        </div>
        <div class="col-md-12">
            <input type="text" class="form-control" v-model="content" v-on:keyup.enter="replyTo(comment)"
                   placeholder="your comment...">
        </div>
    </div>
</template>
<style>
</style>
<script>
export default {
    props: ['comment'],
    data() {
        return {
            content: '',
            author: ''
        }
    },
    methods: {
        replyTo(comment) {
            axios.post('/api/comment', {
                content: this.content,
                author: this.author,
                post_id: comment.post_id,
                parent_id: comment.id
            }).then(response => {
                this.content = '';
                if (!response.data.error) {
                    this.content = '';
                    let payLoad = {
                        post_id: comment.post_id,
                        comments: response.data.data
                    };
                    this.$store.commit('updateComments', payLoad);
                }
            });
        }
    }
}
</script>
