
<span class="switch switch-icon">
		<label>
			<input type="checkbox"
                   {{$instance->is_featured?'checked':''}}
                   data-url="{{ route('panel.products.featured_operation' , ['id'=>$instance->id]) }}"
                   class="operation">
			<span></span>
		</label>
</span>



