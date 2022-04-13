<template>
  <div class="container-fluid ms_home_container_bg">
    <div class="ms_jumbotron">
      <form class="ms_search_bar_form"> 
        <h6>Cosa ti va di mangiare? Cerca tra i ristoranti o per tipologia.</h6>
        <div class="ms_search_bar_container">
          <input class="ms_search_bar" type="search" placeholder="Search" aria-label="Search">
          <button class="ms_search_btn" type="submit">Search</button>
        </div>        
      </form>
      <img src="images/home_jumbo.png" alt="">
    </div>
  </div>
</template>

<script>
export default {
name: "Home"
}
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";
.ms_home_container_bg{
  background-color: $color4;
}
.ms_jumbotron{
  margin: 0px 100px;
  display: flex;
  justify-content: space-between;
  align-items: center;
    .ms_search_bar_form{
      background-color: white;
      height: 200px;
      width: 600px;
      border-radius: 5px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
  .ms_search_btn{
    background-color: $cyan;
    color: black;
    padding: 5px 10px;
    border-radius: 5px;
    border: 1px solid $blue;
  }
  .ms_search_bar{
    width: 400px;
    height: 36px;
    border: 0px;
    padding-left: 10px;
    border-radius: 5px;
    box-shadow: inset 0 0 5px rgba($color: #000000, $alpha: 0.2);
  }
}
</style>