<template>
  
  <nav class="navbar navbar-expand-lg navbar-light ms_navbar">
      <div class="ms_logo">
            <img src="images/Glutter1.png" class="img-fluid" alt="">
      </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav mr-0  ms_ul_nav inline-block">
        <li class="nav-item active mb-1">
          <a href="#" class="btn ms_cart py-2 px-3 mx-1 ms_btn_header">
                <i class="fa-solid fa-cart-shopping mr-1"></i>
                00,00€
          </a>
        </li>
        <li class="nav-item mb-1">
          <a href="#" class="btn py-2 px-3 mx-1 ms_btn_header">
              <i class="fa-solid fa-user mr-1"></i>
              Accedi
          </a>
        </li>
        <li class="nav-item mb-1">
            <a href="#" class="btn py-2 px-3 mx-1 ms_btn_header">
              <i class="fa-solid fa-user mr-1"></i>
              Registrati
            </a>
        </li>
      </ul>
    </div>
  </nav>


</template>

<script>
export default {
  name: "Header",
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";
.ms_navbar{
  background-color: $color4;
  .ms_logo{
    img{
      height: 60px;
    }
  }
  .ms_ul_nav{
    li{
      display: inline-block !important;
      text-align: right;
    }
  }
  // a{
  //       all: unset;
  //     }
}
.ms_btn_header{
      background-color: white !important;
      border-radius: 10px !important;
      &:hover{
        background-color: $grey2;
        cursor: pointer;
      }
    }
</style>
