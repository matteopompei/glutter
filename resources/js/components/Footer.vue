<template>
  <footer>
    <div class="container-fluid">
          <div class="row px-2 py-4 top">
            <div class="col mx-2 my-3 my-md-0 px-3 py-2 card">
              <h5 class="mt-2 mb-3">Note Legali</h5>
              <ul>
                <li><a href="#">Termini & Condizioni </a></li>
                <li><a href="#">Informativa sulla privacy</a></li>
                <li><a href="#">Cookies</a></li>
              </ul>
            </div>
            <div class="col mx-2 my-3 my-md-0 px-3 py-2 card">
              <h5 class="mt-2 mb-3">Aiuto</h5>
              <ul>
                <li><a href="#">Contatti</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Tipi di cucina</a></li>
              </ul>
            </div>
            <div class="col mx-2 my-3 my-md-0 px-3 py-2 card">
              <h5 class="mt-2 mb-3">Porta Glutter con te</h5>
              <ul>
                <li class="mb-2"><a href="#" target="_blank">
                  <img
                    src="images/download-apple-app-store.png"
                    alt="Apple App Store"
                    class="img-fluid"
                  /></a></li>
                <li><a href="#" target="_blank">
                  <img
                    src="images/download-google-play-store.png"
                    alt="Google Play"
                    class="img-fluid"
                  />
                </a></li>
              </ul>
            </div>
          </div>
          <div class="row pb-4 social">
            <div class="col icon">
              <a href="#" class="mr-3"><i class="fa-brands fa-facebook"></i></a>
              <a href="#" class="mr-3"><i class="fa-brands fa-twitter"></i></a>
              <a href="#" class="mr-3"><i class="fa-brands fa-instagram"></i></a>
            </div>
            <div class="col d-flex justify-content-end copyright">
              <span><i class="fa-solid fa-copyright"></i> 2022 GLutter</span>
            </div>
          </div>
        </div>
    <div class="container-fluid">
      <div class="row text-center py-3 credits">
        <div class="col-md">
          <h5 class="mb-3">Lorenzo Bernardini</h5>
          <a href="https://github.com/LorenzoBernardini88" target="_blank"
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
          <a href="https://github.com/lorenzo-guerrini" target="_blank"
            ><i class="fa-brands fa-github mx-2"></i
          ></a>
          <a href="" target="_blank"
            ><i class="fa-brands fa-linkedin mx-2"></i
          ></a>
        </div>
        <div class="col-md">
          <h5 class="mb-3 mt-5 mt-md-0">Matteo Pompei</h5>
          <a href="https://github.com/matteopompei" target="_blank"
            ><i class="fa-brands fa-github mx-2"></i
          ></a>
          <a href="https://www.linkedin.com/in/matteopompei/" target="_blank"
            ><i class="fa-brands fa-linkedin mx-2"></i
          ></a>
        </div>
        <div class="col-md">
          <h5 class="mb-3 mt-5 mt-md-0">Vincenzo Vitello</h5>
          <a href="https://github.com/VincenzoVitello" target="_blank"
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
  .credits {
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

  .top {
    background: $grey6;
    .card{
      background: $grey5;
      ul li {
        list-style-type:none;
        a{
          color: $white;
          text-decoration: none;
          img{
            width: 150px;
          }
        }
      }
    }
  }
  .social{
    background: $grey6;
    a{
      color:$white;
      text-decoration: none;
      i{
        font-size: 20px;
      }
    }
    .copyright{
      color: $grey5;
    }
  }
}
</style>

