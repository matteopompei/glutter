<template>
  <div class="container-fluid p-0">
      <header class="px-5">
        <nav class="d-flex align-items-center justify-content-around pt-1">
          <div class="col-2">
            <div class="logo">
              <img src="images/Glutter1.png" alt="">
            </div>
          </div>
          <div class="col-10 text-end d-none d-md-block">
            <ul class=" m-0 p-0">
              <a class="btn ms_button_header"><i class="fa-solid fa-cart-shopping"></i>placeholder 2000€</a>
              <a class="btn ms_button_header"><i class="fa-solid fa-user"></i>registrati o accedi</a>
              <a class="btn ms_button_header"><i class="fa-solid fa-bars"></i>menu</a>
            </ul>                   
          </div>
        </nav>
        
      </header>
  </div>
</template>

<script>
export default {
name: "Header"
}
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

header{
  background-color: $color4;  
  height: 100px;
  width: 100%;
}
.logo{
  font-size: 20px;
  img{
    width: 250px;
    height: 50px;
  }
}
.btn{
  i{
    margin-right: 5px;
  }
}
.ms_button_header{
  background-color: $grey1;
  &:hover{
    outline: 1px solid $grey3;
  }
}
</style>