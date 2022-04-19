<template>
<div>
     <footer class="ms_footer container-fluid d-flex justify-content-around align-items-center m-0 p-0">
      <div class="team_member">
        <h6>Lorenzo Bernardini</h6>
        <a href="https://www.linkedin.com/in/lorenzo-bernardini-9026b6237/"><i class="fa-brands fa-linkedin"></i></a>
        <a href="https://github.com/LorenzoBernardini88"><i class="fa-brands fa-github"></i></a>
      </div>
      <div class="team_member">
        <h6>Lorenzo Guerrini</h6>
        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
        <a href="https://github.com/lorenzo-guerrini"><i class="fa-brands fa-github"></i></a>
      </div>
      <div class="team_member">
        <h6>Vito Iannuzzi</h6>
        <a href="https://www.linkedin.com/in/vito-iannuzzi-07b265236/"><i class="fa-brands fa-linkedin"></i></a>
        <a href="https://github.com/Vito9009"><i class="fa-brands fa-github"></i></a>
      </div>
      <div class="team_member">
        <h6>Matteo Pompei</h6>
        <a href="https://www.linkedin.com/in/matteopompei/"><i class="fa-brands fa-linkedin"></i></a>
        <a href="https://github.com/matteopompei"><i class="fa-brands fa-github"></i></a>
      </div>
      <div class="team_member">
        <h6>Vincenzo Vitello</h6>
        <a href="https://www.linkedin.com/in/vincenzo-vitello-25a963235/"><i class="fa-brands fa-linkedin"></i></a>
        <a href="https://github.com/VincenzoVitello"><i class="fa-brands fa-github"></i></a>
      </div> 
    </footer> 
</div>
  
  
</template>

<script>
export default {
name: "Footer"
}
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";
.ms_footer{
    height: 100px;
    background-color: $color3;
    color: white;
    a{
        all:unset;
        &:hover{
            cursor: pointer;
        }
    }
}
</style>