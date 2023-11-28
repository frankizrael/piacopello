// component.js
const consumerKey = 'tu_consumer_key';
const consumerSecret = 'tu_consumer_secret';
const basicAuth = btoa(`${consumerKey}:${consumerSecret}`);

new Vue({
    el: '#app',
    data: {
        products: [],
        categorias: [],
        selectedCategories: []
    },
    mounted() {
        //call init
        //todo aquello que se despliega al inicio de la carga de datos
        this.fetchData(); // Cargar datos iniciales
    },
    methods: {
        fetchData() {
            // Lógica para hacer la solicitud de productos, por ejemplo, mediante fetch
            fetch(`${MISITIO}/wp-json/wc/v3/products`, {
                method: 'GET',
                headers: {
                    'Authorization': `Basic ${basicAuth}`,
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                this.products = data;
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
            //categorias
            fetch(`${MISITIO}/wp-json/wc/v3/products/categories`, {
                method: 'GET',
                headers: {
                    'Authorization': `Basic ${basicAuth}`,
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                this.categorias = data;
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            })

        },
        handleCategoryCheckboxChange(category) {
            const index = this.selectedCategories.indexOf(category);
            if (index === -1) { 
                this.selectedCategories.push(category);                
            } else {
                this.selectedCategories.splice(index, 1);
            }
            
            fetch(`${MISITIO}/wp-json/wc/v3/products?category=${String(this.selectedCategories)}`)
                .then(response => response.json())
                .then(data => {
                    this.products = data;
                })
                .catch(error => {
                    console.error('Error fetching filtered data:', error);
                });
        }
    },
    template: `
        <section class="mainProducts x-container">
            <nav class="woocommerce-breadcrumb">
                <a href="${MISITIO}">Inicio</a> 
                <i></i> 
                <a href="${MISITIO}/shop/">Galeria</a>
            </nav>
            <div class="wootitle">
                <h1>${titulocantidad}</h1>
            </div>
            <div class="mainflex">
                <div class="filters">
                    <aside>
                        <h2>Categorías</h2>
                        <ul class="listCheckbox">
                            <li v-for="categoria in categorias" :key="categoria.id">
                                <input 
                                    type="checkbox" 
                                    :value="categoria.id"
                                    :id="categoria.id"
                                    @change="handleCategoryCheckboxChange(categoria.id)"
                                />
                                <label :for="categoria.id">{{ categoria.name }}</label>
                            </li>
                        </ul>
                    </aside>
                </div>
                <div class="products">  
                    <ul>
                        <li v-for="product in products" :key="product.id">
                            <div class="myproduct">
                                <div class="myproduct__img">
                                    <a :href="product.permalink">
                                        <span class="tags">
                                        {{ product.categories[0].name }}
                                        </span>
                                        <div class="plus">+</div>
                                        <img :src="product.images[0].src" />
                                    </a>
                                </div>
                                <div class="myproduct__content">
                                    <div class="myproduct__descr">
                                        <h3> {{ product.name }} </h3>
                                        <p> {{ product.meta_data[0].value }} </p>
                                        <div class="price" v-html="product.price_html">                                            
                                        </div>
                                    </div>
                                    <div class="myproduct__addcart">
                                        <div class="addproduct">
                                            <div class="priceInto"><div class="spinner"><div class="plus">+</div><input type="text" value="1"><div class="minus">-</div></div>
                                            <div class="addToCart"><a class="add-to-cart-reload-button btn btnBlack" :data-product-id="product.id">Agregar al carrito</a></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    `
});
