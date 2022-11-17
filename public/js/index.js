const cartTable = document.querySelector('#cart-body');
const listTable = document.querySelector('#tbody');
const input = document.querySelector('#search-input');

let cart = [];

document.addEventListener('DOMContentLoaded', async () => {
   const token = document.querySelector('#csrf-token').content;

   const uri = document.querySelector('#products-uri').content;

   const searchForm = document.querySelector('#search-form');
   const clean = document.querySelector('#clean-btn');

   const data = await fetch(uri, {
      headers: {
         'Content-Type': 'application/json',
         '_token': token
      }
   });

   const products = await data.json();

   products.forEach(({ id, name, stock, price }) => productRow(id, name, price, stock));

   // Busquedas
   searchForm.addEventListener('submit', (e) => {
      e.preventDefault();

      const value = input.value.trim();

      if (value.length > 0 ) {
         listTable.replaceChildren();

         const search = new RegExp(value);

         const filtered = products.filter(product => product.name.toLocaleLowerCase().search(search) !== -1);

         console.log(filtered);

         filtered.forEach(({ id, name, stock, price }) => productRow(id, name, price, stock));
      } else {
         listTable.replaceChildren();

         products.forEach(({ id, name, stock, price }) => productRow(id, name, price, stock));
      }
   });

   // Limpiar
   clean.addEventListener('click', () => {
      listTable.replaceChildren();

      input.value = '';

      products.forEach(({ id, name, stock, price }) => productRow(id, name, price, stock));
   });
});

// Generar filas en la tabla de búsqueda
const productRow = (id, name, price, stock) => {
   const tdClasses = ['text-xs', 'text-center', 'p-2'];

   const tr = document.createElement('tr');

   const nameTd = document.createElement('td');
   nameTd.classList.add(...tdClasses);
   nameTd.textContent = name;

   const priceTd = document.createElement('td');
   priceTd.classList.add(...tdClasses);
   priceTd.textContent = price;

   const stockTd = document.createElement('td');
   stockTd.classList.add(...tdClasses);
   stockTd.textContent = stock;

   const btnTd = document.createElement('td');
   btnTd.classList.add(...tdClasses);
   const btn = document.createElement('button');
   btn.classList.add('btn', 'btn-link', 'text-info', 'text-xs', 'py-1', 'px-2', 'mb-0');
   btn.addEventListener('click', () => productHandler(id, name, price, stock));
   btn.innerHTML = '<i class="fas fa-plus text-info me-2"></i>Agregar';
   btnTd.appendChild(btn);

   tr.appendChild(nameTd);
   tr.appendChild(priceTd);
   tr.appendChild(stockTd);
   tr.appendChild(btnTd);

   listTable.appendChild(tr);
}

// Acción del botón agregar de los elementos de la tabla de búsqueda
const productHandler = (id, name, price, stock) => {
   if (!cart.find(el => el.id === id)) {
      cart.push({ id, name, price, stock, quantity: 1 });
   } else {
      cart = cart.map(el => {
         if (el.id === id) {
            return {
               ...el,
               quantity: el.quantity < el.stock ? el.quantity + 1 : el.quantity
            }
         }

         return el;
      });
   }

   cartTable.replaceChildren();

   cart.forEach(({id, name, price, quantity}, i) => cartRow(id, name, price, quantity, i));

   updateData();
}

// Generar filas en la tabla del carro
const cartRow = (id, name, price, quantity, index) => {
   const tdClasses = ['text-xs', 'text-center', 'p-2'];

   const tr = document.createElement('tr');

   const nameTd = document.createElement('td');
   nameTd.classList.add(...tdClasses);
   nameTd.textContent = name;

   const qtyTd = document.createElement('td');
   qtyTd.classList.add(...tdClasses);
   const flex = document.createElement('div');
   flex.classList.add('d-flex', 'justify-content-center', 'align-items-center','gap-2');
   const minus = document.createElement('i');
   minus.addEventListener('click', () => quantityHandler(id, (-1)));
   minus.classList.add('fas', 'fa-minus-circle', 'text-primary', 'text-lg', 'pointer');
   const plus = document.createElement('i');
   plus.addEventListener('click', () => quantityHandler(id, 1));
   plus.classList.add('fas', 'fa-plus-circle', 'text-primary', 'text-lg', 'pointer');
   const inputQty = document.createElement('input');
   inputQty.type = 'number';
   inputQty.name = `cart[${index}][quantity]`;
   inputQty.readOnly = true;
   inputQty.value = quantity;
   inputQty.classList.add('operation-input');
   const inputId = document.createElement('input');
   inputId.type = 'hidden';
   inputId.name = `cart[${index}][id]`;
   inputId.value = id;
   flex.appendChild(minus);
   flex.appendChild(inputQty);
   flex.appendChild(inputId);
   flex.appendChild(plus);
   qtyTd.appendChild(flex);

   const priceTd = document.createElement('td');
   priceTd.classList.add(...tdClasses);
   priceTd.textContent = price;

   const subTd = document.createElement('td');
   subTd.classList.add(...tdClasses);
   subTd.textContent = Number(Number(quantity) * Number(price)).toFixed(2);

   const btnTd = document.createElement('td');
   btnTd.classList.add(...tdClasses);
   const btn = document.createElement('button');
   btn.classList.add('btn', 'btn-link', 'text-danger', 'py-1', 'px-2', 'mb-0');
   btn.addEventListener('click', () => deleteRow(id));
   btn.innerHTML = '<i class="fas fa-trash-alt text-danger me-2"></i>Eliminar';
   btnTd.appendChild(btn);

   tr.appendChild(nameTd);
   tr.appendChild(qtyTd);
   tr.appendChild(priceTd);
   tr.appendChild(subTd);
   tr.appendChild(btnTd);

   cartTable.appendChild(tr);
}

const quantityHandler = (id, quantity) => {
   cart = cart.map(el => {
      if (el.id === id) {
         if (quantity > 0) {
            return {
               ...el,
               quantity: (el.quantity < el.stock) ? (el.quantity + quantity) : el.quantity
            }
         } else {
            return {
               ...el,
               quantity: (el.quantity > 1) ? (el.quantity + quantity) : el.quantity
            }
         }
      }

      return el;
   });

   cartTable.replaceChildren();

   cart.forEach((product, i) => cartRow(product.id, product.name, product.price, product.quantity, i));

   updateData();
}

// Acción para el botón eliminar de los elementos de la tabla del carro
const deleteRow = (id) => {
   cart = cart.filter(el => el.id !== id);

   cartTable.replaceChildren();

   cart.forEach(({id, name, price, quantity}, i) => cartRow(id, name, price, quantity, i));

   updateData();
}

const updateData = () => {
   const total = document.querySelector('#total');
   const totalQty = document.querySelector('#total-qty');

   total.textContent = cart.reduce((total, el) => total + (el.quantity * el.price), 0).toFixed(2);

   totalQty.textContent = cart.reduce((total, el) => total + el.quantity, 0);
}