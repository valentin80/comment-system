<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-body">
                <p>
                    {{ postData.content }}
                </p>
            </div>
            <div class="panel-footer">
                <div class="col-md-12 pt-2">
                    <div><h4>Comments</h4></div>
                    <comment-list v-if="postData.comments" :collection="postData.comments"
                                  :comments="postData.comments.root"></comment-list>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-12 pt-3 mt-3 list-group-item">
                    <div><h4>Leave a comment</h4></div>

                    <div class="form-group row">
                        <label for="author" class="col-1 col-form-label">Name</label>
                        <div class="col-3">
                            <input id="author" name="author" placeholder="Your name" v-model="postData.author" type="text"
                                   required="required" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="reply" class="col-1 col-form-label">Comment</label>
                        <div class="col-11">
                            <input id="reply" name="reply" placeholder="Your comment" type="text" v-model="postData.reply"
                                   v-on:keyup.enter="comment(postData)" required="required" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import CommentList from './CommentList.vue';

export default {
    data() {
        return {
            post: {
                reply: '',
                author: ''
            }
        }
    },
    computed: {
        postData() {
            return this.$store.state.post;
        }
    },
    components: {
        'comment-list': CommentList
    },
    mounted() {
        this.getPost();
    },
    methods: {
        getPost() {
            axios.get('/api/post').then(response => {
                if (!response.data.error) {
                    this.$store.commit('pushPost', response.data.data[0]);
                }
            });
        },
        comment(post) {
            axios.post('/api/comment', {content: post.reply, author: post.author, post_id: post.id}).then(response => {
                if (!response.data.error) {
                    postData.reply = '';
                    let payLoad = {
                        post_id: postData.id,
                        comments: response.data.data
                    };
                    this.$store.commit('updateComments', payLoad);
                }
            });
        }
    }
}
</script>
