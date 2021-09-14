import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({

    state: {
        post: {},
        comments: {},
    },

    mutations: {
        pushPost(state, payLoad) {
            state.post = payLoad;
        },
        updateComments(state, payLoad) {
            state.comments = payLoad['comments'];
        }
    }
});
