<template>
    <a class="level-item button is-small is-info" @click="like" >
        <span class="icon is-small"><i class="fas fa-thumbs-up"></i></span>
        <span>Like</span>
    </a>

</template>

<script>
export default {
    name: "Like",
    props: {
        tweetId: "",
    },
    methods: {
        like(){
            axios.post('like/likeTweet',{
                tweetId: this.tweetId,
            })
            .then(response => {
                this.$root.$emit();
            
            });   //not working... 
        },
    },
}
</script>

<style>
</style>