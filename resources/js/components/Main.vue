<template>
    <main>
        <div class="nav-space"></div>

        <router-view></router-view>
        <Modal ref="modal" />
    </main>
</template>

<script>
import Modal from "./Modal.vue";
export default {
    name: "Main",
    components: {
        Modal,
    },
    methods: {
        showModal() {
            let element = this.$refs.modal.$el;
            $(element).modal("show");
        },
    },
    mounted() {
        this.$root.$on("Main", () => {
            this.showModal();
        });
    },
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

main {
    .nav-space {
        padding-top: 100px;
        background: $color4;
        box-shadow: 0 10px 40px 30px $color4;
    }
}
</style>
