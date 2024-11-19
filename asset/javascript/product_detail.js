function handleRevael() {
	let reveal = document.querySelectorAll(".reveal");
	let reveal1 = document.querySelectorAll(".reveal1");
	let reveal2 = document.querySelectorAll(".reveal2");
	let reveal3 = document.querySelectorAll(".reveal3");
	let reveal4 = document.querySelectorAll(".reveal4");
	let windownHeight = window.innerHeight;
	let collisionDistance = 100;
	reveal.forEach((item) => {
		let locationCollision = item.getBoundingClientRect().top;
		if (locationCollision < windownHeight - collisionDistance) {
			item.classList.add("activeReveal");
		} else {
			item.classList.remove("activeReveal");

		}
	});
	reveal1.forEach((item) => {
		let locationCollision = item.getBoundingClientRect().top;
		if (locationCollision < windownHeight - collisionDistance) {
			item.classList.add("activeReveal1");
		} else {
			item.classList.remove("activeReveal1");

		}
	});
	reveal2.forEach((item) => {
		let locationCollision = item.getBoundingClientRect().top;
		if (locationCollision < windownHeight - collisionDistance) {
			item.classList.add("activeReveal2");
		} else {
			item.classList.remove("activeReveal2");

		}
	});
	reveal3.forEach((item) => {
		let locationCollision = item.getBoundingClientRect().top;
		if (locationCollision < windownHeight - collisionDistance) {
			item.classList.add("activeReveal3");
		} else {
			item.classList.remove("activeReveal3");

		}
	});
	reveal4.forEach((item) => {
		let locationCollision = item.getBoundingClientRect().top;
		if (locationCollision < windownHeight - collisionDistance) {
			item.classList.add("activeReveal4");
		} else {
			item.classList.remove("activeReveal4");
		}
	});
}
function handleRevealRight() {
	let revealRight = document.querySelectorAll(".reveal_right");
	let revealRight1 = document.querySelectorAll(".reveal_right1");
	let revealRight2 = document.querySelectorAll(".reveal_right2");
	let windownHeight = window.innerHeight;
	let collisionDistance = 100;
	revealRight.forEach((item) => {
		let locationCollision = item.getBoundingClientRect().top;
		if (locationCollision < windownHeight - collisionDistance) {
			item.classList.add("activeRevealRight");
		} else {
			item.classList.remove("activeRevealRight");

		}
	});
	revealRight1.forEach((item) => {
		let locationCollision = item.getBoundingClientRect().top;
		if (locationCollision < windownHeight - collisionDistance) {
			item.classList.add("activeRevealRight1");
		} else {
			item.classList.remove("activeRevealRight1");

		}
	});
	revealRight2.forEach((item) => {
		let locationCollision = item.getBoundingClientRect().top;
		if (locationCollision < windownHeight - collisionDistance) {
			item.classList.add("activeRevealRight2");
		} else {
			item.classList.remove("activeRevealRight2");

		}
	});
}
var onceActive = true;
function handleIncreaseNumberWhenScroll(value) {
	let getDataNumbers = document.querySelectorAll('.about .increase_number .controls .item p:first-child');
	let windownHeight = window.innerHeight;
	let collisionDistance = 150;
	getDataNumbers.forEach((item, index) => {
		let getDataNumber = item.getBoundingClientRect().top;
		if (getDataNumber < windownHeight - collisionDistance) {
			if (onceActive === true) {
				let storageIncreaseNumber = item.getAttribute('data-azt');
				let x = setInterval(() => {
					item.textContent++;
					if (item.textContent == storageIncreaseNumber) {
						clearInterval(x);
					}

				}, 2000 / storageIncreaseNumber);
			}

		}
	});
	onceActive = false;
}

