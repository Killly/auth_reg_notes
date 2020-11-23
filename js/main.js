$(document).ready(function() {

	fetch_data();

	function fetch_data()
	{
		$.ajax({
			url: "../php/fetch.php",
			success: function(data)
			{
				$('tbody').html(data);
			}
		});
	}


	$('#add_button').on('click', function() {
		$('#action').val('insert');
		$('#button_action').val('Insert');
		$('.modal-title').text('Add Data');
		// $('#apicrudModal').fadeIn(500);
		$('#apicrudModal').modal('show');
	});

	$(document).mouseup(function (e) {
    var container = $("#apicrudModal");
    if (container.has(e.target).length === 0){
        container.hide();
    }
	});

	$('#api_crud_form').on('submit', function(event) {
		event.preventDefault();
		if($('#tag').val() == '')
		{
			alert("Enter Tag");
		} 
		else if($('#message').val() == '')
		{
			alert("Enter message");
		}
		else 
		{
			var form_data = $(this).serialize();
			var name = $('#uname').text();
			$.ajax({
				url: "../php/action.php",
				method: "POST",
				data: form_data,
				success: function(data)
				{
					if(data == 'insert')
					{
						alert("note was added");
					}
					fetch_data();
					$('#api_crud_form')[0].reset();
					$('#apicrudModal').modal('hide');
				} 
			});
		}

	});

	$(document).on('click', '.edit', function(){
		
		var id = $(this).attr('id'); 
		var action = 'fetch_single';
		$.ajax({
			url: "../php/action.php",
			method: "POST",
			data: {id:id, action:action},
			dataType: "json",
			success: function(data)
			{
				$('#hidden_id').val(id);
				$('#tag').val(data.tag);
				$('#message').val(data.message);
				$('#action').val('update');
				$('#button_action').val('Update');
				$('.modal-title').text('Edit Data');
				$('#apicrudModal').modal('show');
			}
		});

	});

	$(document).on('click', '.btn-danger', function() {
		var id = $(this).attr('id');
		var action = 'delete';
		$.ajax({
			url: "../php/action.php",
			method: "POST",
			data: {id:id, action:action},
			success: function(data)
			{
				fetch_data();
				
			}
		});
	});

});