<template>
  <div class="header_container">
      <header>
        <div class="logo">GLUTTER</div>
        <nav>
          <ul>
            <li><div class="nav_button"><i class="fa-solid fa-arrow-down"></i>Lavora con noi</div></li>
            <li><div class="nav_button"></div></li>
            <li></li>
            <li></li>
          </ul>
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
  display: flex;
  align-items: center;
  justify-content: flex-start;

}
.logo{
  margin-left: 50px;
  font-size: 20px;
}
</style>