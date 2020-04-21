<template>
  <a class="level-item button is-small is-danger" @click="unlike" >
        <span class="icon is-small"><i class="fas fa-thumbs-down"></i></span>
        <span>Unlike</span>
    </a>
</template>

<script>
export default {
    name: "Unlike",
    props: {
        tweetId: "",
    },
    methods: {
        unlike(){
             axios.post('like/unlikeTweet')

    //not working... 
        },
    }
}

</script>

<style>
</style>