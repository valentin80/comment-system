<template>
    <li class="list-group-item" v-bind:class="[className]">
        <div class="comment-item float-left w-100">
            <div class="comment-author float-left"><strong>{{ comment.author }}</strong> said</div>
            <div class="comment-date float-right">{{ comment.created_at }}</div>
        </div>
        <div class="float-left w-100">{{ comment.content }}</div>
        <div class="clearfix"></div>
        <div class="float-left"><a @click="replyToComment = comment" v-show="showReply" class="reply" href="javascript:void(0);">Reply</a></div>
        <div class="float-left w-100"><comment-form v-if="replyToComment == comment" :comment="comment"></comment-form></div>
        <div class="float-left w-100"><comment-list v-if="collection[comment.id]" v-bind:comments="collection[comment.id]" v-bind:collection="collection"></comment-list></div>
    </li>
</template>
<script>
    import CommentList from './CommentList.vue';
    import CommentForm from './CommentForm.vue';
//$('.xx').parents('li.list-group-item').length
    export default{
        props: ['comment', 'collection'],
        data(){
            return {
                className: '',
                replyToComment: false,
                showReply: ($('.comment-'+this.comment.id).parents('li.list-group-item').length < 3)
            }
        },
        mounted(){
            console.log('.comment-'+this.comment.id + ' ssss '+$('.comment-'+this.comment.id).parents('li.list-group-item').length)
            this.showReply = ($('.comment-'+this.comment.id).parents('li.list-group-item').length < 3)
            this.className = 'comment-'+this.comment.id;
        },

        components: {
            'comment-list': CommentList,
            'comment-form': CommentForm
        }
    }
</script>

<style>
.comment-date {
    font-size: 10px;
}
</style>
