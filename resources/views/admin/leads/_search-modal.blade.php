<div class="modal fade" id="searchDateModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Search by date</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="/admin/leads/search" method="GET">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fa fa-calendar"></i>
							</div>
						</div>
						<input type="date" name="searchDate" placeholder="Select date" class="form-control" />
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Search</button>
				</div>
			</form>
		</div>
	</div>
</div>
