<template>
<div class="container-fluid m-0 p-0">
    <div class="container-fluid d-flex justify-content-around align-items-center m-0 px-5 pt-5  ms_jumbo_bg row">
        <div class="ms_search d-flex flex-column align-items-center justify-content-center col-12 col-lg-6">
            <p>Cerca tra i ristoranti o tra le tipologie.</p>
            <div class="d-flex align-items-center" style="width: 80%">
                <input class="form-control mr-sm-2" type="search" placeholder="Cerca" aria-label="Search">
                <button class="btn ms_btn_search my-2 ml-1 my-sm-0" type="submit">Cerca</button>
            </div>
        </div>
        <div class="ms_jumbo d-none d-lg-block col-lg-6"></div> 
    </div>
    <!-- <div class="ms_selection container py-5 d-flex row">

    </div> -->
     <div class="container-fluid ms_favorite py-5">
            <h3>I piatti preferiti di <span class="ms_bernardini"> Lorenzo Bernardini</span></h3>     
          <div class="ms_food_cards d-flex flex-wrap justify-content-center">
            <div v-for="product in products" :key="product" class="card m-3" style="width: 18rem;">
                <img :src="product.image" class="card-img-top" style="height: 200px">
                <div class="card-body">
                    <h5 class="card-title">{{product.name}}</h5>
                    <p class="card-text">{{product.price}},00€</p>
                    <button @click="addItemToCart(product), getShoppingCart()" class="btn ms_btn_color3">Aggiungi al carrello</button>
                </div>
            </div>    
        </div>  
    </div>
</div>
    
</template>

<script>
import { bus } from "../front.js";
export default {
    name: "Home",
    data: () => {
        return { 
            cart: [],
            products: [
                {
                    name: "Margherita",
                    price: 5,
                    image: "https://www.scattidigusto.it/wp-content/uploads/2018/03/pizza-margherita-originale-Scatti-di-Gusto-1568x821.jpg"
                },
                {
                    name: "Marinara",
                    price: 4,
                    image: "https://wips.plug.it/cips/buonissimo.org/cms/2012/05/pizza-marinara-5.jpg"
                },
                {
                    name: "Diavola",
                    price: 6,
                    image: "https://www.coopshop.it/p/wp-content/uploads/2021/02/Salame_940x450.jpg"
                },
                {
                    name: "Pistacchiosa",
                    price: 12,
                    image: "https://www.cuochemabuone.it/wp-content/uploads/2022/01/pizza-con-mortadella-e-pistacchi.jpg"
                }
            ]
        }
    },
    methods: {
        addItemToCart(product){
            this.cart.push(product);
            // console.log(this.cart);
        },
        getShoppingCart(){
            bus.$emit('gotShoppingCart', this.cart);
        }
    }
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

    bottom: -65px;
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
.ms_favorite{
text-align: center;
background-color: $color5;
h3{
font-size: 40px;
color: $grey4;
}

}
.ms_bernardini{
    color: $color3;
}
.ms_btn_color3{
    background-color: $color3;
    color: white;
}
</style>
