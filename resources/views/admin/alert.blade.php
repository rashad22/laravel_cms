

<?php if(Session::get('message')){?>
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		{{Session::get('message')}}
	</div>

<?php }?>