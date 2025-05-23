
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>

<script>

// Toggle sidebar on mobile
document.querySelector('.sidebar-toggle').addEventListener('click', function () {
    document.querySelector('.sidebar').classList.toggle('show');
});

// Initialize intl-tel-input
$(document).ready(function () {
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
        preferredCountries: ['pk', 'in', 'ae', 'us', 'gb'], // Pakistan, India, UAE, US, UK
        separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    // Update the hidden input with full international number when form submits
    $('form').submit(function () {
        var phoneNumber = iti.getNumber();
        $('#phone').val(phoneNumber);
        return true;
    });

    // Set initial country based on the country select field if available
    var countrySelect = document.querySelector("select[name='country']");
    if (countrySelect) {
        countrySelect.addEventListener('change', function () {
            var countryCode = this.value;
            if (countryCode) {
                iti.setCountry(countryCode.toLowerCase());
            }
        });

        // Set initial country if already selected
        if (countrySelect.value) {
            iti.setCountry(countrySelect.value.toLowerCase());
        }
    }
});


</script>