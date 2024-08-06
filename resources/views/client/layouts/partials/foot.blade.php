<script src="{{ asset('theme/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('theme/js/jquery-ui.js') }}"></script>
<script src="{{ asset('theme/js/popper.min.js') }}"></script>
<script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('theme/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('theme/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('theme/js/aos.js') }}"></script>
<script src="{{ asset('theme/js/chude.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

<script src="{{ asset('theme/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script>
    function applyDiscount() {
        var discountCode = document.getElementById('discount-code').value;
        var subtotal = parseFloat(document.getElementById('subtotal').textContent.replace(/[^0-9.-]+/g, ""));
        var discount = parseFloat(discountCode) || 0;
        var discountAmount = subtotal * (discount / 100);
        var total = subtotal - discountAmount;

        document.getElementById('discount').textContent = discountAmount.toLocaleString() + ' vnd';
        document.getElementById('total').textContent = total.toLocaleString() + ' vnd';
        document.querySelector('input[name="total"]').value = total;
    }
</script>
