<template>
    <ul class="list-group">
        <comment v-for="comment in comments" v-bind:comment="comment" v-bind:collection="collection"
                 v-bind:key="comment.id"></comment>
    </ul>
</template>
<script>
export default {
    props: ['collection', 'comments'],
    computed: {},
    beforeCreate: function () {
        
    }
}
</script>
