<template>
  <div>
    <h1>{{ user.business_name }}</h1>

    <div>
      <img v-if="user.image" :src="`/storage/${user.image}`" :alt="user.name" />
      <img v-else src="/images/restaurant-placeholder.png" :alt="user.name" />
    </div>
    <div><strong>Indirizzo:</strong> {{ user.address }}</div>
    <div>
      <strong>Categorie:</strong>
      <span
        v-for="category in user.categories"
        :key="category.id + category.name"
      >
        {{ category.name }}
      </span>
    </div>

    <div>
      <strong>Piatti:</strong>
      <div v-for="dish in user.dishes" :key="dish.id + dish.name">
        <div>{{ dish.name }}</div>
        <div>
          <img
            v-if="dish.image"
            :src="`/storage/${dish.image}`"
            :alt="dish.name"
          />
          <img v-else src="/images/dish-placeholder.png" :alt="dish.name" />
        </div>
        <div>{{ dish.ingredients }}</div>
        <div>Prezzo: {{ dish.price }}</div>
        <hr />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SingleUser",
  data() {
    return {
      user: {},
    };
  },
  created() {
    axios
      .get(`/api/restaurants/${this.$route.params.id}`)
      .then((apiResponse) => {
        this.user = apiResponse.data;
      })
      .catch((error) => {
        this.$router.push({ name: "page-404" });
      });
  },
};
</script>

<style>
</style>