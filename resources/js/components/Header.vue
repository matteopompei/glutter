<template>
  <div class="header_container">
      <header>
        <div class="logo">GLUTTER</div>
        <nav>
          <ul>
            <li><div class="nav_button"><i class="fa-solid fa-arrow-down"></i>Lavora con noi</div></li>
            <li><div class="nav_button">placeholder carrello</div></li>
            <li><div class="nav_button">registrati o accedi</div></li>
            <li><div class="nav_button">menu</div></li>
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
  justify-content: space-between;

}
.logo{
  margin-left: 120px;
  font-size: 20px;
}
nav{
  margin-right: 120px;
  ul{
    list-style-type: none;
    display: flex;
    justify-content: space-between;
    li{
      margin: 0px 10px;
      background-color: $grey1;
      padding: 8px 12px;
      border-radius: 5px;
      &:hover{
        outline: 1px solid $grey3;
        cursor: pointer;
      }
    }
  }
}
</style>