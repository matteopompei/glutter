<template>
    <div>
        <section id="search">
            <div class="container-fluid">
                <div class="row py-5">
                    <div class="col-md-2">
                        <h4 class="mb-4">Criteri di ricerca</h4>
                        <!-- QUI SOTTO AGGIUNGERE I VARI FILTRI -->
                         <div class="input-group mb-3">
                            <input v-model="search" type="text" class="form-control" placeholder="Cerca il nome di un ristorante" @keyup="searchRestaurant">
                        </div>
                        <div class="filter_container">
                            <div v-for="(category, index) in all_categories" :key="index">
                                <input type="checkbox">
                                <span>{{category.name}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <h4 class="mb-4">Risultati della ricerca</h4>
                        <div
                            class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-5"
                        >
                            <div class="col pb-3" v-for="(restaurant, index) in all_restaurants" :key="index" :class="{not_visible: restaurant.visible}">
                                <div class="card restaurant">
                                    <div class="avatar-container">
                                        <img
                                            :src="`/storage/${restaurant.image}`"
                                            class="card-img-top img-food"
                                            alt=""
                                        />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{restaurant.business_name}}
                                        </h5>
                                        <p class="card-text">{{restaurant.address}}</p>
                                        <span v-for="(category, index) in restaurant.categories" :key="index" class="badge badge-light mx-1"
                                            >{{category.name}}</span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: "Search",
    data() {
        return{
            all_categories: {},
            all_restaurants: [],
            search: "" 

        }
    }, 
    methods:{
    
     searchRestaurant: function(){
                for (let index = 0; index < this.all_restaurants.length; index++) {
                    if(!element.business_name.toLowerCase().includes(this.search.toLowerCase())){
                        element.visible = true;
                    }else{
                        element.visible = false;
                    }
                }
                console.log(this.search)
            },
    },

    created() {
    axios
       .get(`/api/categories`)
       .then((apiResponse) => {
         this.all_categories = apiResponse.data;
         console.log(this.all_categories)
       })
       .catch((error) => {
         this.$router.push({ name: "error404" });
       });
    axios
        .get(`/api/restaurants`)
       .then((apiResponse) => {
         this.all_restaurants = apiResponse.data;
         console.log(this.all_restaurants)
       })
       .catch((error) => {
         this.$router.push({ name: "error404" });
       });
   },
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";
.restaurant{
    height: 100%;
}
.avatar-container {
      padding-top: 50%;
      position: relative;

      .img-food {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 100%;
        object-fit: cover;
        background-color: $grey1;
      }
    }
.not_visible{
    display: hidden;
}
</style>