window.addEventListener("scroll", function () {
	let value = window.scrollY;
	handleRevael();
	handleRevealRight();
	handleIncreaseNumberWhenScroll();
});
// const handle_show__product = {
// 	handle_event(){
// 		const wrapper_image = document.querySelector('.show_product .wrapper_img img');
// 		const show_product__items = document.querySelectorAll('.more_show--product .item');		
// 		const wrapper_size_items = document.querySelectorAll('.component_product__content .wrapper_size .item');
// 		const size = document.querySelector('.invoice .wrapper_type .content .size');
// 		const color = document.querySelector('.invoice .wrapper_type .content .color');
// 		const img = document.querySelector('.invoice .wrapper_type .wrapper_img img');

// 		function handle_removeAll__add(index){
// 			show_product__items.forEach(item=>{
// 				item.classList.remove('show_border');
// 			});
// 				show_product__items[index].classList.add('show_border');
// 				let get_color = show_product__items[index].innerText;
// 				color.innerText = get_color;
// 		}
// 		function handle_removeAll__wrapper_size(index){
// 			wrapper_size_items.forEach((item,index)=>{
// 				item.classList.remove('active');
// 			});
// 			wrapper_size_items[index].classList.add('active');

// 			wrapper_size_items.forEach((item,index)=>{
// 				item.innerHTML = item.innerText;
// 			});
// 			let get_size_number = wrapper_size_items[index].innerText;
// 			wrapper_size_items[index].innerHTML = `${get_size_number} <span><i class="fa-solid fa-check"></i></span>`;
// 			let get_size = wrapper_size_items[index].innerText;
// 			size.innerText = get_size;

// 		}
// 		show_product__items.forEach((item,index)=>{
// 			item.addEventListener('click',e=>{
// 				const image = item.querySelector('img').src;
// 				img.src = image;
// 				wrapper_image.src = image;
// 				handle_removeAll__add(index);
// 			});
// 		});
// 		wrapper_size_items.forEach((item,index)=>{
// 			item.addEventListener('click',e=>{	
// 				handle_removeAll__wrapper_size(index);
// 			});
// 		});
// 		//

// 	},
// 	main(){
// 		this.handle_event();
// 	}
// };
// handle_show__product.main();
window.addEventListener('load', e => {
	const loader = document.querySelector('.loader');
	console.log(loader);
	setTimeout(() => {
		loader.style.visibility = "hidden";
		loader.style.opacity = "0";
		loader.style.transition = '.3s ease-in-out';
	}, 1000)
});
const send_comment = {
	handleSendComment() {
		const input_comment = document.querySelector('.input_comment');
		const submit_comment = document.querySelector('.submit-comment');

		input_comment.addEventListener('keydown', e => {
			if (e.keyCode === 13 && !input_comment.value == "") {

				const data_input = submit_comment.querySelector('input[name="comment"]');
				data_input.value = input_comment.value;
				submit_comment.submit();

			}
		})
	},
	main() {
		this.handleSendComment();
	}
};
send_comment.main();
const handlePopup = {
	handleEvent() {
		const editComment = document.querySelectorAll('.edit-comment');
		const cancel = document.querySelector('.choose-method--delete .cancel');
		const edit = document.querySelector('.choose-method--delete .delete');
		const wrapper_popup = document.querySelector('.wrapper_popup');
		const popup = document.querySelector('.popup');
		const inputEdit = document.querySelector('.form-edit-comment input[name="comment"]');
		const ID_comment = document.querySelector('.form-edit-comment input[name="ID_comment"]');
		const product_ID = document.querySelector('.form-edit-comment input[name="product_ID"]');
		const formEdit = document.querySelector('.form-edit-comment');
		editComment.forEach(item => {
			item.addEventListener('click', e => {
				popup.classList.add('active');
				wrapper_popup.classList.add('active');
				inputEdit.value = item.parentElement.querySelector('.comment').innerText;
				product_ID.value = item.nextElementSibling.dataset.id;
				ID_comment.value = item.dataset.id;
			});
		});
		cancel.addEventListener('click', e => {
			popup.classList.remove('active');
			wrapper_popup.classList.remove('active');

		});
		edit.addEventListener('click', e => {
			formEdit.submit();
		});
		inputEdit.addEventListener('keydown', e => {
			if(e.keyCode === 13){
			formEdit.submit();
			}
		});
	},
	main() {
		this.handleEvent();
	}
}
handlePopup.main();