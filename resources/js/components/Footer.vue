<template>
    <footer>
        <section id="credits">
            <div class="container-fluid">
                <div class="row py-5 text-center">
                    <div class="col-md">
                        <h5 class="mb-3">Lorenzo Bernardini</h5>
                        <a
                            href="https://github.com/LorenzoBernardini88"
                            target="_blank"
                            ><i class="fa-brands fa-github mx-2"></i
                        ></a>
                        <a
                            href="https://www.linkedin.com/in/lorenzo-bernardini-9026b6237/"
                            target="_blank"
                            ><i class="fa-brands fa-linkedin mx-2"></i
                        ></a>
                    </div>
                    <div class="col-md">
                        <h5 class="mb-3 mt-5 mt-md-0">Lorenzo Guerrini</h5>
                        <a
                            href="https://github.com/lorenzo-guerrini"
                            target="_blank"
                            ><i class="fa-brands fa-github mx-2"></i
                        ></a>
                        <a href="https://www.linkedin.com/in/lorenzo-guerrini-wd/" target="_blank"
                            ><i class="fa-brands fa-linkedin mx-2"></i
                        ></a>
                    </div>
                    <div class="col-md">
                        <h5 class="mb-3 mt-5 mt-md-0">Matteo Pompei</h5>
                        <a
                            href="https://github.com/matteopompei"
                            target="_blank"
                            ><i class="fa-brands fa-github mx-2"></i
                        ></a>
                        <a
                            href="https://www.linkedin.com/in/matteopompei/"
                            target="_blank"
                            ><i class="fa-brands fa-linkedin mx-2"></i
                        ></a>
                    </div>
                    <div class="col-md">
                        <h5 class="mb-3 mt-5 mt-md-0">Vincenzo Vitello</h5>
                        <a
                            href="https://github.com/VincenzoVitello"
                            target="_blank"
                            ><i class="fa-brands fa-github mx-2"></i
                        ></a>
                        <a
                            href="https://www.linkedin.com/in/vincenzo-vitello-25a963235/"
                            target="_blank"
                            ><i class="fa-brands fa-linkedin mx-2"></i
                        ></a>
                    </div>
                    <div class="col-md">
                        <h5 class="mb-3 mt-5 mt-md-0">Vito Iannuzzi</h5>
                        <a href="https://github.com/Vito9009" target="_blank"
                            ><i class="fa-brands fa-github mx-2"></i
                        ></a>
                        <a
                            href="https://www.linkedin.com/in/vito-iannuzzi-07b265236"
                            target="_blank"
                            ><i class="fa-brands fa-linkedin mx-2"></i
                        ></a>
                    </div>
                </div>
            </div>
        </section>

        <section id="bottom">
            <div class="container-xl">
                <div class="row pt-5 links">
                    <div class="col-md py-3 py-md-0">
                        <div class="rounded p-4">
                            <h5 class="mb-3">Note Legali</h5>
                            <ul class="pl-2">
                                <li><a href="#">Termini & Condizioni </a></li>
                                <li>
                                    <a href="#">Informativa sulla privacy</a>
                                </li>
                                <li><a href="#">Cookies</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md py-3 py-md-0">
                        <div class="rounded p-4">
                            <h5 class="mb-3">Aiuto</h5>
                            <ul class="pl-2">
                                <li><a href="#">Contatti</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Tipi di cucina</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md py-3 py-md-0">
                        <div class="rounded p-4">
                            <h5 class="mb-3">Porta Glutter con te</h5>
                            <ul class="pl-2">
                                <li class="mb-2">
                                    <a href="#" target="_blank">
                                        <img
                                            src="/images/download-apple-app-store.png"
                                            alt="Apple App Store"
                                            class="img-fluid"
                                    /></a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <img
                                            src="/images/download-google-play-store.png"
                                            alt="Google Play"
                                            class="img-fluid"
                                        />
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row p-4 social">
                    <div class="col icon">
                        <a href="#" target="_blank" class="mr-3"
                            ><i class="fa-brands fa-facebook"></i
                        ></a>
                        <a href="#" target="_blank" class="mr-3"
                            ><i class="fa-brands fa-twitter"></i
                        ></a>
                        <a href="#" target="_blank"
                            ><i class="fa-brands fa-instagram"></i
                        ></a>
                    </div>
                    <div class="col text-right copyright">
                        <p>
                            <i class="fa-solid fa-copyright"></i> 2022 Glutter
                        </p>
                    </div>
                </div>
            </div>
        </section>
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
    color: $white;

    a {
        transition: 0.3s;
        text-decoration: none;
    }

    #credits {
        background: $color3;

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
            display: inline-block;
            font-size: 2.3rem;
            color: $white;
            transition: 0.3s;

            &:hover {
                color: $color2;
                transform: scale(1.2);
            }
        }
    }

    #bottom {
        background: $grey6;

        .links {
            & > div > div {
                height: 100%;
                background: $grey5;

                ul {
                    li {
                        list-style-type: none;

                        a {
                            color: $white;

                            &:hover {
                                color: $color5;
                            }
                        }
                    }
                }

                // img {
                //     width: 70%;
                // }
            }
        }
    }

    .social {
        background: $grey6;

        a {
            color: $white;

            &:hover {
                color: $color5;
            }
        }
        .copyright {
            color: $grey5;
        }
    }
}
</style>
