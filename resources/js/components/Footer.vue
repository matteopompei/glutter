<template>
  <footer>
    <hr class="m-0 p-0">
    <div class="container-fluid">
      <div class="row text-center py-5 credits">
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
    <div class="row align-items-center text-center py-3 px-1 copy">
        <div class="col">
          <p class="m-0 p-0">Copyright © 2022</p>
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

  .copy {
    background: $black;
  }
}
</style>
