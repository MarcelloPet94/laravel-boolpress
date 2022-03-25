<template>
<div class="bg_blog">
    <div class="article_container">

        <div class="article" v-for="(article,index) in allArticle" :key="index">
            <h2>{{article.title}}</h2>
            <div class="media_cont"><img :src="'storage/' + article.image"></div>
            <div class="argument_cont">
                <p>{{article.content}}</p>
                <p>{{article.category.name}}</p>
                <ul>
                    <li v-for="(tag, index) in article.tags" :key="index" class="tags_pin">{{'#' + tag.name }}</li>
                </ul>

            </div>    
        </div>              
    </div>
</div>
</template>

<script>

export default{

    name: "Main",
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
*
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
}

.bg_blog
{
    background-color: rgb(177, 204, 255);

    .article_container
    {
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