<!DOCTYPE html>
<html>
<head>
	<title>{THEME_PAGE_TITLE}</title>
	<!-- BEGIN: metatags --><meta {THEME_META_TAGS.name}="{THEME_META_TAGS.value}" content="{THEME_META_TAGS.content}">
	<!-- END: metatags -->
	<link rel="shortcut icon" href="{SITE_FAVICON}">
	<!-- BEGIN: links -->
	<link<!-- BEGIN: attr --> {LINKS.key}<!-- BEGIN: val -->="{LINKS.value}"<!-- END: val --><!-- END: attr -->>
	<!-- END: links -->
	<!-- BEGIN: js -->
	<script<!-- BEGIN: ext --> src="{JS_SRC}"<!-- END: ext -->><!-- BEGIN: int -->{JS_CONTENT}<!-- END: int --></script>
	<!-- END: js -->
	<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "Organization",
		"url": "{NV_MY_DOMAIN}",
		"logo": "{NV_MY_DOMAIN}{LOGO_SRC}"
	}
	</script>
	<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/plugins/jqvmap/jqvmap.min.css">
	<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/dist/css/adminlte.min.css">
	<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/plugins/summernote/summernote-bs4.css">
 
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="{CLASS_BODY}">
