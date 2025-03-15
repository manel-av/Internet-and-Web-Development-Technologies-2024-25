window.addEventListener('scroll', function() {
    const header = document.querySelector('.main-header');
    if (window.scrollY > 0) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

async function recuperarProductesCategoria(id, name) {
    var resposta = await fetch("/resource_llistar_productes.php?categoria="+id+"&name="+name);
    var respostaTxt = await resposta.text();
    document.getElementById("product-list").innerHTML = respostaTxt;
    
    var novetats = document.getElementById("novetats");
    novetats.style.display='none';
    var preFooter = document.getElementById("preFooter");
    preFooter.style.display='none';
}

$(document).ready(function() {
    $('.user-menu-btn').on('click', function () {
        $('.user-menu-options').toggle();
    });

    $(document).on('click', function (event) {
        if (!$(event.target).closest('.user-menu').length) {
            $('.user-menu-options').hide();
        }
    });
});

function handleProductClick(element) {
    const id = element.dataset.prod_id;
    const imatge = element.dataset.imatge;
    const nom = element.dataset.nom;
    const preu = element.dataset.preu;
    const descripcio = element.dataset.descripcio;

    openModal(id, imatge, nom, preu, descripcio);
}

function openModal(id, image, name, price, description) {
    const modal = document.getElementById('product-modal');
    document.getElementById('modal-prodID').value = id;
    document.getElementById('modal-image').src = image;
    document.getElementById('modal-name').textContent = `${name}`;
    document.getElementById('modal-price').textContent = `${price}€`;
    document.getElementById('modal-description').textContent = `${description}`;
    
    modal.style.display = 'flex';
    document.getElementById('add-to-cart-form').addEventListener('submit', addToCart);
}


function closeModal(event) {
    if (event.target.id === 'product-modal') {
        document.getElementById('product-modal').style.display = 'none';
    }

    document.getElementById('add-to-cart-form').removeEventListener('submit', addToCart);
}

async function addToCart(event) {
    event.preventDefault();

    const productId = document.getElementById('modal-prodID').value;
    const quantity = document.getElementById('modal-quantity').value;

    const response = await fetch('/index.php?accio=añadir_producto', {
        method: 'POST',
        body: new URLSearchParams({
            'modal-prodID': productId,
            'modal-quantity': quantity
        })
    });
    
    if (response.ok) {
        const data = await response.text();
        const [totalProds, totalPrice] = data.split(';');
        
        // Actualiza el contador de productos
        const carritoCount = document.querySelector('.carrito-count');
        if (carritoCount) {
            carritoCount.textContent = totalProds;
        }

        // Actualiza el importe total
        const totalPriceElement = document.querySelector('.import-total');
        if (totalPriceElement) {
            totalPriceElement.textContent = `Import: ${totalPrice}€`;
        }
        
        document.getElementById('modal-quantity').value = 1;
        closeModal({ target: document.getElementById('product-modal') });
        alert("Producte afegit al cabàs.");
    } else {
        alert("Hi ha hagut un error en afegir el producte al cabàs.");
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // Verificar si el contenedor de novedades existe en el DOM
    const novetatsSection = document.getElementById('novetats');
    
    if (novetatsSection) {
        const container = document.getElementById('carousel-container');
        const leftArrow = document.getElementById('left-arrow');
        const rightArrow = document.getElementById('right-arrow');
        
        const itemWidth = 100;
        const itemMargin = 20;
        const scrollAmount = itemWidth + itemMargin;

        // Habilitar/deshabilitar las flechas según el desplazamiento
        function updateArrows() {
            const maxScrollLeft = container.scrollWidth - container.clientWidth;
            
            if (container.scrollLeft <= 0) {
                leftArrow.classList.add('disabled');
            } else {
                leftArrow.classList.remove('disabled');
            }

            if (container.scrollLeft >= maxScrollLeft) {
                rightArrow.classList.add('disabled');
            } else {
                rightArrow.classList.remove('disabled');
            }
        }

        // Acción de la flecha izquierda
        leftArrow.addEventListener('click', () => {
            if (!leftArrow.classList.contains('disabled')) {
                container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            }
        });

        // Acción de la flecha derecha
        rightArrow.addEventListener('click', () => {
            if (!rightArrow.classList.contains('disabled')) {
                container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            }
        });

        updateArrows();
        container.addEventListener('scroll', updateArrows);
        window.addEventListener('resize', updateArrows);
    }
});
