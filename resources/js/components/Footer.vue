<template>
    <footer class="py-5">
        <div class="row text-center credits">
            <div class="col-md">
                <h5 class="mb-3">Lorenzo Bernardini</h5>
                <div class="row">
                    <div class="col text-right">
                        <a href="https://github.com/LorenzoBernardini88"
                            ><i class="fa-brands fa-github"></i
                        ></a>
                    </div>
                    <div class="col text-left">
                        <a
                            href="https://www.linkedin.com/in/lorenzo-bernardini-9026b6237/"
                            ><i class="fa-brands fa-linkedin"></i
                        ></a>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <h5 class="mb-3 mt-5 mt-md-0">Lorenzo Guerrini</h5>
                <div class="row">
                    <div class="col text-right">
                        <a href="https://github.com/lorenzo-guerrini"
                            ><i class="fa-brands fa-github"></i
                        ></a>
                    </div>
                    <div class="col text-left">
                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <h5 class="mb-3 mt-5 mt-md-0">Matteo Pompei</h5>
                <div class="row">
                    <div class="col text-right">
                        <a href="https://github.com/matteopompei"
                            ><i class="fa-brands fa-github"></i
                        ></a>
                    </div>
                    <div class="col text-left">
                        <a href="https://www.linkedin.com/in/matteopompei/"
                            ><i class="fa-brands fa-linkedin"></i
                        ></a>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <h5 class="mb-3 mt-5 mt-md-0">Vincenzo Vitello</h5>
                <div class="row">
                    <div class="col text-right">
                        <a href="https://github.com/VincenzoVitello"
                            ><i class="fa-brands fa-github"></i
                        ></a>
                    </div>
                    <div class="col text-left">
                        <a
                            href="https://www.linkedin.com/in/vincenzo-vitello-25a963235/"
                            ><i class="fa-brands fa-linkedin"></i
                        ></a>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <h5 class="mb-3 mt-5 mt-md-0">Vito Iannuzzi</h5>
                <div class="row">
                    <div class="col text-right">
                        <a href="https://github.com/Vito9009"
                            ><i class="fa-brands fa-github"></i
                        ></a>
                    </div>
                    <div class="col text-left">
                        <a
                            href="https://www.linkedin.com/in/vito-iannuzzi-07b265236/"
                            ><i class="fa-brands fa-linkedin"></i
                        ></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: "Footer",
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

footer {
    background: $color3;
    color: $white;
    .credits {
        h5 {
            position: relative;
            font-weight: 100;

            &:after {
                content: "";
                position: absolute;
                bottom: 0;
                left: 50%;
                transform: translate(-50%, 10px);
                height: 2px;
                width: 35px;
                background: $white;
            }
        }

        a {
            font-size: 2.3rem;
            color: $white;
            transition: 0.2s;

            &:hover {
                color: $color2;
                transform: scale(2);
            }
        }
    }
}
</style>
