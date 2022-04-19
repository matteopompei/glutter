<template>
    <main>
        <div class="nav-space"></div>

        <router-view></router-view>
    </main>
</template>

<script>
export default {
    name: "Main",
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

main {
    .nav-space {
        padding-top: 100px;
        background: $color4;
    }
}
</style>
