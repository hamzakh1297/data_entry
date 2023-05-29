
		$(document).ready(function(){

			$(".mem_name_input").focus();
			$(".members_input").val(1);
			
			$('.member_form').on("submit",function(e){
				let form_data = $('#data-form').serialize();
				e.preventDefault();
				$.ajax({
					url : "add-data.php",
					type : "POST",
					data : form_data,
					dataType : "json",
					success : function(data){
						window.location.reload();
					},
					error : function(){
						alert("error");
					}
				});
			});


			//Delete button

			$(document).on("click",".delete_btn",function(e){
				e.preventDefault();
				let userId = $(this).data("id");
				tr = $(this).parents("tr").first();
				$.ajax({
					url : "delete.php",
					type : "POST",
					data : {user_id : userId},
					dataType : "json",
					success : function(del) {
						if(del == 1){
							tr.fadeOut();
							window.location.reload();
						}
					},
					error : function(){
						alert("Error");
					}
				});
			});
		});


		//send invite 
		$(document).on('click','.check_btn',function(e){
			e.preventDefault();
			let userId = $(this).data('id');
			$.ajax({
				url : 'invite.php',
				type : "POST",
				data : {user_id : userId},
				dataType : 'json',
				success : function(res){
					if(res == 1){
						window.location.reload();
					}
				}
			});
		});