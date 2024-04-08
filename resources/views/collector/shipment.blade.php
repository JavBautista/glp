@extends('layouts.app_collector')
@section('content')
	<collector-shipment :shipment_id="{{$shipment_id}}"></collector-shipment>
@endsection
@push('scripts')
	<script>
       window.Laravel = <?php echo json_encode([
           'csrfToken' => csrf_token(),
        ]); ?>
    </script>
@endpush
