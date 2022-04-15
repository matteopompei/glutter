<template>
    <div class="container-fluid d-flex justify-content-between m-0 p-0 ms_jumbo_bg row">
        <div class="ms_search d-flex align-items-center col">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn ms_btn_search my-2 my-sm-0" type="submit">Search</button>
        </div>
        <div class="ms_jumbo col"></div>
    </div>
</template>

<script>
export default {
    name: "Home",
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";
.ms_jumbo_bg{
    background-color: $color4;
    height: 350px;
}
.ms_btn_search{
    background-color: $color2;
    color: white;
}
.ms_jumbo{
    background-image: url("@~/images/Home-Jumbo.png");
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center;
    height: 100%;
    position: relative;
    bottom: -75px;
}
</style>
