<template>
<div class="bg_blog">
    <div class="article_container">

        <div class="article">
            <h2>{{singleArt.title}}</h2>
            <ul v-if="singleArt.tags.length">
                <li v-for="(tag, index) in singleArt.tags" :key="index" class="tags_pin">{{'#' + tag.name }}</li>
            </ul>            
            <div class="media_cont"><img :src="'/storage/' + singleArt.image"></div>
            <div class="argument_cont">
                <p>{{singleArt.content}}</p>
            </div>  
        </div>              
    </div>
</div>
      
</template>

<script>
export default{

    name: "SinglePost",
    data() {
        return {
            singleArt: [],
        }
    },
    created(){
        axios
        .get(`/api/posts/${this.$route.params.slug}`)
        .then((response)=> {
         this.singleArt = response.data;
        })
    }
}

</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

.article_container
{
    position: relative;
    top: $height;
    background-color: #fff;
    margin: 0 auto;
    width: 800px;
    padding: 24px;

    .article
    {
        padding: 24px 0;
        margin-bottom: 80px;
        border-bottom: 1px solid lightgray;

        h2
        {
            font-size: 42px;
            line-height: 1.5em;
        }
    }
}

.media_cont
{
    padding: 16px 0;
    img
    {
        width: 100%;
    }
}


ul li 
{
    list-style-type: none;
    display: inline-block;
    background-color: lightcoral;
    padding: 8px;
    margin: 2px;
    border-radius: 15px;    
}
</style>