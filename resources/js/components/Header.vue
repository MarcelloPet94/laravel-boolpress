<template>
    <header>
        <nav>
            <h2>boolpress</h2>
            <ul>    
            <li> <router-link :to="{name:'home'}">home</router-link></li>
            <li> <router-link :to="{name:'about'}">chi siamo</router-link></li>
            </ul>
        </nav>        
    </header>
</template>

<script>

export default{
    name: "Header",
}

</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

*li{list-style-type: none;}
*a {text-decoration: none;}

header
{
    position: fixed;
    width: 100%;
    z-index: 1;
    
    nav
    {
        display: flex;
        justify-content: space-between;
        height: $height;
        padding: 24px;
        border-bottom: 1px solid blue;
        background-color: #fff;

        h2
        {
            text-transform: uppercase;
        }
        
        ul li
        {
            display: inline-block;
            padding: 16px;
        }

    }
}
</style>