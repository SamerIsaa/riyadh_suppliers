
<span class="switch switch-icon">
		<label>
			<input type="checkbox"
                   {{$instance->show_in_footer?'checked':''}}
                   data-url="{{ route('panel.pages.operation' , ['id'=>$instance->id , 'type' => 'show_in_footer']) }}"
                   class="operation">
			<span></span>
		</label>
</span>



