const handleCheckBox = {
	handleEvents(){
		const selectAll = document.querySelector('.select-all input');
		const checkBoxList = document.querySelectorAll('.checkbox_array');
		const form = document.querySelector('.container');
		const submit = document.querySelector('#submit');
		selectAll.addEventListener('input',e=>{
			let isSelectAll = selectAll.checked;
			checkBoxList.forEach((item)=>{
				item.checked = isSelectAll;
			});
		});
		checkBoxList.forEach(item=>{
			item.addEventListener('input',e=>{
				let checkBoxListChecked = document.querySelectorAll('.checkbox_array:checked');
				let isEnough = checkBoxListChecked.length === checkBoxList.length
				selectAll.checked = isEnough
			});
		});
		submit.addEventListener('click',e=>{
			const select = document.querySelector('select');
			let isSubmit = select.value === "" ? false : true;
			if(isSubmit) form.submit();
		});
	},
	main(){
		this.handleEvents();
	}
}
handleCheckBox.main();