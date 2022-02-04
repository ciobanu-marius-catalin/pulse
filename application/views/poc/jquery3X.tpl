{extends file='shared/layout.tpl'}

{block name="head"}
	{bundle name='datetimepicker'}
{/block}	
{block name="body"}


	<div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
					<input type="text" id="datetimepicker" class="form-control"><br/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
		</div>
	</div>

{/block}
{block name="scripts"}
	<script>

		$(function () {
			$('#datetimepicker').datetimepicker()

		});
	</script>
{/block}