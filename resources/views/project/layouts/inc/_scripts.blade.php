<!-- Backend Bundle JavaScript -->
<script src="{{ asset('admin/js/libs.min.js') }}"></script>
@if (in_array('data-table', $assets ?? []))
    <script src="{{ asset('admin/vendor/datatables/buttons.server-side.js') }}"></script>
@endif
@if (in_array('chart', $assets ?? []))
    <!-- apexchart JavaScript -->
    <script src="{{ asset('admin/js/charts/apexcharts.js') }}"></script>
    <!-- widgetchart JavaScript -->
    <script src="{{ asset('admin/js/charts/widgetcharts.js') }}"></script>
    <script src="{{ asset('admin/js/charts/dashboard.js') }}"></script>
@endif

<!-- mapchart JavaScript -->
<script src="{{ asset('admin/vendor/Leaflet/leaflet.js') }} "></script>
<script src="{{ asset('admin/js/charts/vectore-chart.js') }}"></script>


<!-- fslightbox JavaScript -->
<script src="{{ asset('admin/js/plugins/fslightbox.js') }}"></script>
<script src="{{ asset('admin/js/plugins/slider-tabs.js') }}"></script>
<script src="{{ asset('admin/js/plugins/form-wizard.js') }}"></script>

<!-- settings JavaScript -->
<script src="{{ asset('admin/js/plugins/setting.js') }}"></script>

<script src="{{ asset('admin/js/plugins/circle-progress.js') }}"></script>
@if (in_array('animation', $assets ?? []))
    <!--aos javascript-->
    <script src="{{ asset('admin/vendor/aos/dist/aos.js') }}"></script>
@endif

@if (in_array('calender', $assets ?? []))
    <!-- Fullcalender Javascript -->
    {{-- {{-- <script src="{{asset('vendor/fullcalendar/core/main.js')}}"></script>
    <script src="{{asset('vendor/fullcalendar/daygrid/main.js')}}"></script>
    <script src="{{asset('vendor/fullcalendar/timegrid/main.js')}}"></script>
    <script src="{{asset('vendor/fullcalendar/list/main.js')}}"></script>
    <script src="{{asset('vendor/fullcalendar/interaction/main.js')}}"></script> --}}
    <script src="{{ asset('admin/vendor/moment.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/calender.js') }}"></script>
@endif

<script src="{{ asset('admin/vendor/flatpickr/dist/flatpickr.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/flatpickr.js') }}" defer></script>
{{-- <script src="{{asset('vendor/vanillajs-datepicker/dist/js/datepicker-full.js')}}"></script> --}}

<!------------------------ vendor -------------------------------------------------->
<script src="{{asset('admin/vendor/toster/js/jquery.toast.js')}}"></script>
<script src="{{asset('admin/vendor/jquery_validator/form_validator/jquery.form-validator.min.js')}}"></script>

@stack('scripts')

<script src="{{ asset('admin/js/plugins/prism.mini.js') }}"></script>

<!-- Custom JavaScript -->
<script src="{{ asset('admin/js/hope-ui.js') }}"></script>
<script src="{{ asset('admin/js/modelview.js') }}"></script>
