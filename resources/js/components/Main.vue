<template>
    <main class="ms_main_container">
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
    padding-top: 85px;

}
</style>
