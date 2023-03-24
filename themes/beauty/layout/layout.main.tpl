<!-- BEGIN: main -->
{FILE "header_only.tpl"}
{FILE "header_extended.tpl"}
<div class="wraper">

<div class="row">
<div class="col-md-24">
	[HEADER]
</div>
</div>
<div class="row">
	<div class="col-md-24">
		[TOP]
		{MODULE_CONTENT}
		[BOTTOM]
	</div>
</div>
<div class="row">
<div class="col-md-24">
	[FOOTER]
</div>
</div>

</div>
{FILE "footer_extended.tpl"}
{FILE "footer_only.tpl"}
<!-- END: main -->