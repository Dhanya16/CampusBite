const availabilityLink = document.getElementById('availability');
const editMenuLink = document.getElementById('editMenu');
const ordersLink = document.getElementById('orders');

const availabilityContent = document.getElementById('availabilityContent');
const editMenuContent = document.getElementById('editMenuContent');
const ordersContent = document.getElementById('ordersContent');

availabilityLink.addEventListener('click', () => showPage(availabilityContent));
editMenuLink.addEventListener('click', () => showPage(editMenuContent));
ordersLink.addEventListener('click', () => showPage(ordersContent));

function showPage(pageContent) {
    availabilityContent.style.display = 'none';
    ordersContent.style.display = 'none';
    editMenuContent.style.display = 'none';
    pageContent.style.display = 'block';
}

var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')
        myModal.addEventListener('shown.bs.modal', function () {
            myInput.focus()
        })
