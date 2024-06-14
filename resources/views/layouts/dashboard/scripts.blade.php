<script src={{ asset('asset/vendor/libs/jquery/jquery.js') }}></script>
<script src={{ asset('asset/vendor/libs/popper/popper.js') }}></script>
<script src={{ asset('asset/vendor/js/bootstrap.js') }}></script>
<script src={{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}></script>

<script src={{ asset('asset/vendor/js/menu.js') }}></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src={{ asset('asset/vendor/libs/apex-charts/apexcharts.js') }}></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
@php
$lang = config('app.locale');
@endphp
@if ($lang == 'ar' )
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/ar.min.js" integrity="sha512-OhFAHE0MI75RpzE5EbUHuZ4Ql0b5Sqinj6yLJ7qxTqcCdxDykIvnopD2uAfXC8LeJRJhazL5r7HnqOGdZbgKQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@else
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>@endif

<!-- Main JS -->
<script src={{ asset('asset/js/main.js') }}></script>
<!-- Page JS -->
<script src={{ asset('asset/js/dashboards-analytics.js') }}></script>
<script src={{asset("asset\\fontawesome\js\all.js")}}></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>


<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

<!-- Toastr CSS and JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Include jQuery and Toastr -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        $('#imageInput').on('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>

@if (Session::has('success'))
<script>
    toastr.success("{{ Session::get('success') }}");
</script>
@endif
@if (Session::has('error'))
<script>
    toastr.error("{{ Session::get('error') }}");
</script>
@endif

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Select2 JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example-multiple-select').select2({
            placeholder: "Select options",
            allowClear: true
        }).on('select2:select', function (e) {
            var selected = $(this).val();
            if (selected.includes('none')) {
                $(this).val('none').trigger('change.select2');
            } else {
                var noneIndex = selected.indexOf('none');
                if (noneIndex !== -1) {
                    selected.splice(noneIndex, 1);
                    $(this).val(selected).trigger('change.select2');
                }
            }
        });
    });
</script>
@yield('scripts-dashboard')
