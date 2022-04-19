<template>
<div class="container-fluid m-0 p-0">
    <div class="container-fluid d-flex justify-content-around align-items-center m-0 px-5 pt-5  ms_jumbo_bg row">
        <div class="ms_search d-flex flex-column align-items-center justify-content-center col-12 col-lg-6">
            <p>Cerca tra i ristoranti o tra le tipologie.</p>
            <div class="d-flex" style="width: 80%">
                <input class="form-control mr-sm-2" type="search" placeholder="Cerca" aria-label="Search">
                <button class="btn ms_btn_search my-2 my-sm-0" type="submit">Cerca</button>
            </div>
        </div>
        <div class="ms_jumbo d-none d-lg-block col-lg-6"></div> 
    </div>
     <div class="container-fluid ms_selection">
            <h3>La selezione di <span class="ms_bernardini"> Lorenzo Bernardini</span></h3>
        </div>
          <div class="ms_food_cards d-flex flex-wrap justify-content-center">
            <div class="card m-3" style="width: 18rem;">
                <img src="https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png?w=640" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card m-3" style="width: 18rem;">
                <img src="https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png?w=640" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card m-3" style="width: 18rem;">
                <img src="https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png?w=640" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card m-3" style="width: 18rem;">
                <img src="https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png?w=640" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card m-3" style="width: 18rem;">
                <img src="https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png?w=640" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card m-3" style="width: 18rem;">
                <img src="https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png?w=640" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card m-3" style="width: 18rem;">
                <img src="https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png?w=640" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card m-3" style="width: 18rem;">
                <img src="https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png?w=640" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>    
        </div>  
</div>
    
</template>

<script>
export default {
    name: "Home",
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";
// sezione jumbotron
.ms_jumbo_bg{
    background-color: $color4;
    height: 350px;
}
.ms_btn_search{
    background-color: $color3;
    color: white;
}
.ms_jumbo{
    background-image: url("@~/images/Home-Jumbo.png");
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center;
    height: 100%;

    bottom: -75px;
}
.ms_search{
    background-color: $white;
    height: 200px;
    border-radius: 10px;
    max-width: 500px;
}
.form-control:focus {
  border-color: #019798;
  box-shadow: none;
}
.btn:focus{
    box-shadow: none;
    &:hover{
        outline: 1px solid #019798;
    }
}
//sezione ristoranti in primo piano
.ms_selection{
text-align: center;
margin-top: 100px;
h3{
font-size: 40px;
color: $grey4;
}

}
.ms_bernardini{
    color: $color3;
}
</style>
