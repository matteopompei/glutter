<template>
  
  <nav class="navbar navbar-expand-lg navbar-light ms_navbar">
      <div class="ms_logo">
            <img src="images/Glutter1.png" class="img-fluid" alt="">
      </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav mr-0 text-right">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div> -->
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
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
