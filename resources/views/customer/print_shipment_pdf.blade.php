<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title> #{{ $shipment->tracking_number }}</title>
 <style>
 	body{
 		font-family: "Lucida Console", Monaco, monospace !important;
 		font-size: 9px;
 	}
 </style>
</head>
<body>
	@include('common_parts.shipment_format_pdf')
</body>
</html>