<div>
	<label class="settinglabel">Icon Class</label>
	<input type="text" class="icon-class-input" value="fa fa-music" />
	<button type="button" class="btn btn-primary picker-button">Pick an Icon</button>
	<span class="demo-icon"></span>
</div>
<div>
	<label class="settinglabel">Icon Class</label>
	<input type="text" class="icon-class-input" value="fa fa-search" />
	<button type="button" class="btn btn-primary picker-button">Pick an Icon</button>
	<span class="demo-icon"></span>
</div>

<div id="iconPicker" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Select Icon
			</div>
				
			<div class="modal-body">
				<div>
					<ul class="icon-picker-list">
						<li>
							<a data-class="{{item}} {{activeState}}" data-index="{{index}}">
								<span class="{{item}}"></span>
								<span class="name-class">{{item}}</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			
			<div class="modal-footer">
			   <button type="button" id="change-icon" class="btn btn-success"><span class="fa fa-check-circle-o"></span> Use Selected Icon</button>
			</div>
		</div>
	</div>
</div>