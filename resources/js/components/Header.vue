<template>
    <header>
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">Glutter</a>
        </nav>
    </header>
</template>

<script>
export default {
    name: "Header",
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

header {
    nav {
        background: $color4;
    }
}
</style>
