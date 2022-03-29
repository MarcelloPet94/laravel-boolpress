<template>
<div class="article_container">
    <div class="article" v-for="(article,index) in allArticle" :key="index">
        <h2>{{article.title}}</h2>
        <ul v-if="article.tags.length">
            <li v-for="(tag, index) in article.tags" :key="index" class="tags_pin">{{'#' + tag.name }}</li>
        </ul>        
        <div class="media_cont"><img :src="'/storage/' + article.image"></div>
        <div class="argument_cont">
            <p>{{article.content}}</p>
            <p v-if="article.category">{{article.category.name}}</p>
        <div class="btn_article">
            <router-link :to="{ name:'single-post', params: { slug: article.slug } }">Leggi articolo</router-link>
        </div>
        </div>  

    </div>              
</div>
</template>

<script>

export default{

    name: "Posts",
    data(){
        return{
            allArticle : []
        }    
    },
    created(){
        axios
        .get('/api/posts')
        .then((response)=> {
         this.allArticle = response.data;
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
    z-index: 0;

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
        
        .btn_article
        {
            padding: 40px 0 0 0;
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