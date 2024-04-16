<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title> #{{ $shipment->tracking_number }}</title>
 <style>
 	body{
 		font-family: 'Helvetica', sans-serif !important;
 		font-size: 8px;
 	}
 </style>
</head>
<body>
	@include('common_parts.shipment_format_pdf_new')
</body>
</html>