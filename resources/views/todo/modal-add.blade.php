<!-- Modal Structure -->
<div id="modal1" class="modal">
	<div class="modal-content">
		<h4 class="center">Add Todo</h4>
		<a href="#!" class="modal-close close">×</a>
		<form method="POST" action="{{ url('/todo/add') }}">
			{!! csrf_field() !!}
			<div class="input-field col s12">
                <input id="todo" type="text" name="todo" class="validate">
                <label for="todo">Todo Title</label>
            </div>
            <div class="input-field col s12">
            	<input type="text" name="time" class="timepicker col s12">
            	<label for="time">Todo Time</label>
            </div>
            <div class="input-field col s12">
	          	<textarea id="textarea1" name="desc" class="materialize-textarea"></textarea>
	          	<label for="textarea1">Description (Optional)</label>
	        </div>
	        <div class="center">
	        	<button class="btn btn-lg waves-effect center-margin">Add</button>
	        </div>
		</form>
	</div>
</div>