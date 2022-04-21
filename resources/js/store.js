let cart = window.localStorage.getItem('cart');
let cartCount = window.localStorage.getItem('cartCount');

let store = {
    state: {
        // Se il carrello e il totale sono presenti in locale prende il valore di essi, altrimenti li resetta
        cart: cart ? JSON.parse(cart) : [],
        cartCount: cartCount ? parseInt(cartCount) : 0,
    },
    getters: {
        // Restituisce il totale
        getTotal(state) {
            let total = 0;
            for (let dish of state.cart) {
                total = total + parseFloat(dish.totalPrice);
            }
            return Number(total).toFixed(2);
        },
    },
    mutations: {
        // Aggiunge un piatto al carrello
        addToCart(state, dish) {
            // Cerca il piatto all'interno del carrello e lo salva in una variabile
            let found = state.cart.find(product => product.id === dish.id);

            // Se il piatto è stato trovato nel carrello, ne aumenta la quantità di 1
            if (found) {
                found.quantity++;
                found.totalPrice = found.quantity * found.price;
            }
            // Se il piatto non è stato trovato nel carrello, lo aggiunge
            else {
                state.cart.push(dish);

                Vue.set(dish, 'quantity', 1);
                Vue.set(dish, 'totalPrice', dish.price);
            }

            state.cartCount++;
            this.commit('saveCart');
        },

        // Rimuove un piatto dal carrello riducendo la quantità
        removeFromCart(state, dish) {

            // Cerca il piatto all'interno del carrello e lo salva in una variabile
            let found = state.cart.find(product => product.id === dish.id);

            // Se il piatto è stato trovato, ne gestisce l'eliminazione
            if (found) {
                // Se nel carrello la quantità del piatto è maggiore di 1, la diminuisce di 1
                if (found.quantity > 1) {
                    found.quantity -= 1;
                }
                // Se nel carrello è presente un solo elemento di quel piatto, lo rimuove completamente
                else {
                    let index = state.cart.indexOf(found);
                    state.cart.splice(index, 1);
                }
                state.cartCount--;
            }
            this.commit('saveCart');
        },

        // Svuota il carrello
        removeAllFromCart(state) {
            state.cartCount = 0;
            state.cart = [];

            this.commit('saveCart');
        },

        // Salva il carrello in locale
        saveCart(state) {
            window.localStorage.setItem('cart', JSON.stringify(state.cart));
            window.localStorage.setItem('cartCount', state.cartCount);
        }
    }
};

export default store;