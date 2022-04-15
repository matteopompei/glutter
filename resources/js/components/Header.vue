<template>
  <header class="ms_header d-flex justify-content-between align-items-center p-2">
    <div class="ms_logo">
        <img src="images/Glutter1.png" class="img-fluid" alt="">
      </div>
   <!-- <div class="ms_header_navbar">
      <div class="ms_logo">
        <img src="images/Glutter1.png" class="img-fluid" alt="">
      </div>
    <nav class="ms_nav d-lg-flex d-none">
       <a href="#" class="ms_login d-flex align-items-center py-2 px-3 mx-1 ms_btn_header">
        <i class="fa-solid fa-user mr-1"></i>
        Accedi o registrati
      </a>
      <a href="#" class="ms_cart sticky-top d-flex align-items-center py-2 px-3 mx-1 ms_btn_header">
        <i class="fa-solid fa-cart-shopping mr-1"></i>
        00,00€
      </a>
    </nav>
   </div> -->

   <nav class="navbar navbar-expand-lg navbar-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="#" class="btn ms_cart d-flex align-items-center py-2 px-3 mx-1 ms_btn_header">
        <i class="fa-solid fa-cart-shopping mr-1"></i>
        00,00€
      </a>
      </li>
      <li class="nav-item">
        <a href="#" class="btn  d-flex align-items-center py-2 px-3 mx-1 ms_btn_header">
        <i class="fa-solid fa-user mr-1"></i>
        Accedi
      </a>
      </li>
      <li class="nav-item">
        <a href="#" class="btn  d-flex align-items-center py-2 px-3 mx-1 ms_btn_header">
        <i class="fa-solid fa-user mr-1"></i>
        Registrati
      </a>
      </li>
    </ul>
  </div>
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
.ms_header{
  background-color: $color4;
  .ms_logo{
    img{
      height: 60px;
    }
  }
  a{
        all: unset;
      }
  .ms_nav{
    position: absolute;
    right: 20px;
    
  }
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
