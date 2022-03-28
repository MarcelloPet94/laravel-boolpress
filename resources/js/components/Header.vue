<template>
    <header>
        <nav>
            <li> <router-link :to="{name:'home'}"></router-link> home </li>
            <li> <router-link :to="{name:'about'}"></router-link> chi siamo </li>
        </nav>        
    </header>
</template>

<script>

export default{
    name: "Header",
}

</script>

<style lang="scss" scoped>

</style>