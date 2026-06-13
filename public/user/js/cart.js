<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.plus-btn').forEach(button => {
        button.addEventListener('click', function () {

            let qtyNumber = this.parentElement.querySelector('.qty-number');
            let qty = parseInt(qtyNumber.innerText);
            qtyNumber.innerText = qty + 1;
            let productQty=document.getElementById('product_qty').value = qty+1;
                  document.getElementById('showqty').innerText =productQty;
        });
    });

    document.querySelectorAll('.minus-btn').forEach(button => {
        button.addEventListener('click', function () {

            let qtyNumber = this.parentElement.querySelector('.qty-number');
            let qty = parseInt(qtyNumber.innerText);

            if (qty > 1) {
                qtyNumber.innerText = qty - 1;
               let productQty=document.getElementById('product_qty').value = qty-1;
                document.getElementById('showqty').innerText =productQty;
            }
        });
    });

});
</script>