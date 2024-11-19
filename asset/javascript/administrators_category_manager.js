const handle_category = {
	handleEvents(){
		const handleDeletes = document.querySelectorAll('.trash_ID');
		const cancel = document.querySelector('.choose-method--delete .cancel');
		const destroy = document.querySelector('.choose-method--delete .delete');
		const wrapper_popup = document.querySelector('.wrapper_popup');
		const popup = document.querySelector('.popup');
		let setDeleteData = null;
		handleDeletes.forEach(item=>{
			item.addEventListener('click',e=>{
				popup.classList.add('active');
				wrapper_popup.classList.add('active');
				setDeleteData = item.dataset.id;
				
			});
		});
		cancel.addEventListener('click',e=>{
			popup.classList.remove('active');
			wrapper_popup.classList.remove('active');

		});
		const form_delete_ID = document.querySelector('form.delete_ID');
		destroy.addEventListener('click',e=>{
			form_delete_ID.querySelector('input').value = setDeleteData;
			form_delete_ID.submit();
		});
		const checkbox = document.querySelector('.checkbox');
		const checkbox_array = document.querySelectorAll('.checkbox_array');
		checkbox.addEventListener('input',e=>{
			let isChecked = checkbox.checked;
			checkbox_array.forEach(item=>{
				item.checked = isChecked;
			});
		});
		checkbox_array.forEach(item=>{
			item.addEventListener('input',e=>{
				let checkbox_arrayChecked = document.querySelectorAll('.checkbox_array:checked');
				let isLength = checkbox_array.length === checkbox_arrayChecked.length;
				checkbox.checked = isLength;
			});
		});
		const action = document.querySelector('.action');
		const wrapperFormArray = document.querySelector('.wrapper');
		const handle_submit_action = document.querySelector('.handle-submit-action');
		handle_submit_action.addEventListener('click',e=>{
			action.value === "" ? false : wrapperFormArray.submit();
		});
	},
	main(){
		this.handleEvents();
	}
};
handle_category.main();